<?php
/** @var $app \Slim\App */
$container = $app->getContainer();


$addDatabaseToContainer = function ($c) {
    $settingsDb = $c['settings']['db'];

    $pdo = new PDO("mysql:host={$settingsDb['host']};dbname={$settingsDb['dbname']};charset=UTF8", $settingsDb['user'], $settingsDb['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");

    return $pdo;
};

$addLoggerToContainer = function($c) {
    $settingsLogger = $c['settings']['logger'];

    $dateFormat = "Y-m-d H:i:s";
    $output = "%datetime% %extra% [%level_name%] %message%\n";
    $formatter = new Monolog\Formatter\LineFormatter($output, $dateFormat);

    // Create a handler
    $stream = new Monolog\Handler\StreamHandler($settingsLogger['path'], $settingsLogger['level']);
    $stream->setFormatter($formatter);

    $logger = new Monolog\Logger($settingsLogger['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler($stream);

    return $logger;
};

$addViewToContainer = function($c) {
    return new Core\Modules\View\View($c);
};

// database
$container['db'] = $addDatabaseToContainer;

// monolog
$container['logger'] = $addLoggerToContainer;

// view
$container['view'] = $addViewToContainer;


