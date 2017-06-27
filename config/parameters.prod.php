<?php

/**
 * This is the parameters file used on the "prod" environment (production)
 */

return [
    'atk' => [

        'identifier' => 'atk-skeleton-prod', // CHANGE ME!


        'db' => [
            'default' => [
                'host' => 'localhost',
                'db' => '********',
                'user' => '********',
                'password' => '********',
                'charset' => 'utf8',
                'driver' => 'MySqli',
            ],
        ],

        'debug' => 0,
        'meta_caching' => false,
        'auth_ignorepasswordmatch' => false,
        'administratorpassword' => '$2y$10$erDvMUhORJraJyxw9KXKKOn7D1FZNsaiT.g2Rdl/4V6qbkulOjUqi', // administrator
    ],
];