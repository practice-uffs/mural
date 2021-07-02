<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Comment;
use App\Model\Order;
use App\Model\User;

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

    protected function getSystemUser() {
        $systemUser = User::where('uid', config('app.github_user_uid_comments'))->firstOr(function() {
            abort(404, 'github_user_uid_comments não configurado corretamente');
        });

        return $systemUser;
    }

    protected function issueComment(array $payload) {
        $action = $payload['action'];
        $body = $payload['comment']['body'];

        $clientMention = config('app.github_issue_client_mention');

        if ($clientMention == null || !str_contains($body, $clientMention)) {
            return response('Nothing interesting in this comment', 200);
        }
        
        $body = str_replace($clientMention, '', $body);
        $order = Order::where('github_issue_link', $payload['issue']['html_url'])->firstOrFail();

        $githubUser = $payload['comment']['user']['login'];        
        $systemUser = $this->getSystemUser();

        if ($action == 'created') {
            $order->comments()->create([
                'content' => $body,
                'type' => 'github:' . $payload['comment']['id'],
                'data' => $payload,
                'is_hidden' => false,
                'user_id' => $systemUser->id,
            ]);
               
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
}