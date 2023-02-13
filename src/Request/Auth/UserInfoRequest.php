<?php

namespace PayPal\Request\Auth;

use PayPal\Request\PayPalRequest;
use PayPal\Request\RequestTokenInterface;

class UserInfoRequest extends PayPalRequest implements RequestTokenInterface
{
    public function getUri(): string
    {
        return $this->uri.'/v1/identity/oauth2/userinfo?schema=paypalv1.1';
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