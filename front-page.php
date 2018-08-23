<?php get_header(); ?>

<?php

use Brisum\Lib\ObjectManager;
use Elastic\Product\ProductCategoryService;

$objectManager = ObjectManager::getInstance();
/** @var ProductCategoryService $productCategoryService */
$productCategoryService = $objectManager->get('Elastic\Product\ProductCategoryService');
$gridCategories = $productCategoryService->getTopCategories();

the_post();

?>

<div class="slick-wrapper">
    <?php $objectManager->create('Elastic\Theme\VisualComponent\MainSlider')->render(); ?>
</div>

<div class="container">
    <div class="row product-category-grid">
        <div class="col-12">
            <?php get_template_part('template-parts/product/product-category-grid'); ?>
        </div>
    </div>
    <div class="row main-content">
        <div class="col-12">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>