<?php

// Autoload
require '../vendor/autoload.php';

/** @var array $config */
$config = require '../config/config.php';

/** @var \Slim\Container $container */
$container = new \Slim\Container(['settings' => $config, 'debug' => true]);

// Creating application instance
$app = new \Slim\App($container);

// Include dependencies configuration file
require '../config/dependencies.php';

// Include middleware configuration file
require '../config/middleware.php';

// Include routes configuration file
require '../config/routes.php';

// Run application
$app->run();