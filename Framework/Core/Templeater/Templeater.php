<?php

namespace Framework\Core\Templeater;

class Templeater
{
    public function renderContent($title, $view, $vars = [])
    {
        ob_start();
        require_once "../App/View/Templates/"  . $view . ".php";
        $content = ob_get_clean();
        require_once "../App/View/Layouts/Layout.php";
    }
}