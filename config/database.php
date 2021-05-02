<?php

return [
    'connections' => [

        'main' => [
            'driver' => 'mysql',
            'host' => env('MYSQL_MAIN_HOST'),
            'port' => env('MYSQL_MAIN_PORT'),
            'database' => env('MYSQL_MAIN_DB'),
            'username' => env('MYSQL_MAIN_USERNAME'),
            'password' => env('MYSQL_MAIN_PASSWORD'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'strict'    => false,
        ],
        
    ],
];
