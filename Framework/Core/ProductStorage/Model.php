<?php

namespace Framework\Core\ProductStorage;

class Model
{
    protected array $products;

    public function __construct()
    {
        $this->products = require_once "../Framework/Core/ProductStorage/books.php";
    }
}

