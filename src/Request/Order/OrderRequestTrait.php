<?php

namespace PayPal\Request\Order;

trait OrderRequestTrait
{
    public function getContext(string $body): array
    {
        return parent::getContext($body);
    }

    public function getBody(): string
    {
        return parent::getBody();
    }
}