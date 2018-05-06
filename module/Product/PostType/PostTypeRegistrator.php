<?php

namespace Elastic\Product\PostType;

use Brisum\Wordpress\PostType\PostTypeRegistrator as BasePostTypeRegistator;

class PostTypeRegistrator extends BasePostTypeRegistator
{
	protected $postType = Product::POST_TYPE;

	protected $config = [
		'label' => 'Товар',
		'public' => true,
		'show_ui' => true,
		'show_in_nav_menus' => false,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'author',
		),
		'has_archive' => true
	];

	protected $rewriteRules = [
		"^product/?$" => 'index.php?post_type=product',
		"^([^/]+)/?$" => 'index.php?post_type=product&name=$matches[1]'
	];
}
