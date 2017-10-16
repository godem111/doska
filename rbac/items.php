<?php
return [
    'createTovar' => [
        'type' => 2,
        'description' => 'Разрешение на создание товара',
    ],
    'updateTovar' => [
        'type' => 2,
        'description' => 'Разрешение на редактирование товара',
    ],
    'deleteOwnTovar' => [
        'type' => 2,
        'description' => 'Разрешение на удаление товара',
        'ruleName' => 'isAuthor',
        'children' => [
            'updateTovar',
        ],
    ],
    'updateOwnTovar' => [
        'type' => 2,
        'description' => 'Разрешение на редактирование только своего товара',
        'ruleName' => 'isAuthor',
        'children' => [
            'updateTovar',
        ],
    ],
    'user' => [
        'type' => 1,
        'children' => [
            'createTovar',
            'updateOwnTovar',
            'deleteOwnTovar',
        ],
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'user',
            'updateTovar',
        ],
    ],
];
