<?php

namespace Framework\Core\Templeater;

class Templeater
{
    public function renderContent($controller, $view, $vars = [])
    {
        ob_start();
        require "../App/View/Templates/"  . $view . ".php";
        $content = ob_get_clean();
        require "../App/View/Layouts/Layout.php";
    }
}