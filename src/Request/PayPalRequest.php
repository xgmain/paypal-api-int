<?php

namespace PayPal\Request;

use PayPal\Config\GlobleConfig;
use PayPal\HttpClient\PayPalConfig;

class PayPalRequest
{
    public $mode;
    // protected $access_token;
    // private $config;
    // protected $currency;
    // protected $options;
    private $locale;
    protected $uri;
    private $clientId;
    private $clientSecret;

    public function __construct()
    {
        $this->mode =  PayPalConfig::SETTINGS['mode'];
        $this->locale = PayPalConfig::SETTINGS['locale'];
        $this->uri = PayPalConfig::SETTINGS[$this->mode]['api_url'];
        $this->clientId = PayPalConfig::SETTINGS[$this->mode]['client_id'];
        $this->clientSecret = PayPalConfig::SETTINGS[$this->mode]['client_secret'];
    }

    private function setHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Accept-Language' => $this->locale,
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
    }

    private function setAuth(): array
    {
        return [
            $this->clientId,
            $this->clientSecret,
            'basic',
        ];
    }

    public function setContext(string $body): array
    {
        return [
            'header' => $this->setHeaders(),
            'body' => $body,
            'auth' => $this->setAuth(),
        ];
    }

    // public function setApiEnvironment(): void
    // {
    //     $this->mode = PayPalConfig::SETTINGS['mode'];
    // }

    // public function setCurrency(string $currency)
    // {
    //     // Check if provided currency is valid.
    //     if (!in_array($currency, GlobleConfig::CURRENCY, true)) {
    //         // throw exception
    //     }

    //     $this->currency = $currency;

    //     return $this;
    // }

    // public function setHttpClientConfiguration()
    // {

    // }
}