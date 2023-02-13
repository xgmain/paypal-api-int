<?php

namespace PayPal\Request\Order;

use PayPal\Request\PayPalRequestWithToken;
use PayPal\Request\RequestTokenInterface;

class CreateOrderRequest extends PayPalRequestWithToken implements RequestTokenInterface
{
    use OrderRequestTrait;
    
    public function getUri(): string
    {
        return $this->uri.'/v2/checkout/orders';
    }
}
