<?php

return [
    'preference' => [],

    'virtualType' => [
        'Elastic\FormPopup\Registration\RegistrationFormPopup' => [
            'shared' => true,
            'type' => 'Brisum\Wordpress\FormPopup\PopupBootstrap',
            'arguments' => [
                'name' => ['value' => 'registration-popup'],
                'title' => ['value' => 'Подать заявку'],
                'form' => [
                    'type' => 'object',
                    'value' => 'Elastic\Form\Registration\RegistrationFormPopup'
                ]
            ]
        ],
    ],

    'type' => [
        'Brisum\Lib\ObjectManager' => ['shared' => true],
        'Elastic\Menu\MenuService' => ['shared' => true],
        'Elastic\Employee\EmployeeService' => ['shared' => true],

        'Elastic\Form\Registration\RegistrationFormInline' => [
            'shared' => true,
            'arguments' => [
                'args' => [
                    'value' => [
                        'template' => 'template/form-bootstrap-qtran.php',
                        'emailTitle' => 'Форма записи на курс',
                        'emailSendFrom' => 'no-replay@teen-levelup.vsrv.in'
                    ]
                ]
            ]
        ],
        'Elastic\Form\Registration\RegistrationFormPopup' => [
            'shared' => true,
            'arguments' => [
                'args' => [
                    'value' => [
                        'template' => 'template/form-bootstrap-qtran.php',
                        'emailTitle' => 'Форма записи на курс',
                        'emailSendFrom' => 'no-replay@teen-levelup.vsrv.in'
                    ]
                ]
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
