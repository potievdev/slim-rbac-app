<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

$container = $app->getContainer();

$container['em'] = function () use ($container) {
    $config = $container->get('settings');

    $paths = [$config['entitiesDir']];
    $isDevMode = $config['devMode'];
    $dbParams = $config['db'];

    $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
    return EntityManager::create($dbParams, $config);
};