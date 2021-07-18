<?php

namespace app\controller;

use framework\core\Templeater;
use

class MainController
{
    private Templeater $templeat;

    public function main()
    {
        $this->templeat->renderContent('main', 'main');
    }
}