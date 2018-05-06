<?php

use Brisum\Lib\ObjectManager;

$objectManager = ObjectManager::getInstance();

$objectManager->create('Elastic\Product\PostType\PostTypeRegistrator');
$objectManager->create('Elastic\Product\PostType\Breadcrumbs');
$objectManager->create('Elastic\Product\PostType\Taxonomies');

