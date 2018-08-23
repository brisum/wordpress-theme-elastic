<?php get_header(); ?>

<?php

use Brisum\Lib\ObjectManager;
use Elastic\Product\ProductCategoryService;

$objectManager = ObjectManager::getInstance();
/** @var ProductCategoryService $productCategoryService */
$productCategoryService = $objectManager->get('Elastic\Product\ProductCategoryService');
$categorySlug = get_query_var(ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY);
$category = $categorySlug
    ? get_term_by('slug', $categorySlug, ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY)
    : null;
$gridCategories = $category
    ? $productCategoryService->getSubCategories($category)
    : $productCategoryService->getTopCategories();

?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-3">
            <?php $objectManager->create('Elastic\Product\VisualComponent\ProductCategorySidebarMenu')->render(); ?>
        </div>
        <div class="col-xs-12 col-md-9">
            <?php if (!$category) : ?>
                <h1>Товары</h1>
                <?php get_template_part('template-parts/product/product-category-grid'); ?>
            <?php elseif ($gridCategories) : ?>
                <h1><?php echo $category ? $category->name : 'Товары'; ?></h1>
                <?php get_template_part('template-parts/product/product-category-grid'); ?>
            <?php else : ?>
                <h1><?php echo $category ? $category->name : 'Товары'; ?></h1>
                <div class="row content product-list">
                    <?php get_template_part('template-parts/product/product-list-loop'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <?php do_action('viewed_products'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
