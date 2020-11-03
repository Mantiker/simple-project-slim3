<?php
/** @var $app \Slim\App */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// group for use middleware
$app->group('', function(\Slim\App $app) {
    // main page
    $app->get('/', App\Controllers\IndexController::class . ':index');

    // contacts page
    $app->get('/contacts', App\Controllers\IndexController::class . ':contacts');
})->add(new \App\Middlewares\DefaultMiddleware($app->getContainer()));
