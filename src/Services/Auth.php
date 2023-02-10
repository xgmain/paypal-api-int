<?php

namespace PayPal\Services;

use Exception;
use PayPal\HttpClient\PayPalClient;
use PayPal\Request\RequestTokenInterface;
use PayPal\Utils\Validation;

class Auth
{
    private $client;
    private $request;

    public function __construct(RequestTokenInterface $request)
    {
        $this->client = new PayPalClient;
        $this->request = $request;
    }

    public function getAuthToken(): string
    {
        $response = $this->client->post($this->request->setUri(), $this->request->setBody());

        $this->validateStatusCode($response);

        $data = json_decode($response->getBody(), true);
        
        $access_token = $data['access_token'];

        return $access_token;
    }

    public function revokeAuthToken(string $token): bool
    {
        $response = $this->client->post($this->request->setUri(), $this->request->setBody($token));

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