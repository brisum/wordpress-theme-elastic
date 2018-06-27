<?php

return [
	'preference' => [
	],

	'virtualType' => [
        'Elastic\Form\Question\QuestionFormPopup' => [
            'shared' => true,
            'type' => 'Brisum\Wordpress\FormPopup\PopupBootstrap',
            'arguments' => [
                'name' => ['value' => 'question'],
                'title' => ['value' => 'Задать вопрос'],
                'form' => [
                    'type' => 'object',
                    'value' => 'Elastic\Form\Question\QuestionForm'
                ]
            ]
        ],
	],

    'type' => [
        'Elastic\Form\Question\QuestionForm' => [
            'shared' => true,
            'arguments' => [
                'args' => [
                    'value' => [
                        'template' => 'Resources/template/form-bootstrap.tpl.php',
                        'emailTitle' => 'Задать вопрос',
                    ]
                ]
            ]
        ],
    ]
];
