<?php

namespace App\Controller;

use Framework\Core\Templeater\Templeater;

class MainController
{
    private Templeater $templeater;

    public function __construct()
    {
        $this->templeater = new Templeater();
    }

    public function main()
    {
        $this->templeater->renderContent('main', 'main');
    }
}