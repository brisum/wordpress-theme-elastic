<?php

use Brisum\GoogleOAuth\GoogleOAuthService;
use Brisum\Lib\ObjectManager;

require __DIR__ . '/../bootstrap.php';

/** @var GoogleOAuthService $googleOAuthService */
$googleOAuthService = ObjectManager::getInstance()->get('Brisum\GoogleOAuth\GoogleOAuthService');

$settings = [
    'application_name' => APPLICATION_NAME,
    'scopes' => SCOPES,
    'auth_config' => CLIENT_SECRET_PATH,
    'credentials_path' => CREDENTIALS_PATH,
    'redirect_uri' => REDIRECT_URI,
];

$googleOAuthService->auth($settings);

