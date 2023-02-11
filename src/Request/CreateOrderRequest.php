<?php

namespace PayPal\Request;

class CreateOrderRequest extends PayPalRequest implements RequestTokenInterface
{
    public function getUri(): string
    {
        return $this->uri.'/v2/checkout/orders';
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
