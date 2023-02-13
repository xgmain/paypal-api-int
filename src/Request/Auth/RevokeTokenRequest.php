<?php

namespace PayPal\Request\Auth;

use PayPal\Request\PayPalRequest;
use PayPal\Request\RequestTokenInterface;

class RevokeTokenRequest extends PayPalRequest implements RequestTokenInterface
{
    private $token;

    public function getUri(): string
    {
        return $this->uri.'/v1/oauth2/token/terminate';
    }

    public function setToken($token): void
    {
        $this->token = $token;
    }

    public function getBody(): string
    {
        return "token=".$this->token."&token_type_hint=ACCESS_TOKEN";
    }

    public function getContext(string $body): array
    {
        return parent::getContext($body);
    }
}