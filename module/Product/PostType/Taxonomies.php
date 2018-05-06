<?php

namespace Elastic\Product\PostType;

use Brisum\Wordpress\PostType\Taxonomies as BaseTaxonomies;
use Elastic\Product\ProductCategoryService;

class Taxonomies extends BaseTaxonomies
{
	/**
	 * @var string
	 */
	protected $postType = Product::POST_TYPE;

	/**
	 * @var array
	 */
	protected  $taxonomies = [
        ProductCategoryService::TAXONOMY_PRODUCT_CATEGORY => [
			'label' => 'Категория товара',
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_admin_column' => true,
			'hierarchical' => true,
            'rewrite' => [
                'slug' => 'product'
            ]
		]
	];

	public function filterProductCategoryRewriteRules($rewriteRules)
	{
		return $rewriteRules;
	}
}
