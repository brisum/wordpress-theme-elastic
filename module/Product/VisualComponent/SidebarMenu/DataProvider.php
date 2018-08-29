<?php

namespace Elastic\Product\VisualComponent\SidebarMenu;

use Brisum\Lib\VisualComponent\DataProviderInterface;
use Elastic\Product\PostType\Product;
use Elastic\Product\ProductCategoryService;
use Elastic\Term\TermService;
use WP_Post;
use WP_Term;

class DataProvider implements DataProviderInterface
{
    protected $termService;
    /**
     * @param TermService $termService
     */
    public function __construct(TermService $termService)
    {
        $this->termService = $termService;
    }

    /**
     * @return array
     */
    function getData()
    {
        global $post;
        $list = [];
        /** @var WP_Term[] $terms */
        $terms = get_terms([
            'taxonomy' => ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY,
            'hide_empty' => false,
            'parent' => 0
        ]);
        $currentCategory = get_query_var(ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY);
        $currentTerm = is_single()
            ? $this->termService->getLowestTerm($post, ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY)
            : ($currentCategory ? get_term_by('slug', $currentCategory, ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY) : null);
        $currentList = [];

        usort($terms, [$this, 'sortTerms']);
        foreach ($terms as $term) {
            $list[$term->slug] = [
                'title' => $term->name,
                'href' => get_term_link($term, ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY),
                'classes' => [],
                'child' => []
            ];
        }

        if (!$currentTerm instanceof WP_Term) {
            $currentTerm = null;
        }
        if ($currentTerm) {
            $termList = get_terms([
                'taxonomy' => ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY,
                'hide_empty' => false,
                'parent' => $currentTerm->term_id
            ]);

            usort($termList, [$this, 'sortTerms']);
            foreach ($termList as $term) {
                $currentList[$term->slug] = [
                    'title' => $term->name,
                    'href' => get_term_link($term, ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY),
                    'classes' => [],
                    'child' => []
                ];
            }
        }
        if ($currentTerm && !$currentList) {
            $productList = get_posts([
                'post_type' => Product::POST_TYPE,
                'numberposts' => -1,
                'tax_query' => [
                    [
                        'taxonomy' => ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY,
                        'field' => 'id',
                        'terms' => $currentTerm->term_id
                    ]
                ],
                'orderby' => 'date',
                'order' => 'DESC',
            ]);

            // usort($productList, [$this, 'sortPosts']);
            $isSingle = is_single();
            foreach ($productList as $product) {
                $currentList[$product->post_name] = [
                    'title' => get_the_title($product),
                    'href' => get_permalink($product),
                    'classes' => ['post', $isSingle && $product->ID == $post->ID ? 'active' : ''],
                    'child' => []
                ];
            }
        }

        if ($currentTerm) {
            while ($currentTerm && $currentTerm->parent) {
                $tmpList = [
                    $currentTerm->slug => [
                        'title' => $currentTerm->name,
                        'href' => get_term_link($currentTerm, ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY),
                        'classes' => ['active'],
                        'child' => $currentList
                    ]
                ];
                $currentTerm = get_term($currentTerm->parent, ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY);
                $currentList = [];

                $termList = get_terms([
                    'taxonomy' => ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY,
                    'hide_empty' => false,
                    'parent' => $currentTerm->term_id
                ]);

                usort($termList, [$this, 'sortTerms']);
                foreach ($termList as $term) {
                    $currentList[$term->slug] = [
                        'title' => $term->name,
                        'href' => get_term_link($term, ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY),
                        'classes' => [],
                        'child' => []
                    ];
                }
                foreach ($tmpList as $slug => $branch) {
                    if (isset($currentList[$slug])) {
                        $currentList[$slug] = $branch;
                    }
                }
            }
        }

        if ($currentTerm && isset($list[$currentTerm->slug])) {
            $list[$currentTerm->slug]['classes'] = ['active'];
            $list[$currentTerm->slug]['child'] = $currentList;
        }

        return ['list' => $list];
    }

    public function sortTerms(WP_Term $termA, WP_Term $termB)
    {
        $a = intval($termA->term_order);
        $b = intval($termB->term_order);

        if ($a == $b) {
            return strcmp($termA->name, $termB->name);
        }
        return ($a < $b) ? -1 : 1;
    }

    public function sortPosts(WP_Post $postA, WP_Post $postB)
    {
        return strcmp($postA->post_title, $postB->post_title);
    }
}
