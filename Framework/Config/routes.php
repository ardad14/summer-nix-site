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
    '^registration$' => [
        'controller' => 'registration',
        "action" => "registration"
    ],
    '^verification$' => [
        'controller' => 'registration',
        "action" => "verification"
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
    '^basket/buy$' => [
        'controller' => 'basket',
        "action" => "buy"
    ],
    '^search$' => [
        'controller' => 'product',
        "action" => "search"
    ],
    '^unsetMessage$' => [
        'controller' => 'product',
        "action" => "unsetError"
    ],
    '^catalogParse$' => [
        'controller' => 'product',
        "action" => "booksCatalogJson"
    ],
    '^clearFiltration$' => [
        'controller' => 'product',
        "action" => "clearFiltration"
    ],
    '^admin$' => [
        'controller' => 'admin',
        "action" => "admin"
    ],
    '^admin/book$' => [
        'controller' => 'admin',
        "action" => "book"
    ],
    '^admin/customer$' => [
        'controller' => 'admin',
        "action" => "customer"
    ],
    '^admin/login$' => [
        'controller' => 'admin',
        "action" => "login"
    ],
    '^admin/logout$' => [
        'controller' => 'admin',
        "action" => "logout"
    ],
    '^admin/book/delete$' => [
        'controller' => 'admin',
        "action" => "deleteBook"
    ],
    '^admin/book/update' => [
        'controller' => 'admin',
        "action" => "updateBook"
    ],
    '^admin/book/change' => [
        'controller' => 'admin',
        "action" => "changeBookData"
    ],
    '^admin/book/addForm' => [
        'controller' => 'admin',
        "action" => "addForm"
    ],
    '^admin/book/add' => [
        'controller' => 'admin',
        "action" => "addBook"
    ],
    '^admin/admin/auth$' => [
        'controller' => 'admin',
        "action" => "auth"
    ],
    '^admin/customer/delete$' => [
        'controller' => 'admin',
        "action" => "deleteCustomer"
    ],
    '^admin/customer/update$' => [
        'controller' => 'admin',
        "action" => "updateCustomer"
    ],
    '^admin/customer/change' => [
        'controller' => 'admin',
        "action" => "changeCustomerData"
    ],
    '^admin/customer/addCustomerForm' => [
        'controller' => 'admin',
        "action" => "addCustomerForm"
    ],
    '^admin/customer/add' => [
        'controller' => 'admin',
        "action" => "addCustomer"
    ],
];
