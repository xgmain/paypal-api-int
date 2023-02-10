<?php
require("./vendor/autoload.php");

use PayPal\Services\Auth;
use PayPal\Request\AuthTokenRequest;
use PayPal\Request\RevokeTokenRequest;

$auth = new Auth(new AuthTokenRequest);
$token = $auth->getAuthToken();
echo $token. PHP_EOL;

$revokeAuth = new Auth(new RevokeTokenRequest);
$revoke = $auth->revokeAuthToken($token);

echo $revoke. PHP_EOL;

// use GuzzleHttp\Client;

// $client = new Client();
// $client->request('POST', $uri, [

// ]);

// $client = new \GuzzleHttp\Client();
// $response = $client->request('POST', $uri, [
//         'headers' =>
//             [
//                 'Accept' => 'application/json',
//                 'Accept-Language' => 'en_US',
//                'Content-Type' => 'application/x-www-form-urlencoded',
//             ],
//         'body' => 'grant_type=client_credentials',

//         'auth' => [$clientId, $secret, 'basic']
//     ]
// );

// $data = json_decode($response->getBody(), true);

// $access_token = $data['access_token'];