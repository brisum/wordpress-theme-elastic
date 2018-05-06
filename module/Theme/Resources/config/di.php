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
                    'value' => "vendor/brisum/wordpress-module-post-type-slider/src/VisualComponent/Skin/FoundationOrbit/template.php"
                ]
            ]
        ],
        'Brisum\Wordpress\PostType\Slider\VisualComponent\DataProvider\MainSliderDataProvider' => [
            'shared' => false,
            'type' => 'Brisum\Wordpress\PostType\Slider\VisualComponent\DataProvider\SliderDataProvider',
            'arguments' => [
                'sliderId' => [
                    'value' => 20
                ]
            ]
        ],
    ],

    'type' => [
        'Brisum\Lib\ObjectManager' => ['shared' => true,],
        'wpdb' => ['shared' => true],
        'Elastic\Menu\MenuService' => ['shared' => true],

        'Brisum\Lib\View' => [
            'shared' => true,
            'arguments' => [
                'dirTemplate' => ['value' => $themepath]
            ]
        ],

        'Elastic\Form\Contact\ContactForm' => [
            'shared' => true,
            'arguments' => [
                'args' => [
                    'value' => [
                        'template' => 'template/form-bootstrap-qtran.php',
                        'emailTitle' => 'Связаться с нами',
                        'emailSendFrom' => 'no-replay@teen-levelup.vsrv.in'
                    ]
                ]
            ]
        ]
    ]
];
