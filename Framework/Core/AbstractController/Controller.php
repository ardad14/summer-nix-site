<?php

namespace Framework\Core\AbstractController;

use Framework\Templeater\Templeater;

abstract class Controller
{
    protected Templeater $templeater;

    public function __construct()
    {
        $this->templeater = new Templeater();
    }
}