<?php

$abspath = ABSPATH;
$themepath = ABSPATH . 'wp-content/themes/elastic/';

return [
    'preference' => [],

    'virtualType' => [
        'Elastic\Theme\VisualComponent\MainSlider' => [
            'shared' => false,
            'type' => 'Brisum\Lib\VisualComponent\VisualComponent',
            'arguments' => [
                'dataProvider' => [
                    'type' => 'object',
                    'value' => 'Brisum\Wordpress\PostType\Slider\VisualComponent\DataProvider\MainSliderDataProvider'
                ],
                'template' => [
                    'value' => "vendor/brisum/wordpress-module-post-type-slider/src/VisualComponent/Skin/Slick/template.tpl.php"
                ]
            ]
        ],
        'Brisum\Wordpress\PostType\Slider\VisualComponent\DataProvider\MainSliderDataProvider' => [
            'shared' => false,
            'type' => 'Brisum\Wordpress\PostType\Slider\VisualComponent\DataProvider\SliderDataProvider',
            'arguments' => [
                'sliderId' => [
                    'value' => 20
                ],
                'settings' => [
                    'value' => [
                        'dots' => true,
                        'infinite' => false,
                        'arrows' => true,
                        'draggable' => true,
                        'speed' => 700,
                        'autoplay' => true,
                        'autoplaySpeed' => 6000,
                        'slidesToShow' => 1,
                        'slidesToScroll' => 1
                    ]
                ]
            ]
        ],
    ],

    'type' => [
        'Brisum\Lib\ObjectManager' => ['shared' => true,],
        'wpdb' => ['shared' => true],
        'Elastic\Theme\ThemeService' => ['shared' => true],
        'Elastic\Menu\MenuService' => ['shared' => true],

        'Brisum\Lib\View' => [
            'shared' => true,
            'arguments' => [
                'dirTemplate' => ['value' => $themepath]
            ]
        ]
    ]
];
