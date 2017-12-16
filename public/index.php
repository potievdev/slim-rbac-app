<?php

// Autoload
require '../vendor/autoload.php';

// Creating application instance
$app = new \Slim\App;

// Include middleware configuration file
require '../config/middleware.php';

// Include routes configuration file
require '../config/routes.php';

// Run application
$app->run();