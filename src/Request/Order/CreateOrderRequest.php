<?php

namespace PayPal\Request\Order;

use PayPal\Request\PayPalRequestWithToken;
use PayPal\Request\RequestTokenInterface;

class CreateOrderRequest extends PayPalRequestWithToken implements RequestTokenInterface
{
    public function getUri(): string
    {
        return $this->uri.'/v2/checkout/orders';
    }

    public function getContext(string $body): array
    {
        return parent::getContext($body);
    }

    public function getBody(): string
    {
        return parent::getBody();
    }
}