<?php

/**
 * This php script demonstrates how you can:
 * 1) Create roles
 * 2) Create permissions.
 * 3) Assign roles to users.
 * 4) Build roles tree.
 */

use Potievdev\SlimRbac\Component\AuthManager;
use Potievdev\SlimRbac\Models\Entity\Permission;
use Potievdev\SlimRbac\Models\Entity\Role;
use Potievdev\SlimRbac\Structure\AuthOptions;

// Autoload
require_once  'vendor/autoload.php';

/** @var \Doctrine\ORM\EntityManager $entityManager */
$entityManager = require 'config/sr-config.php';

/**
 * @var AuthOptions $authOptions
 * It will pass as argument for AuthManager constructor
 */
$authOptions = new AuthOptions();

// Setting entity manager instance
$authOptions->setEntityManager($entityManager);

// Initialize AuthManager instance
$authManager = new AuthManager($authOptions);

// Clear all roles, permissions, role assigns, role tree
$authManager->removeAll();

// Creating /edit permission
$edit = new Permission();
$edit->setName('/edit');
$authManager->addPermission($edit);

// Creating /write permission
$write = new Permission();
$write->setName('/write');
$authManager->addPermission($write);

// Creating moderator role
$moderator = new Role();
$moderator->setName('moderator');
$authManager->addRole($moderator);

// Creating admin role
$admin = new Role();
$admin->setName('admin');
$authManager->addRole($admin);

// Adding /edit permission to moderator role
$authManager->addChildPermission($moderator, $edit);

// Adding /write permission to admin role
$authManager->addChildPermission($admin, $write);

// Adding moderator role to admin as child. After this admin role obtain all moderator permissions
$authManager->addChildRole($admin, $moderator);

// Demo moderator user identifier
$moderatorUserId = 1;
// Demo admin user identifier
$adminUserId = 2;

// Assigning moderator role to user (user.id = 1)
$authManager->assign($moderator, $moderatorUserId);

// Assigning admin role to user (user.id = 1)
$authManager->assign($admin, $adminUserId);