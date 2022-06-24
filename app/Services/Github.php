<?php

namespace App\Services;

use Illuminate\Http\Request;
use Github\Client;

class Github
{
    protected Client $client;
    protected array $config;

    public function __construct(array $config = [])
    {
        $this->config = $config;
        $this->client = $this->getClient(true);
    }

    /**
     * Returns an instance of `Github\Client`.
     *
     * @param bool $authenticated if the instance should be authenticated or not.
     *
     * @return Client instance of github client ready for use.
     */
    public function getClient($authenticated = false): Client
    {
        $guzz_client = new \GuzzleHttp\Client([
            \GuzzleHttp\RequestOptions::VERIFY => \Composer\CaBundle\CaBundle::getSystemCaRootBundlePath()
        ]);

        $gh = Client::createWithHttpClient($guzz_client);

        if($authenticated) {
            $user = $this->config['username'];
            $token = $this->config['token'];

            $gh->authenticate($token, null, Client::AUTH_ACCESS_TOKEN);
        }

        return $gh;
    }

    /**
     * @param string $content
     *
     * @return [type]
     */
    public function commentIssue($org, $repo, $issueNumber, string $content)
    {
        $this->client->api('issue')->comments()->create($org, $repo, $issueNumber, array('body' => $content));
    }

    public function removeLabel($org, $repo, $issueNumber, string $labelName)
    {
        $this->client->api('issue')->labels()->remove($org, $repo, $issueNumber, $labelName);
    }

    public function addLabel($org, $repo, $issueNumber, string $labelName)
    {
        $this->client->api('issue')->labels()->add($org, $repo, $issueNumber, $labelName);
    }

    public function getLabels($org, $repo, $issueNumber)
    {
        return $this->client->api('issue')->labels()->all($org, $repo, $issueNumber);
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
     * Process a webhook request sent by Github servers.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array Associtative array containing `['event' => 'NAME', 'payload' => 'JSON']`, where `NAME` is the event name.
     */
    public function processWebhookRequest(Request $request): array
    {
        $secret = config('github.webhook_secret');

        $this->assertValidGithubWebhook($secret, $request);

        $event = $request->headers->get('X-GitHub-Event');
        $payload = $this->readPayloadAsJson($request);

        return [
            'event' => $event,
            'payload' => $payload
        ];
    }

    public function setMuralLabel($org, $repo, $issue, $label = NULL)
    {
        $mural_labels = ['mural:fila', 'mural:andamento', 'mural:revisão', 'mural:completo', 'mural:cancelado'];
        $active_labels = $this->getLabels($org, $repo, $issue);

        foreach ($active_labels as $active_label) {
            if (in_array($active_label['name'], $mural_labels) and strcmp($active_label['name'], $label) != 0) {
                $this->removeLabel($org, $repo, $issue, $active_label['name']);
            }
        }
        if ($label) {
            $this->addLabel($org, $repo, $issue, $label);
        }
    }
}
