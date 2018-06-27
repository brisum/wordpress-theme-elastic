<?php

use Elastic\Product\PostType\Product;

the_post();

global $post;
/** @var WC_Product $product */
global $product;
$ptProduct = Product::create($post);
$images = $ptProduct->getImages();
$isSingleImage = 1 == count($images);
$price = $product->get_price();
$attributes = $product->get_attributes();
$videoList = $ptProduct->getVideoList();


$product->get_gallery_image_ids();
?>

<h1>
    <?php the_title(); ?>
</h1>

<div class="content">
    <?php if ($images) : ?>
        <div class="images-block">
            <div class="row">
                <?php if ($isSingleImage) : ?>
                    <div class="col-xs-12">

                    </div>
                <?php else : ?>
                    <div class="col-12 col-md-6">
                        <div class="preview">
                            <img class="img-fluid" src="<?php echo reset($images)['full']; ?>">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 thumbnails">
                        <?php foreach ($images as $image) : ?>
                            <div class="thumbnail-wrapper">
                                <div class="thumbnail">
                                    <img class="img-fluid" src="<?php echo $image['thumbnail']; ?>">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="price-block">
        <div class="row">
            <div class="col-sm-6">
                <?php if ($price) : ?>
                    Цена: <span class="price-value"><?php echo $product->get_price_html(); ?></span>
                <?php endif; ?>
            </div>

            <div class="col-sm-6">
                <button type="button"
                        value="<?php echo esc_attr( $product->get_id() ); ?>"
                        class="btn btn-success"
                        data-require-init="checkout-one-click.widget">
                    Оформить заказ
                </button>
            </div>
        </div>
    </div>

    <div class="info-block">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs" id="info-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#description" class="nav-link active" id="description-tab"
                           data-toggle="tab"
                           role="tab" aria-controls="description" aria-selected="true">
                            Описание
                        </a>
                    </li>

                    <?php if ($attributes) : ?>
                    <li class="nav-item">
                        <a href="#properties" class="nav-link" id="properties-tab"
                           data-toggle="tab"  role="tab" aria-controls="properties" aria-selected="false">
                            Характеристики
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php if ($videoList) : ?>
                    <li class="nav-item">
                        <a href="#video" class="nav-link" id="video-tab"
                           data-toggle="tab"  role="tab" aria-controls="video" aria-selected="false">
                            Видео
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content" id="info-tab-contents">
                    <div class="tab-pane fade show active pt-3" id="description"
                         role="tabpanel" aria-labelledby="description-tab">
                        <?php the_content(); ?>
                    </div>

                    <?php if ($attributes) : ?>
                    <div class="tab-pane fade"
                         id="properties" role="tabpanel" aria-labelledby="properties-tab">
                        <div class="div-table">
                            <div class="div-tbody">
                                <?php foreach ( $attributes as $attribute ) : ?>
                                <div class="div-tr">
                                    <div class="div-td tcol-3">
                                        <?php echo wc_attribute_label( $attribute->get_name() ); ?>
                                    </div>
                                    <div class="div-td tcol-9">
                                        <?php
                                            $values = array();

                                            if ( $attribute->is_taxonomy() ) {
                                                $attribute_taxonomy = $attribute->get_taxonomy_object();
                                                $attribute_values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );

                                                foreach ( $attribute_values as $attribute_value ) {
                                                    $value_name = esc_html( $attribute_value->name );
                                                    $values[] = $value_name;
                                                }
                                            } else {
                                                $values = $attribute->get_options();

                                                foreach ( $values as &$value ) {
                                                    $value = esc_html( $value );
                                                }
                                            }

                                            echo apply_filters( 'woocommerce_attribute', implode( ', ', $values ), $attribute, $values );
                                        ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($videoList) : ?>
                        <div class="tab-pane fade"
                             id="video" role="tabpanel" aria-labelledby="video-tab">
                            <div class="row">
                                <?php foreach ($videoList as $video) : ?>
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <a class="video" data-require-init="magnific-popup.widget"
                                           data-type="iframe"
                                           href="<?php echo $video; ?>"
                                        >
                                            <iframe class="youtube-player"
                                                    type="text/html"
                                                    src="<?php echo $video; ?>"
                                                    allowfullscreen="true" style="border:0;">
                                            </iframe>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
