<?php

use Brisum\Lib\ObjectManager;
use Elastic\Product\PostType\Product;

$objectManager = ObjectManager::getInstance();

$objectManager->create('Elastic\Product\PostType\PostTypeRegistrator');
$objectManager->create('Elastic\Product\PostType\Breadcrumbs');
//$objectManager->create('Elastic\Product\PostType\Taxonomies');

$objectManager->create('Elastic\Product\Plugin\Filter');

add_image_size('product_category_thumbnail', 255, 255, true);


add_filter('posts_orderby', 'elastic_product_posts_orderby', 100, 1);
function elastic_product_posts_orderby($orderby_statement) {
    if (is_post_type_archive(Product::POST_TYPE)) {
        global $wpdb;
        $orderby_statement = "{$wpdb->posts}.post_date DESC";
    }

    return $orderby_statement;
}
