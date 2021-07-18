<?php

namespace framework\core;

class Templeater
{
    public function renderContent($controller, $view, $vars = [])
    {
        ob_start();
        require_once "../../../App/View/Templates/header.php";
        require "../../../App/View/Templates" . $controller . '/' . $view . ".php";
        $content = ob_get_clean();
        //require "../../../App/View/Layouts/layout.php";
    }
}