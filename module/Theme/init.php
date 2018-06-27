<?php

use Brisum\Lib\ObjectManager;

$objectManager = ObjectManager::getInstance();

$objectManager->create('Elastic\Theme\Plugin\RewriteRule');
