<?php

namespace PayPal\Request;

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
}