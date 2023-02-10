<?php

namespace PayPal\Services;

use Exception;
use PayPal\HttpClient\PayPalClient;
use PayPal\Utils\Validation;
use PayPal\Request\AuthTokenRequest;
use PayPal\Request\RevokeTokenRequest;
use PayPal\Request\UserInfoRequest;

class Auth
{
    private $client;

    public function __construct()
    {
        $this->client = new PayPalClient;
    }

    public function getAuthToken(): string
    {
        $response = $this->client->setRequest(new AuthTokenRequest)->post();

        $this->validateStatusCode($response);

        $data = json_decode($response->getBody(), true);
        
        $access_token = $data['access_token'];

        return $access_token;
    }

    public function revokeAuthToken(string $token): bool
    {
        $response = $this->client->setRequest(new RevokeTokenRequest)->post($token);

        $this->validateStatusCode($response);
        
        return true;
    }

    public function getUserInfo()
    {
        $response = $this->client->setRequest(new UserInfoRequest)->get();

        $this->validateStatusCode($response);

        $data = json_decode($response->getBody(), true);
        
        $userInfo = [
            'id' => $data['user_id'],
            'sub' => $data['sub'],
        ];

        return $userInfo;
    }

    private function validateStatusCode($response)
    {
        if (Validation::is4xx($response->getStatusCode()) || Validation::is5xx($response->getStatusCode())) {
            throw new Exception('Server Error');
        }

        return true;
    }
}