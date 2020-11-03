<?php

// vendor autoload
require '../vendor/autoload.php';

// set parameters
date_default_timezone_set('Europe/Kiev');

// get settings
$settings = [
    'settings' => require '../configs/settings.php',
];

// generate application
$app = new \Slim\App($settings);

// dependencies
require '../configs/dependencies.php';

// routes
require '../configs/routes.php';

// execute
$app->run();
