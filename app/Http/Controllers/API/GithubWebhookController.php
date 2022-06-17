<?php

namespace App\Http\Controllers\API;

use App\Events\OrderCommented;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use App\Models\User;
use App\Services\Github;
use App\Services\GoogleDrive;

class GithubWebhookController extends Controller
{
    protected Github $github;
    protected GoogleDrive $drive;

    /**
     * Create a new controller instance.
     *
     * @param  Github  $github github service container.
     * @param  GoogleDrive  $drive Google Drive service container.
     * @return void
     */
    public function __construct(Github $github, GoogleDrive $drive)
    {
        $this->github = $github;
        $this->drive = $drive;
    }

    /**
     * Validate an incoming github webhook
     *
     * @param string $token Our known token that we've defined
     * @param \Illuminate\Http\Request $request
     *
     * @throws \BadRequestHttpException, \UnauthorizedException
     * @return void
     */
    protected function assertValidGithubWebhook($token, Request $request)
    {
        if (($signature = $request->headers->get('X-Hub-Signature')) == null) {
            throw new \Exception('Signature header not set');
        }

        $signatureParts = explode('=', $signature);

        if (count($signatureParts) != 2) {
            throw new \Exception('Signature has invalid format');
        }

        $knownSignature = hash_hmac('sha1', $request->getContent(), $token);

        if (! hash_equals($knownSignature, $signatureParts[1])) {
            throw new \Exception('Could not verify request signature ' . $signatureParts[1]);
        }
    }

    protected function readPayloadAsJson(Request $request)
    {
        $payload = $request->getContent();
        $json = json_decode($payload, true);

        if ($json == null) {
            throw new \Exception('Unable to parse payload');
        }

        return $json;
    }

