<?php
require("./vendor/autoload.php");

use PayPal\Services\Order;

$order = new Order;

$response = $order->createOrder();

echo '[ID] '.$response['id'].' [Status] '.$response['status'];
