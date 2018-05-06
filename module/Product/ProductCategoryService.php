<?php

namespace Elastic\Product;

use Elastic\Product\PostType\Product;
use WP_Term;

class ProductCategoryService
{
    const TAXONOMY_PRODUCT_CATEGORY = 'product-category';

    public function getTopCategories()
    {
        /** @var WP_Term[] $terms */
        $terms = get_terms([
            'taxonomy' => self::TAXONOMY_PRODUCT_CATEGORY,
            'hide_empty' => false,
            'parent' => 0,
            'orderby'       => 'term_order',
            'order'         => 'ASC',
        ]);

        return $terms;
    }

    public function getImage(WP_Term $term)
    {
        $imageId = get_term_meta($term->term_id, 'image', true);
        $imageSrc = $imageId ? wp_get_attachment_image_src($imageId, 'full') : null;

        return $imageSrc && is_array($imageSrc) ? $imageSrc[0] : null;
    }
}