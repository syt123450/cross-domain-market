<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // Mock settings
        'mock' => [
            'mock' => true
        ],

        // Mongo DB settings
        'mongodb' => [
            'host' => 'localhost',
            'port' => '27017',
            'db' => 'db272',
        ],

        // Constant settings
        'pagination' => [
            'commentPerPage' => 5,
            'productPerPage' => 10
        ],
    ],
];
