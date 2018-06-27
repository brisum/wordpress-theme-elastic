<?php

use Brisum\Lib\ObjectManager;

$objectManager = ObjectManager::getInstance();

$objectManager->create('Elastic\Product\PostType\PostTypeRegistrator');
$objectManager->create('Elastic\Product\PostType\Breadcrumbs');
//$objectManager->create('Elastic\Product\PostType\Taxonomies');

$objectManager->create('Elastic\Product\Plugin\Filter');

add_image_size('product_thumbnail', 255, 255, true);
add_image_size('product_category_thumbnail', 255, 255, true);
