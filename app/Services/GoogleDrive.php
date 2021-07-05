<?php

namespace App\Services;

use Google\Client;
use Google\Service\Drive;

class GoogleDrive
{
    protected Client $client;
    protected Drive $service;

    public function __construct(array $config = [])
    {
        $this->config = $config;
        $this->client = $this->getGoogleClient();
        $this->service = new Drive($this->client);
    }

    public function getService(): Drive
    {
        return $this->service;
    }

    public function findFoldersWhoseNameContains($string, $parent_id = '')
    {
        $parentQuery = $parent_id != '' ? "and '$parent_id' in parents" : '';

        $optParams = array(
            'q' => "mimeType='application/vnd.google-apps.folder' and name contains '$string' " . $parentQuery,
            'pageSize' => 10,
            'fields' => 'nextPageToken, files(id, name, webViewLink)'
        );

        $results = $this->service->files->listFiles($optParams);
        return $results->getFiles();
    }

    public function getFolderByName($string, $parent_id = '')
    {
        $parentQuery = $parent_id != '' ? "and '$parent_id' in parents" : '';

        $optParams = array(
            'q' => "mimeType='application/vnd.google-apps.folder' and name='$string' " . $parentQuery,
            'pageSize' => 10,
            'fields' => 'nextPageToken, files(id, name, webViewLink)'
        );

        $results = $this->service->files->listFiles($optParams);
        $files = $results->getFiles();

        $folder = count($files) > 0 ? $files[0]: null;

        return $folder;
    }

    public function findIssueWorkingFolders($repo = 'programa')
    {
        $folders = $this->findFoldersWhoseNameContains($repo . '#');
        return $folders;
    }

    public function getIssueWorkingFolderByName($name)
    {
        $folder = $this->getFolderByName($name);
        return $folder;
    }

    /**
     * @param {string} $name name formatted as 'repo#issue_number', ex.: 'programa#222'.
     * @return {array} array in the format ['folder' => issue_folder_obj, 'in' => folder_obj, 'out' => folder_obj], null if nothing is found.
     */
    public function getIssueWorkingFolderStructureByName($name)
    {
        $folder = $this->getIssueWorkingFolderByName($name);

        if($folder == null) {
            return null;
        }

        $ins = $this->findFoldersWhoseNameContains('Entrada', $folder->getId());
        $outs = $this->findFoldersWhoseNameContains('Saída', $folder->getId());

        $ret = [
            'folder' => $folder,
            'in'     => count($ins) > 0 ? $ins[0] : null,
            'out'    => count($outs) > 0 ? $outs[0] : null,
        ];

        return $ret;
    }

    public function config($key, $defaulValue = null)
    {
        if(!is_array($this->config) || !isset($this->config['drive'])) {
            return $defaulValue;
        }

        if(isset($this->config['drive'][$key])) {
            return $this->config['drive'][$key];
        }

        return $defaulValue;
    }

    public function createIssueWorkingFolder($number, $repo = 'programa')
    {
        if(empty($number)) {
            throw new \InvalidArgumentException('Param $number requires a value.');
        }

        $name = $repo . '#' . $number;
        $folder = $this->getIssueWorkingFolderByName($name);

        if($folder != null) {
            return $this->getIssueWorkingFolderStructureByName($name);
        }

        $tasks_folder_id = $this->config('tasks_folder_id', '');
        
        $folder = $this->createFolder($name, $tasks_folder_id);
        $in_folder = $this->createFolder('Entrada', $folder->getId());
        $out_folder = $this->createFolder('Saída', $folder->getId());

        return $this->getIssueWorkingFolderStructureByName($name);
    }

    public function createFolder($name, $parentId = '') {
        $folderMeta = new \Google\Service\Drive\DriveFile();

        $folderMeta->setName($name);
        $folderMeta->setMimeType('application/vnd.google-apps.folder');

        if(!empty($parentId)) {
            $folderMeta->parents[] = $parentId;
        }
        
        $folder = $this->service->files->create($folderMeta);
        return $folder;
    }

    /**
     * Returns an authorized API client.
     * @return Google_Client the authorized client object
     */
    protected function getGoogleClient(array $options = []): Client
    {
        $client = new Client();

        $client->setHttpClient(new \GuzzleHttp\Client([
            \GuzzleHttp\RequestOptions::VERIFY => \Composer\CaBundle\CaBundle::getSystemCaRootBundlePath()
        ]));

        $client->setApplicationName('Practice Google Drive');
        $client->setScopes(Drive::DRIVE_FILE);
        $client->setAuthConfig(config_path('google/credentials.json'));
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        // Load previously authorized token from a file, if it exists.
        // The file token.json stores the user's access and refresh tokens, and is
        // created automatically when the authorization flow completes for the first
        // time.
        $tokenPath = config_path('google/token.json');
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }
        
        // If there is no previous token or it's expired.
        if ($client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                // Request authorization from the user.
                $authUrl = $client->createAuthUrl();
                printf("Open the following link in your browser:\n%s\n", $authUrl);
                print 'Enter verification code: ';
                $authCode = trim(fgets(STDIN));

                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                $client->setAccessToken($accessToken);

                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new \Exception(join(', ', $accessToken));
                }
            }
            // Save the token to a file.
            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }
        return $client;
    }
}