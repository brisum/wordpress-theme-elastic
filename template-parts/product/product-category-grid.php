<?php

use Brisum\Lib\ObjectManager;
use Elastic\Product\ProductCategoryService;

/** @var ProductCategoryService $productCategoryService */
$productCategoryService = ObjectManager::getInstance()->get('Elastic\Product\ProductCategoryService');
$categories = $productCategoryService->getTopCategories();
$col = is_home() || is_front_page() ? 'col-12 col-md-3' : 'col-12 col-md-4';

?>

<div class="row product-category-grid">
    <?php foreach ($categories as $category) : ?>
        <?php
        $link = get_term_link($category, ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY);
        $image = $productCategoryService->getImage($category);
        ?>

        <div class="<?php echo $col; ?>">
            <div class="product-category <?php echo $image ? '' : 'img-dummy'; ?>">
                <a href="<?php echo $link ?>">
                    <?php if ($image) : ?>
                        <img class="img-fluid"
                             src="<?php echo $image; ?>" alt="<?php echo esc_attr($category->name); ?>">
                    <?php else : ?>
                        <div class="img-dummy-wrapper">
                            <img class="img-fluid dummy"
                                 src="<?php echo IMG_SRC_DUMMY_SQUARE; ?>" alt="<?php echo esc_attr($category->name); ?>">
                        </div>
                    <?php endif; ?>
                </a>

                <div class="name-wrapper">
                    <div class="name">
                        <a href="<?php echo $link ?>">
                            <?php  echo $category->name; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
