<?php

namespace PayPal\Services;

use PayPal\HttpClient\PayPalClient;
use PayPal\Utils\Validation;
use PayPal\Request\Auth\AuthTokenRequest;
use PayPal\Request\Auth\RevokeTokenRequest;
use PayPal\Request\Auth\UserInfoRequest;
use PayPal\Request\Auth\GenerateTokenRequest;

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

        Validation::validateStatusCode($response);

        $data = json_decode($response->getBody(), true);
        
        $access_token = $data['access_token'];

        return $access_token;
    }

    public function revokeAuthToken(string $token): bool
    {
        $response = new RevokeTokenRequest;
        $response->setToken($token);

        $response = $this->client->setRequest($response)->post();

        Validation::validateStatusCode($response);
        
        return true;
    }

    public function generateClientToken(): string
    {
        $response = $this->client->setRequest(new GenerateTokenRequest)->post();

        Validation::validateStatusCode($response);
        
        $data = json_decode($response->getBody(), true);

        return $data['client_token'];
    }

    public function getUserInfo(): array
    {
        $response = $this->client->setRequest(new UserInfoRequest)->get();

        Validation::validateStatusCode($response);

        $data = json_decode($response->getBody(), true);
        
        $userInfo = [
            'id' => $data['user_id'],
            'sub' => $data['sub'],
        ];

        return $userInfo;
    }
}