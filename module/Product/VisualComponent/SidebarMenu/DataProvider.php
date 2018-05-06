<?php

namespace Elastic\Product\VisualComponent\SidebarMenu;

use Brisum\Lib\VisualComponent\DataProviderInterface;
use Elastic\Product\ProductCategoryService;
use WP_Term;

class DataProvider implements DataProviderInterface
{
    /**
     * @return array
     */
    function getData()
    {
        $list = [];
        /** @var WP_Term[] $terms */
        $terms = get_terms([
            'taxonomy' => ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY,
            'hide_empty' => false,
            'parent' => 0
        ]);

        foreach ($terms as $term) {
            $list[$term->slug] = [
                'title' => $term->name,
                'href' => get_term_link($term, ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY),
            ];
        }

        return ['list' => $list];
    }
}
