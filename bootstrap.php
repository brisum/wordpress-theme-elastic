<?php

use Brisum\Lib\ObjectManager;

$autoload = require(dirname(__FILE__) . '/vendor/autoload.php');

global $wpdb;
$configList = [
    include __DIR__ . '/module/Theme/etc/di.php',
    include __DIR__ . '/vendor/brisum/wordpress-module-breadcrumbs/src/etc/di.php',
];
$config = [
    'preference' => [],
    'virtualType' => [],
    'type' => [],
];
$sharedInstances = [
    'Composer\Autoloader' => $autoload,
    'wpdb' => $wpdb
];

foreach ($configList as $configItem) {
    $config['preference'] = array_merge($config['preference'], $configItem['preference']);
    $config['virtualType'] = array_merge($config['virtualType'], $configItem['virtualType']);
    $config['type'] = array_merge($config['type'], $configItem['type']);
}

$objectManager = new ObjectManager($config, $sharedInstances);
ObjectManager::setInstance($objectManager);
