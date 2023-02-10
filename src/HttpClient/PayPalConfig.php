<?php

namespace PayPal\HttpClient;

class PayPalConfig
{
    const SETTINGS = [
        'mode'    => 'sandbox',
        'sandbox' => [
            'api_url' => 'https://api-m.sandbox.paypal.com',
            'gateway_url' => 'https://www.sandbox.paypal.com',
            'ipn_url' => 'https://ipnpb.sandbox.paypal.com/cgi-bin/websc',
            'client_id'         => 'AXDr1VlddOJri0edvMZfgdZnhAE-5f_j1s0aH8ntdoGWkZDYylKBTRp-wCHTauhzFGQBNKm-792YbT00',
            'client_secret'     => 'EFjtCEomM94AvQZF6MjOse-uQ35W0kXLPhDjeXJZIIogUlWPJTMES2-1wxChaU8taP9cliT5UAsaA7fT',
            'app_id'            => 'Default Application',
        ],
        'live' => [
            'api_url' => 'https://api-m.sandbox.paypal.com',
            'gateway_url' => 'https://www.sandbox.paypal.com',
            'ipn_url' => 'https://ipnpb.sandbox.paypal.com/cgi-bin/websc',
            'client_id'         => '',
            'client_secret'     => '',
            'app_id'            => '',
        ],
    
        'payment_action' => 'Sale',
        'currency'       => 'AUD',
        'locale'         => 'en_AU',
    ];
}
