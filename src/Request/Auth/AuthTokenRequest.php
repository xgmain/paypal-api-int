<?php

namespace PayPal\Request\Auth;

use PayPal\Request\PayPalRequest;
use PayPal\Request\RequestTokenInterface;

class AuthTokenRequest extends PayPalRequest implements RequestTokenInterface
{
    public function getUri(): string
    {
        return $this->uri.'/v1/oauth2/token';
    }

    public function getBody(): string
    {
        return 'grant_type=client_credentials';
    }

    public function getContext(string $body): array
    {
        return parent::getContext($body);
    }
}