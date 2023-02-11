<?php

namespace PayPal\Utils;

class Validation
{
    private static function is4xx(int $code): bool
    {
        return ($code >= 400 && $code < 500) ? true : false;
    }

    private static function is5xx(int $code): bool
    {
        return ($code >= 500 && $code < 600) ? true : false;
    }

    public static function validateStatusCode($response)
    {
        if (Validation::is4xx($response->getStatusCode()) || Validation::is5xx($response->getStatusCode())) {
            throw new \Exception('Server Error');
        }

        return true;
    }
}