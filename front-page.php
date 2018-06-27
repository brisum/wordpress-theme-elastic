<?php get_header(); ?>

<?php

use Brisum\Lib\ObjectManager;

$objectManager = ObjectManager::getInstance();

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