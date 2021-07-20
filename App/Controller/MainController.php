<?php

namespace App\Controller;

use Framework\Core\AbstractController\Controller;

class MainController extends Controller
{
    public function main()
    {
        $this->templeater->renderContent('Главная', 'main');
    }
}