<?php

return [
    '^$' => [
        'controller' => 'main',
        "action" => "main"
    ],
    '^main$' => [
        'controller' => 'main',
        "action" => "main"
    ],
    '^product$' => [
        'controller' => 'product',
        "action" => "product"
    ],
    '^catalog$' => [
        'controller' => 'product',
        "action" => "catalog"
    ],
    '^login$' => [
        'controller' => 'authentication',
        "action" => "login"
    ],
    '^profile$' => [
        'controller' => 'authentication',
        "action" => "profile"
    ],
    '^auth$' => [
        'controller' => 'authentication',
        "action" => "auth"
    ],
    '^logout$' => [
        'controller' => 'authentication',
        "action" => "logout"
    ],
    '^basket$' => [
        'controller' => 'basket',
        "action" => "basket"
    ],
    '^basket/delete$' => [
        'controller' => 'basket',
        "action" => "deleteBook"
    ],
    '^basket/add$' => [
        'controller' => 'basket',
        "action" => "addBook"
    ],
];
