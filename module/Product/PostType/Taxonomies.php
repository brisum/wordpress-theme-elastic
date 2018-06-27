<?php

namespace Elastic\Product\PostType;

use Brisum\Wordpress\PostType\Taxonomies as BaseTaxonomies;

class Taxonomies extends BaseTaxonomies
{
    const TAXONOMY_PRODUCT_SALE = 'product_sale';

    /**
	 * @var string
	 */
	protected $postType = Product::POST_TYPE;

	/**
	 * @var array
	 */
	protected  $taxonomies = [
        self::TAXONOMY_PRODUCT_SALE => [
			'label' => 'Акции',
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_admin_column' => true,
			'hierarchical' => false
		]
	];

	public function filterProductSaleRewriteRules($rewriteRules)
	{
		return [];
	}
}
