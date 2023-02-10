<?php

namespace PayPal\HttpClient;

use Exception;
use PayPal\HttpClient\PayPalConfig;
use PayPal\Config\GlobleConfig;
use GuzzleHttp\Client;
use PayPal\Request\AuthTokenRequest;
use PayPal\Request\PayPalRequest;
use PayPal\Request\RevokeTokenRequest;

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

    public function __construct()
    {
        $this->mode = PayPalConfig::SETTINGS['mode'];
        $this->setConfig(PayPalConfig::SETTINGS[$this->mode]);
        $this->httpClient = new Client();
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

    public function __call(string $method, array $params)
    {
        if (!in_array($method, GlobleConfig::ALLOWMETHOD)) {
            throw new Exception('Bad method call');
        }

        $request = new PayPalRequest;

        if (count($params) === 0) {
            $request = new AuthTokenRequest;
            $body = $request->getBody();
        } else {
            $request = new RevokeTokenRequest;
            $body = $request->getBody(...$params);
        }

        $uri = $request->getUri();
        $context = $request->getContext($body);

        return $this->httpClient->request(strtoupper($method), $uri, $context);
    }
}