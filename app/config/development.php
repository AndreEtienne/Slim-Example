<?php
return[
    'app' =>[
        'url' => 'http://rabel.local/',
        'hash' =>[
            'algo' => PASSWORD_BCRYPT,
            'cost' => 10
        ]
    ],

    'db' =>[
        'driver' => 'mysql',
        'host' => 'localhost',
        'name' => 'andre',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => ''

    ],

    'auth' => [
        'session' => 'user_id',
        'remember' => 'user_r'
    ],

    'mail' => [
        'smtp_auth' => true,
        'smtp_secure' => 'tls',
        'host' => 'smtp.gmail.com',
        'username' => 'andreetienne1987@gmail.com',
        'password' => '02456339',
        'port' => 587,
        'html' => true
    ],

    'twig' =>[
        'debug' => true
    ],

    'csrf' =>[
        'session' => 'csrf_token'
    ]
];