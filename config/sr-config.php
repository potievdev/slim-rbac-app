<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$dbParams = [
    'driver'   => 'pdo_mysql',
    'host'     => 'localhost',
    'user'     => 'slim',
    'password' => 'slim123',
    'dbname'   => 'slim',
    'port'     => 3306
];

$config = Setup::createAnnotationMetadataConfiguration([], false, null, null, false);

return EntityManager::create($dbParams, $config);