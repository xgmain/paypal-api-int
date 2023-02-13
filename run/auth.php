<?php
require("./vendor/autoload.php");

use PayPal\Services\Auth;

$auth = new Auth;
$token = $auth->getAuthToken();
echo "[Auth Token] " .$token. PHP_EOL;

$revoke = $auth->revokeAuthToken($token);
if ($revoke) {
    echo "[Revoke Token successfully]". PHP_EOL;
}

$info = $auth->getUserInfo();
echo sprintf("[UserID is] %s" .PHP_EOL. "[Sub is] %s", $info['id'], $info['sub']). PHP_EOL;

$clientToken = $auth->generateClientToken();
echo "[Client Token] " .$clientToken. PHP_EOL;
