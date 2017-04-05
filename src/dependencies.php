<?php
require_once ('utils/Mongodb.php');

// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// mock up
$container['mock'] = function ($c) {
    $settings = $c->get('settings')['mock'];
    $ifMock = $settings['mock'];
    return $ifMock;
};

// mongodb
$container['mongodb'] = function ($c) {
    $settings = $c->get('settings')['mongodb'];
    $mongodb = new \src\utils\Mongodb($settings['host'], $settings['port'], $settings['db']);
    return $mongodb;
};
