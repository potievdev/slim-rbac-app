<?php

// Autoload
require '../vendor/autoload.php';

/** @var \Doctrine\ORM\EntityManager $entityManager */
$entityManager = require __DIR__ . '/../config/sr-config.php';

/** @var \Slim\Container $container */
$container = new \Slim\Container(['settings' => ['displayErrorDetails' => true]]);

$container['em'] = $entityManager;

// Creating application instance
$app = new \Slim\App($container);

// Include middleware configuration file
require '../config/middleware.php';

// Include routes configuration file
require '../config/routes.php';

// Run application
$app->run();