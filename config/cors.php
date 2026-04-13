<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure CORS settings for your application. This will
    | enable API requests from different origins (including Flutter apps)
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://localhost:3000',
        'http://localhost:8000',
        'http://localhost:8080',
        'http://127.0.0.1:8000',
        'http://cinegomobile.local',
    ],

    'allowed_origins_patterns' => [
        '#^https://.*\.cinego\.local$#',
    ],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
