<?php

namespace Framework\Core\AbstractController;

use Framework\Templeater\Templeater;
use Framework\Authentication\Authentication;

abstract class Controller
{
    protected Templeater $templeater;
    protected Authentication $authentication;

    public function __construct()
    {
        $this->templeater = new Templeater();
        $this->authentication = new Authentication();
    }
}