<?php

return [
    'displayErrorDetails' => true,  // for production - false
    'addContentLengthHeader' => false,

    // database settings
    'db' => [
        'host' => 'localhost',
        'user' => 'user',
        'pass' => '',
        'dbname' => 'dbname',
    ],

    // Monolog settings
    'logger' => [
        'name' => 'project',
        'path' => '../logs/app-' . date('Y-m-d') . '.log',
        'level' => \Monolog\Logger::DEBUG,
        // 'level' => \Monolog\Logger::INFO,  // for production
    ],
];
