<?php

$slickSettings = [
    'adaptiveHeight' => true,
    'dots' => false,
    'infinite' => false,
    'arrows' => true,
    'draggable' => true,
    'slidesToShow' => 4,
    'slidesToScroll' => 4,
    'vertical' => false,
    'verticalSwiping' => false,
    'responsive' => [
        [
            'breakpoint' => 1100,
            'settings' => [
            'arrows' => true,
                'draggable' => false,
                'swipe' => true,
                'slidesToShow' => 3,
                'slidesToScroll' => 3
            ]
        ],
        [
            'breakpoint' => 820,
            'settings' => [
            'arrows' => true,
                'draggable' => false,
                'swipe' => true,
                'slidesToShow' => 2,
                'slidesToScroll' => 2
            ]
        ],
        [
            'breakpoint' => 640,
            'settings' => [
            'infinite' => true,
                'arrows' => true,
                'draggable' => false,
                'swipe' => true,
                'slidesToShow' => 1,
                'slidesToScroll' => 1
            ]
        ]
        // You can unslick at a given breakpoint now by adding:
        // 'settings' => "unslick"
        // instead of a settings object
    ]
];

?>

<div class="viewed-products-title">Просмотренные товары</div>

<div class="viewed-products-viewport product-list"
    data-require-init="slick.widget"
    data-slick='<?php echo json_encode($slickSettings); ?>'>
    <?php get_template_part('template-parts/product/product-list-loop'); ?>
</div>
