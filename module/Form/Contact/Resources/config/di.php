<?php

return [
	'preference' => [],

	'virtualType' => [],

    'type' => [
        'Elastic\Form\Contact\ContactForm' => [
            'shared' => true,
            'arguments' => [
                'args' => [
                    'value' => [
                        'template' => 'Resources/template/form-full-width.bootstrap.tpl.php',
                        'title' => 'Обратная связь',
                    ]
                ]
            ]
        ],
    ]
];
