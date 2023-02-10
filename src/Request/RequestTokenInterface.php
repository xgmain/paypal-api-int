<?php

namespace PayPal\Request;

Interface RequestTokenInterface
{
    public function setUri(): string;
    public function setBody(): string;
}