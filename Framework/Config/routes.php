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
];
