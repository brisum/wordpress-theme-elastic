<?php

use Elastic\Product\ProductCategoryService;

$categorySlug = get_query_var(ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY);
$category = $categorySlug ? get_term_by('slug', $categorySlug, ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY): null;

?>

<h1>
    <?php echo $category ? $category->name : 'Товары'; ?>
</h1>

<div class="row content product-list">
    <?php get_template_part('template-parts/product/product-list-loop'); ?>
</div>
