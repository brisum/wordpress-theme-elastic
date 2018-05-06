<?php

namespace Brisum\GoogleOAuth;

use Google_Client;

class GoogleOAuthService
{
    /**
     * Returns an authorized API client.
     * @return Google_Client|false the authorized client object
     */
    protected function createClient(array $settings) {
        $client = new Google_Client();
        $client->setAccessType('offline');
        $client->setApprovalPrompt('force');

        foreach ($settings as $settingName => $settingValue) {
            if ('credentials_path' == $settingName) {
                continue;
            }
            if ('auth_url' == $settingName) {
                continue;
            }

            $method = 'set' . ucfirst(preg_replace_callback(
                    '/_([a-z]+)/i',
                    function($matches) {return ucfirst($matches[1]); },
                    $settingName
                ));

            $client->$method($settingValue);
        }

        return $client;
    }

    /**
     * Returns an authorized API client.
     * @return Google_Client|false the authorized client object
     */
    public function getClient(array $settings) {
        $client = $this->createClient($settings);

        // Load previously authorized credentials from a file.
        $accessToken = file_exists($settings['credentials_path'])
            ? json_decode(file_get_contents($settings['credentials_path']), true)
            : null;

        if (!$accessToken) {
            return false;
        }

        $client->setAccessToken($accessToken);

        // Refresh the token if it's expired.
        if ($client->isAccessTokenExpired()) {
            // save refresh token to some variable
            $refreshTokenSaved = $client->getRefreshToken();

            // update access token
            $client->fetchAccessTokenWithRefreshToken($refreshTokenSaved);

            // pass access token to some variable
            $accessTokenUpdated = $client->getAccessToken();

            // append refresh token
            $accessTokenUpdated['refresh_token'] = $refreshTokenSaved;

            //Set the new acces token
            // $accessToken = $refreshTokenSaved;
            $client->setAccessToken($accessTokenUpdated);

            // save to file
            file_put_contents($settings['credentials_path'], json_encode($accessTokenUpdated));
        }

        return $client;
    }

    public function auth(array $settings)
    {
        $client = $this->createClient($settings);

        $accessToken = file_exists($settings['credentials_path'])
            ? json_decode(file_get_contents($settings['credentials_path']), true)
            : null;
        if ($accessToken) {
            $client->setAccessToken($accessToken);
            if ($client->isAccessTokenExpired()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
                file_put_contents($settings['credentials_path'], json_encode($client->getAccessToken()));
            }
            die('Login successfully');
        }

        if (!isset($_GET['code'])) {
            header('Location: ' . filter_var($client->createAuthUrl(), FILTER_SANITIZE_URL));
            die();
        } else {
            $accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            file_put_contents($settings['credentials_path'], json_encode($accessToken));
            header('Location: ' . filter_var($settings['redirect_uri'], FILTER_SANITIZE_URL));
            die();
        }
    }
}
