<?php

namespace PayPal\Services;

use PayPal\HttpClient\PayPalClient;
use PayPal\Request\CreateOrderRequest;
use PayPal\Utils\Validation;

class Order
{
    private $client;

    public function __construct()
    {
        $this->client = new PayPalClient;
    }

    public function createOrder()
    {
        $response = $this->client->setRequest(new CreateOrderRequest)->post();

        Validation::validateStatusCode($response);
        
        $data = json_decode($response->getBody(), true);
    }
}