    /**
     * Entry point to our webhook handler
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        $webhook = $this->github->processWebhookRequest($request);

        $event = $webhook['event'];
        $payload = $webhook['payload'];

        if ($event == 'issues') {
            return $this->handleIssuesEvent($payload);

        } else if ($event == 'issue_comment') {
            return $this->handleIssueComment($payload);
        }
    }

    protected function getSystemUser() {
        $systemUser = User::where('uid', config('github.user_uid_comments'))->firstOr(function() {
            abort(404, 'github_user_uid_comments não configurado corretamente');
        });

        return $systemUser;
    }

    protected function handleIssueComment(array $payload) {
        $action = $payload['action'];
        $body = $payload['comment']['body'];

        $regex = '/(mural\:)(\s)?((http|https)\:\/\/)?[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,5}(\/\S*)?/';

        if (preg_match($regex, $body)) {
            if($action == 'created') {
                $org = $payload['organization']['login'];
                $repo = $payload['repository']['name'];
                $issue = $payload['issue']['number'];
                $body = $payload['comment']['body'];

                return $this->handleIssueOpened($body, $org, $repo, $issue);
            }
        }

        $clientMention = config('github.issue_client_mention');

        if ($clientMention == null || !str_contains($body, $clientMention)) {
            return response('Nothing interesting in this comment', 200);
        }

        $body = str_replace($clientMention, '', $body);
        $order = Order::where('github_issue_link', $payload['issue']['html_url'])->firstOrFail();

        $githubUser = $payload['comment']['user']['login'];
        $systemUser = $this->getSystemUser();

        if ($action == 'created') {
            $comment = $order->comments()->create([
                'content' => $body,
                'type' => 'github:' . $payload['comment']['id'],
                'data' => $payload,
                'is_hidden' => false,
                'user_id' => $systemUser->id,
            ]);

            OrderCommented::dispatch($order, $comment);

            return response('Comment created', 201);
        }

        if ($action == 'edited' || $action == 'deleted') {
            $comment = Comment::where('type', 'github:' . $payload['comment']['id'])->firstOrFail();

            if ($action == 'edited') {
                $comment->content = $body;
                $comment->data = $payload;
                $comment->save();
            } else {
                $comment->delete();
            }

            return response('', 200);
        }

        return response('No action performed', 200);
    }

    protected function findAppOrderLink($body)
    {
        $appUrl = config('app.url');
        $regex = '/((http|https)\:\/\/)?[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,5}(\/\S*)?/';

        preg_match_all($regex, $body, $matches);
        $links = $matches[0];

        if ($links == null || count($links) == 0) {
            return null;
        }

        foreach($links as $link) {
            if (stripos($link, $appUrl) !== false) {
                $orderId = basename($link);
                return $orderId;
            }
        }

        return null;
    }

    protected function renameIssueWorkingFolderToMatchRepoIssueName($folders, $orderId, $repo, $issue)
    {
        if (!isset($folders['folder'])) {
            return;
        }

        $folder = $folders['folder'];
        $folderId = $folder->getId();
        $name = $repo . '#' . $issue . " (mural/$orderId)";

        $this->drive->rename($folderId, $name);
    }

    protected function createIssueWorkingFolder($body, $issue, $repo)
    {
        $orderId = $this->findAppOrderLink($body);

        $order = $orderId != null ? Order::where('id', $orderId)->first() : null;

        if ($order == null) {
            // A issue criada no github não tem menção a qualquer serviço aqui no mural.
            // Nesse caso, vamos apenas criar as pastas no drive e informar isso.
            return $this->drive->createIssueWorkingFolder($issue, $repo);
        }

        // A issue tem menção a um serviço do mural. Nesse caso, vamos encontrar as informações
        // de pasta no google drive desse serviço e utilizar elas.
        $folders = $this->drive->getIssueWorkingFolderStructureByName('mural#' . $orderId);

        if ($folders == null) {
            // Não achamos a pasta no drive relacionada ao pedido. Vamos criar e deu.
            return $this->drive->createIssueWorkingFolder($issue, $repo);
        }

        // Se chegamos até aqui, então temos a pasta do google drive relacionada ao serviço mural.
        // O único problema é que essa pasta está com o nome do mural, e não do repositório. Vamos
        // apenas renomear a pasta e retornar ela para uso.
        $this->renameIssueWorkingFolderToMatchRepoIssueName($folders, $orderId, $repo, $issue);
        return $folders;
    }

    protected function handleIssueOpened($body, $org, $repo, $issue)
    {
        $comment = '';
        $folders = $this->createIssueWorkingFolder($body, $issue, $repo);

        if($folders != null) {
            $drive_link = isset($folders['folder']) ? $folders['folder']->getWebViewLink() : '';
            $drive_progress_link = isset($folders['progress']) ? $folders['progress']->getWebViewLink() : '';
            $drive_in_link = isset($folders['in']) ? $folders['in']->getWebViewLink() : '';
            $drive_out_link = isset($folders['out']) ? $folders['out']->getWebViewLink() : '';

            $comment =
                'Criei as pastas dessa issue no Google Drive :' . "\n" .
                '* <img width="16" height="16" src="https://ssl.gstatic.com/images/branding/product/1x/drive_2020q4_32dp.png" /> [Pasta da issue]('.$drive_link.') ' . "\n" .
                '* [Em andamento]('.$drive_progress_link.')' . "\n" .
                '* 🔽 [Entrada]('.$drive_in_link.')' . "\n" .
                '* 🔼 [Saída]('.$drive_out_link.')';
        } else {
            $comment = 'Humm, não consegui criar as pastas dessa issue no Google Drive. Desculpe 😥';
        }

        $this->github->commentIssue($org, $repo, $issue, $comment);
        return response('Issue opened and commented: ' . $comment, 200);
    }

    public function setMuralLabel($org, $repo, $issue, $label = NULL)
    {
        $mural_labels = ['mural:fila', 'mural:andamento', 'mural:revisão', 'mural:completo', 'mural:cancelado'];
        $active_labels = $this->github->getLabels($org, $repo, $issue);

        foreach ($active_labels as $active_label) {
            if (in_array($active_label['name'], $mural_labels) and strcmp($active_label['name'], $label) != 0) {
                $this->github->removeLabel($org, $repo, $issue, $active_label['name']);
            }
        }
        if($label) {
            $this->github->addLabel($org, $repo, $issue, $label);
        }
    }

    protected function handleIssueLabeled(array $payload, $org, $repo, $issue)
    {
        $label = $payload['label'];
        $url = "https://github.com/".substr($payload['issue']['url'], strpos($payload['issue']['url'], "practice-uffs"));
        $order = Order::where('github_issue_link', $url)->first();

        if($order) {
            $mural_labels = ['mural:fila', 'mural:andamento', 'mural:revisão', 'mural:completo', 'mural:cancelado'];
            $active_labels = $this->github->getLabels($org, $repo, $issue);

            foreach($active_labels as $active_label) {
                if (in_array($active_label['name'], $mural_labels) and strcmp($active_label['name'], $label['name']) != 0) {
                    $this->github->removeLabel($org, $repo, $issue, $active_label['name']);
                }
            }

            switch($label['name']) {
                case $mural_labels[0]:
                    $order->status = "todo";
                    $order->save();
                    break;
                case $mural_labels[1]:
                    $order->status = "doing";
                    $order->save();
                    break;
                case $mural_labels[2]:
                    $order->status = "review";
                    $order->save();
                    break;
                case $mural_labels[3]:
                    $order->status = "completed";
                    $order->save();
                    break;
                case $mural_labels[4]:
                    $order->status = "closed";
                    $order->save();
                    break;
            }
        }


        return response('Order status updated to: ' . $label['name'], 200);
    }

    protected function handleIssuesEvent(array $payload)
    {
        $org = $payload['organization']['login'];
        $repo = $payload['repository']['name'];
        $issue = $payload['issue']['number'];
        $body = $payload['issue']['body'];

        if ($payload['action'] == 'opened') {
            return $this->handleIssueOpened($body, $org, $repo, $issue);

        } else if ($payload['action'] == 'labeled') {
            return $this->handleIssueLabeled($payload, $org, $repo, $issue);

        } else if ($payload['action'] == 'milestoned') {
            // TODO: aprimorar oque fazer quando issue é colocad em milestone
        }

        return response('Issue event received, but nothing interesting in it.', 200);
    }
}
