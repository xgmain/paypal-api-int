<?php

namespace PayPal\Request\Order;

use PayPal\Request\PayPalRequestWithToken;
use PayPal\Request\RequestTokenInterface;

class ShowOrderRequest extends PayPalRequestWithToken implements RequestTokenInterface
{
    use OrderRequestTrait;

    public function getUri(string $id = null): string
    {
        return $this->uri.'/v2/checkout/orders/'.$id;
    }
}
