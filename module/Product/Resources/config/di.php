<?php

return [
    'preference' => [],

    'virtualType' => [
        'Elastic\Product\VisualComponent\ProductCategorySidebarMenu' => [
            'shared' => true,
            'type' => 'Brisum\Lib\VisualComponent\VisualComponent',
            'arguments' => [
                'dataProvider' => [
                    'type' => 'object',
                    'value' => 'Elastic\Product\VisualComponent\SidebarMenu\DataProvider'
                ],
                'template' => ['value' => 'module/Product/VisualComponent/SidebarMenu/template.tpl.php']
            ]
        ],
    ],

    'type' => [
        'Elastic\Product\ProductService' => ['shared' => true],
        'Elastic\Product\ProductCategoryService' => ['shared' => true]
    ]
];
