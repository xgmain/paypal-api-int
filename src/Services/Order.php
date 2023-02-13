<?php

namespace PayPal\Services;

use PayPal\HttpClient\PayPalClient;
use PayPal\Request\Order\CreateOrderRequest;
use PayPal\Request\Order\ShowOrderRequest;
use PayPal\Request\Order\UpdateOrderRequest;
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

    public function updateOrder(string $id)
    {
        $jsonBody = [
            [
                "op" => "add",
                "path" => "/purchase_units/@reference_id=='default'/invoice_id",
                "value" => "03012022-3303-01"
            ]
        ];

        $request = new UpdateOrderRequest;
        $request->setBody($jsonBody);

        $response = $this->client->setRequest($request)->patch($id);

        Validation::validateStatusCode($response);
        
        return ['code' => $response->getStatusCode()];
    }

    public function getOrder(string $id)
    {
        $response = $this->client->setRequest(new ShowOrderRequest)->get($id);

        Validation::validateStatusCode($response);
        
        return json_decode($response->getBody(), true);
    }
}