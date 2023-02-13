<?php

namespace PayPal\Request;

use PayPal\HttpClient\PayPalConfig;

class PayPalRequestWithToken
{
    public $mode;
    private $locale;
    protected $uri;
    private $accessToken;
    private $jsonBody;

    public function __construct()
    {
        $this->mode =  PayPalConfig::SETTINGS['mode'];
        $this->locale = PayPalConfig::SETTINGS['locale'];
        $this->uri = PayPalConfig::SETTINGS[$this->mode]['api_url'];
        $this->accessToken = PayPalConfig::SETTINGS[$this->mode]['accessToken'];
    }

    private function getHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Accept-Language' => $this->locale,
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$this->accessToken,
        ];
    }

    public function getContext(string $body): array
    {
        return [
            'headers' => $this->getHeaders(),
            'json' => json_decode($body),
        ];
    }

    public function setBody(array $body): void
    {
        $this->jsonBody = $body;
    }

    public function getBody(): string
    {
        return json_encode($this->jsonBody);
    }
}