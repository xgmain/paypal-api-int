<?php

namespace PayPal\Services;

use PayPal\HttpClient\PayPalClient;
use PayPal\Request\Order\CreateOrderRequest;
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
        $jsonBody = [
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "100.00"
                    ]
                ]
            ]
        ];

        $request = new CreateOrderRequest;
        $request->setBody($jsonBody);

        $response = $this->client->setRequest($request)->post();

        Validation::validateStatusCode($response);
        
        return json_decode($response->getBody(), true);
    }
}