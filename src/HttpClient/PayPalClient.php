<?php

namespace PayPal\HttpClient;

use Exception;
use PayPal\HttpClient\PayPalConfig;
use PayPal\Config\GlobleConfig;
use GuzzleHttp\Client;
use PayPal\Request\RequestTokenInterface;
use PayPal\Request\AuthTokenRequest;
use PayPal\Request\CreateOrderRequest;
use PayPal\Request\RevokeTokenRequest;
use PayPal\Request\UserInfoRequest;
use PayPal\Request\GenerateTokenRequest;

class PayPalClient
{
    private $mode;
    private $apiUrl;
    private $gatewayUrl;
    private $ipnUrl;
    private $clientID;
    private $clientSecret;
    private $appID;
    private $httpClient;
    private $request;

    public function __construct()
    {
        $this->mode = PayPalConfig::SETTINGS['mode'];
        $this->setConfig(PayPalConfig::SETTINGS[$this->mode]);
        $this->httpClient = new Client();
    }

    public function __call(string $method, array $params)
    {
        if (!in_array($method, GlobleConfig::ALLOWMETHOD)) {
            throw new Exception('Bad method call');
        }

        $body = $this->request->getBody();
        $uri = $this->request->getUri(...$params);
        $context = $this->request->getContext($body);
        // var_dump($uri, $context);
        return $this->httpClient->request(strtoupper($method), $uri, $context);
    }

    private function setConfig(array $setting): void
    {
        $this->apiUrl = $setting['api_url']; 
        $this->gatewayUrl = $setting['gateway_url']; 
        $this->ipnUrl = $setting['ipn_url']; 
        $this->clientID = $setting['client_id']; 
        $this->clientSecret = $setting['client_secret']; 
        $this->appID = $setting['app_id']; 
    }

    public function setRequest(RequestTokenInterface $request): self
    {
        $this->request = $request;

        return $this;
    }
}