<?php

namespace PayPal\Services;

use Exception;
use PayPal\HttpClient\PayPalClient;
use PayPal\Utils\Validation;

class Auth
{
    private $client;

    public function __construct()
    {
        $this->client = new PayPalClient;
    }

    public function getAuthToken(): string
    {
        // $response = $this->client->post($this->request->setUri(), $this->request->setBody());
        $response = $this->client->post();

        $this->validateStatusCode($response);

        $data = json_decode($response->getBody(), true);
        
        $access_token = $data['access_token'];

        return $access_token;
    }

    public function revokeAuthToken(string $token): bool
    {
        // $response = $this->client->post($this->request->setUri(), $this->request->setBody($token));
        $response = $this->client->post($token);

        $this->validateStatusCode($response);
        
        return true;
    }

    private function validateStatusCode($response)
    {
        if (Validation::is4xx($response->getStatusCode()) || Validation::is5xx($response->getStatusCode())) {
            throw new Exception('Server Error');
        }

        return true;
    }
}