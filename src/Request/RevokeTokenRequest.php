<?php

namespace PayPal\Request;

class RevokeTokenRequest extends PayPalRequest implements RequestTokenInterface
{
    public function setUri(): string
    {
        return $this->uri.'/v1/oauth2/token/terminate';
    }

    public function setBody(string $token = null): string
    {
        return "token=".$token."&token_type_hint=ACCESS_TOKEN";
    }
}