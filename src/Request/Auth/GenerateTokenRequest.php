<?php

namespace PayPal\Request\Auth;

use PayPal\Request\PayPalRequest;
use PayPal\Request\RequestTokenInterface;

class GenerateTokenRequest extends PayPalRequest implements RequestTokenInterface
{
    public function getUri(): string
    {
        return $this->uri.'/v1/identity/generate-token';
    }

    public function getBody(): string
    {
        return '';
    }

    public function getContext(string $body): array
    {
        return parent::getContext($body);
    }
}