<?php

namespace Framework\Core\AbstractController;

use Framework\Core\Templeater\Templeater;

abstract class Controller
{
    protected Templeater $templeater;

    public function __construct()
    {
        $this->templeater = new Templeater();
    }
}