<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | UW PWS Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [
        'main' => [
            'base_uri' => env('UW_BASE_URI', ''),
            'cert' => env('UW_CERT_FILE', '/path/to/cert.pem'),
            'ssl_key' => env('UW_KEY_FILE', '/path/to/cert.key')
        ],

        'alternative' => [
            'base_uri' => env('UW_ALT_BASE_URI', ''),
            'cert' => env('UW_ALT_CERT_FILE', '/alt/path/to/cert.pem'),
            'ssl_key' => env('UW_ALT_KEY_FILE', '/alt/path/to/cert.key')
        ]
    ]
];
