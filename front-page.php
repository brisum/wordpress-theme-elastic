<?php get_header(); ?>

<?php

use Brisum\Lib\ObjectManager;
use Brisum\Lib\VisualComponent\VisualComponent;

$objectManager = ObjectManager::getInstance();

?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <?php $objectManager->create('Elastic\Theme\VisualComponent\MainSlider')->render(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-3">
            <?php $objectManager->create('Elastic\Product\VisualComponent\ProductCategorySidebarMenu')->render(); ?>
        </div>
        <div class="col-xs-12 col-md-9">
            <?php get_template_part('module/Product/Resources/template/category-grid'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>