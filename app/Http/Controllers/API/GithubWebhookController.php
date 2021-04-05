<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;

class GithubWebhookController extends Controller
{
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
        $secret = config('webhooks.github_webhook_secret');
        
        $this->assertValidGithubWebhook($secret, $request);

        $event = $request->headers->get('X-GitHub-Event');        
        $payload = $this->readPayloadAsJson($request);

        if ($event == 'issue_comment') {
            return $this->issueComment($payload);
        }
    }

    protected function issueComment(array $payload) {
        $action = $payload['action'];
        $body = $payload['comment']['body'];

        $clientMention = config('app.github_issue_client_mention');

        if ($clientMention == null || !str_contains($body, $clientMention)) {
            return response('Nothing interesting in this comment', 200);
        }
        
        $body = str_replace($clientMention, '', $body);
        $item = Item::where('github_issue_link', $payload['issue']['html_url'])->firstOrFail();

        if ($action == 'created') {
            $botUsername = config('app.github_bot_username');            
            $user = $payload['comment']['user']['login'] == $botUsername ? 'Meu comentário': 'Equipe Practice';            
            
            $comment = Item::create([
                'user_id' => 3, // TODO: usar um usuário default do sistema para postar?
                'parent_id' => $item->id,
                'type' => Item::TYPE_COMMENT,
                'title' => $user,
                'description' => $body,
                'hidden' => false,
                'github_issue_link' => $payload['comment']['id'],
            ]);
               
            return response('Comment created', 201);
        }  
            
        if ($action == 'edited'){
            $comment = Item::where('github_issue_link', $payload['comment']['id'])->firstOrFail();
            $comment->description = $body;
            $comment->save();

            return response('', 200);
        }
        
        if ($action == 'deleted'){
            $comment = Item::findOrFail('github_issue_link', $payload['comment']['id']);
            $comment->delete();
            return response('', 200);
        }

        return response('No action performed', 200);
    }
}
