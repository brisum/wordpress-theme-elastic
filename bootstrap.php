<?php

use Brisum\Lib\ObjectManager;

$autoload = require(dirname(__FILE__).'/vendor/autoload.php');

global $wpdb;
$config = include dirname(__FILE__) . '/etc/di.php';
$sharedInstances = [
	'Composer\Autoloader' => $autoload,
	'wpdb' => $wpdb
];
$objectManager = new ObjectManager($config, $sharedInstances);
ObjectManager::setInstance($objectManager);

ObjectManager::setInstance($objectManager);

