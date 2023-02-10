<?php
require("./vendor/autoload.php");

use PayPal\Services\Auth;

$auth = new Auth;
$token = $auth->getAuthToken();
echo $token. PHP_EOL;

$revoke = $auth->revokeAuthToken($token);
echo $revoke. PHP_EOL;

$info = $auth->getUserInfo();
echo sprintf("userID is %s" .PHP_EOL. "Sub is %s", $info['id'], $info['sub']). PHP_EOL;

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