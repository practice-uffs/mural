<?php

namespace App\Http\Controllers\API;

use App\Events\OrderCommented;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Comment;
use App\Model\Order;
use App\Model\User;
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

    protected function handleIssueOpened(array $payload, $org, $repo, $issue)
    {
        $comment = '';
        $folders = $this->drive->createIssueWorkingFolder($issue, $repo);

        if($folders != null) {
            $drive_link = isset($folders['folder']) ? $folders['folder']->getWebViewLink() : '';
            $drive_in_link = isset($folders['in']) ? $folders['in']->getWebViewLink() : '';
            $drive_out_link = isset($folders['out']) ? $folders['out']->getWebViewLink() : '';

            $comment = 
                'Criei as pastas dessa issue no Google Drive :' . "\n" .
                '* <img width="16" height="16" src="https://ssl.gstatic.com/images/branding/product/1x/drive_2020q4_32dp.png" /> [Pasta da issue]('.$drive_link.') ' . "\n" .
                '* 🔽 [Entrada]('.$drive_in_link.')' . "\n" .
                '* 🔼 [Saída]('.$drive_out_link.')';
        } else {
            $comment = 'Humm, não consegui criar as pastas dessa issue no Google Drive. Desculpe 😥';
        }

        $this->github->commentIssue($org, $repo, $issue, $comment);
        return response('Issue opened and commented.', 200);                
    }

    protected function handleIssuesEvent(array $payload)
    {
        $org = $payload['organization']['login'];
        $repo = $payload['repository']['name'];
        $issue = $payload['issue']['number'];

        if ($payload['action'] == 'opened') {
            return $this->handleIssueOpened($payload, $org, $repo, $issue);

        } else if ($payload['action'] == 'labeled') {
            // TODO: aprimorar o que fazer quando issue recebe label

        } else if ($payload['action'] == 'milestoned') {
            // TODO: aprimorar oque fazer quando issue é colocad em milestone
        }

        return response('Issue event received, but nothing interesting in it.', 200);
    }
}