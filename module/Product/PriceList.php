<?php

namespace Elastic\Product;

use Elastic\Product\PostType\Product;
use WP_Post;
use WP_Term;

class PriceList
{
    /**
     * @return array
     */
    public function getData()
    {
        /** @var WP_Term[] $categories */
        $categories = get_terms([
            'taxonomy' => ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY,
            'hide_empty' => false,
            'parent' => 0
        ]);
        $priceList = [];

        foreach ($categories as $category) {
            $postList = get_posts([
                'post_type' => Product::POST_TYPE,
                'tax_query' => [
                    [
                        'taxonomy' => ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY,
                        'field' => 'id',
                        'terms' => $category->term_id
                    ]
                ]
            ]);
            $categoryProductPrice = [
                'category' => $category->name,
                'products' => []
            ];

            usort($postList, [$this, 'sortPosts']);
            foreach ($postList as $post) {
                $product = wc_get_product($post->ID);
                $categoryProductPrice['products'][] = [
                    'title' => get_the_title($post),
                    'href' => get_permalink($post),
                    'price' => $product->get_price_html()
                ];
            }

            $priceList[] = $categoryProductPrice;
        }

        return $priceList;
    }

    public function sortPosts(WP_Post $postA, WP_Post $postB)
    {
        return strcmp($postA->post_title, $postB->post_title);
    }
}
