<?php

namespace PayPal\Request;

Interface RequestTokenInterface
{
    public function getUri(): string;
    public function getBody(): string;
}