<?php

namespace Elastic\Product\PostType;

use Brisum\Wordpress\PostType\PostTypeRegistrator as BasePostTypeRegistator;

class PostTypeRegistrator extends BasePostTypeRegistator
{
	protected $postType = Product::POST_TYPE;

	protected $rewriteRules = [
		"^product/?$" => 'index.php?post_type=product',
        "^product/page/([0-9]{1,})/?$" => 'index.php?post_type=product&paged=$matches[1]',

        '^product/([^/]+)/?$' => 'index.php?post_type=product&product_cat=$matches[1]',
        '^product/([^/]+\/[^/]+)/?$' => 'index.php?post_type=product&product_cat=$matches[1]',
        '^product/([^/]+)/page/([0-9]{1,})/?$' => 'index.php?post_type=product&product_cat=$matches[1]&paged=$matches[2]',
        '^product/([^/]+\/[^/]+)/page/([0-9]{1,})/?$' => 'index.php?post_type=product&product_cat=$matches[1]&paged=$matches[2]',

        "^([^/]+)/?$" => 'index.php?post_type=product&name=$matches[1]'
    ];

    protected $metaBoxes = [
        'meta-fields' => [
            'blockView' => 'metabox',
            'active' => true,
            'order' => 90,
            'settings' => array(
                'id' => 'product-meta-fields',
                'title' => 'Данные товара',
                'context' => 'advanced',
                'priority' => 'default',
                'callback_args' => null,
            ),
            'view' => 'default',
            'state' => 'open',
            'style' => null,
            'contentBefore' => "",
            'content' => '',
            'contentAfter' => "",
            'fields' => [
                [
                    'type' => 'select',
                    'view' => 'default',
                    'is_lock' => false,
                    'prefix' => null,
                    'name' => 'measurement',
                    'default' => null,
                    'attributes' => [],
                    'label' => 'Единица измерения',
                    'options' => [
                      'values' => [
                          '' => '&ndash;',
                          'м.' => 'м.',
                          'м.кв.' => 'м.кв.',
                          'шт.' => 'шт.'
                      ]
                    ],
                    'description' => null,
                    'contentBefore' => null,
                    'content' => null,
                    'contentAfter' => null,
                ]
            ]
        ],
        'video' => [
            'blockView' => 'metabox',
            'active' => true,
            'order' => 100,
            'settings' => array(
                'id' => 'product-video',
                'title' => 'Видео',
                'context' => 'advanced',
                'priority' => 'default',
                'callback_args' => null,
            ),
            'view' => 'default',
            'state' => 'open',
            'style' => null,
            'contentBefore' => "Пример: https://www.youtube.com/embed/VIDEO_ID?feature=oembed",
            'content' => '',
            'contentAfter' => "",
            'fields' => [
                [
                    'type' => 'text',
                    'view' => 'default',
                    'is_lock' => false,
                    'prefix' => null,
                    'name' => 'video_1',
                    'default' => null,
                    'attributes' => [],
                    'label' => 'Видео №1',
                    'description' => null,
                    'contentBefore' => null,
                    'content' => null,
                    'contentAfter' => null,
                ],
                [
                    'type' => 'text',
                    'view' => 'default',
                    'is_lock' => false,
                    'prefix' => null,
                    'name' => 'video_2',
                    'default' => null,
                    'attributes' => [],
                    'label' => 'Видео №2',
                    'description' => null,
                    'contentBefore' => null,
                    'content' => null,
                    'contentAfter' => null,
                ],
                [
                    'type' => 'text',
                    'view' => 'default',
                    'is_lock' => false,
                    'prefix' => null,
                    'name' => 'video_3',
                    'default' => null,
                    'attributes' => [],
                    'label' => 'Видео №3',
                    'description' => null,
                    'contentBefore' => null,
                    'content' => null,
                    'contentAfter' => null,
                ],
            ]
        ],
    ];

    public function __construct()
    {
        parent::__construct();

        add_filter("register_post_type_args", [$this, 'filterRegisterPostTypeArgs'], 10, 2);
    }

    public function filterRegisterPostTypeArgs($args, $name)
    {
        if ($this->postType == $name) {
            $args['has_archive'] = true;
        }

        return $args;
    }
}
