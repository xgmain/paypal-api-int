<?php
require("./vendor/autoload.php");

use PayPal\Services\Order;

$order = new Order;

$response = $order->createOrder();

echo '[ID] '.$response['id'].' [Status] '.$response['status']. PHP_EOL;

$response = $order->updateOrder('5WR76359WC455372L');

echo '[Code] '.$response['code']. PHP_EOL;

$response = $order->getOrder('5WR76359WC455372L');

echo '[ID] '.$response['id'].' [Status] '.$response['status']. PHP_EOL;
