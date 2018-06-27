<?php

use Elastic\Product\PostType\Product;

?>

<?php while (have_posts()) : the_post(); ?>
    <?php
        global $post;
        /** @var WC_Product $product */
        global $product;
        $ptProduct = Product::create($post);
        $link = get_permalink($post);
        $thumbnail = $ptProduct->getThumbnail();
    ?>

    <div class="col-xs-12 col-md-4">
        <div class="product <?php echo $thumbnail ? '' : 'img-dummy'; ?>">
            <a href="<?php echo $link ?>" class="image-wrapper">
                <?php if ($thumbnail) : ?>
                    <img class="img-fluid"
                         src="<?php echo $thumbnail; ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                <?php else : ?>
                    <div class="img-dummy-wrapper">
                        <img class="img-fluid dummy"
                             src="<?php echo IMG_SRC_DUMMY_SQUARE; ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                    </div>
                <?php endif; ?>
            </a>

            <div class="info-wrapper">
                <div class="name">
                    <a href="<?php echo $link ?>">
                        <?php  echo get_the_title(); ?>
                    </a>
                </div>
                <div class="price-wrapper text-center">
                    <?php echo $product->get_price_html(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>
