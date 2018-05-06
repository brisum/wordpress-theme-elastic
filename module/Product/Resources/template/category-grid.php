<?php

use Brisum\Lib\ObjectManager;
use Elastic\Product\ProductCategoryService;

/** @var ProductCategoryService $productCategoryService */
$productCategoryService = ObjectManager::getInstance()->get('Elastic\Product\ProductCategoryService');
$categories = $productCategoryService->getTopCategories();

?>

<div class="row product-category-grid">
    <?php foreach ($categories as $category) : ?>
        <div class="col-xs-12 col-md-4">
            <div class="product-category">
                <?php $image = $productCategoryService->getImage($category); ?>
                <?php if ($image) : ?>
                    <img class="img-fluid"
                         src="<?php echo $image; ?>" alt="<?php echo esc_attr($category->name); ?>">
                <?php else : ?>
                    <img class="img-fluid dummy"
                         src="<?php echo IMG_SRC_DUMMY_SQUARE; ?>" alt="<?php echo esc_attr($category->name); ?>">
                <?php endif ;?>

                <div class="name">
                    <?php  echo $category->name; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
