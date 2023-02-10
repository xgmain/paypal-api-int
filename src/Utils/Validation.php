<?php

namespace PayPal\Utils;

class Validation
{
    public static function is4xx(int $code): bool
    {
        return ($code >= 400 && $code < 500) ? true : false;
    }

    public static function is5xx(int $code): bool
    {
        return ($code >= 500 && $code < 600) ? true : false;
    }
}