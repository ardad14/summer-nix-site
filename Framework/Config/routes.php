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

];
