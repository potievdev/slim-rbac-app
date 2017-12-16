<?php

use Potievdev\SlimRbac\Component\AuthMiddleware;
use Potievdev\SlimRbac\Structure\AuthManagerOptions;
use Potievdev\SlimRbacApp\Component\AuthorizeMiddleware;

/** @var \Slim\Container $container */
$container = $app->getContainer();

/** @var \Doctrine\ORM\EntityManager $entityManager */
$entityManager = $container->get('em');

/** @var AuthManagerOptions $authOptions */
$authOptions = new AuthManagerOptions();

/** Setting entity manager */
$authOptions->setEntityManager($entityManager);

/** Adding middleware */
$app->add(new AuthMiddleware($authOptions));

/** User authorization and define user identifier middleware */
$app->add(new AuthorizeMiddleware($entityManager));