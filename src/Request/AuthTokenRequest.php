<?php

namespace PayPal\Request;

class AuthTokenRequest extends PayPalRequest implements RequestTokenInterface
{
    public function setUri(): string
    {
        return $this->uri.'/v1/oauth2/token';
    }

    public function setBody(): string
    {
        return 'grant_type=client_credentials';
    }
}