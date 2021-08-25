<?php

namespace Framework\Templeater;

class Templeater
{
    public function renderContent($title, $view, $vars = [])
    {
        ob_start();
        require_once "../App/View/Templates/"  . $view . ".php";
        $content = ob_get_clean();
        require_once "../App/View/Layouts/СustomerLayout.php";
    }

    public function renderAdmin($view, $vars = [])
    {
        ob_start();
        require_once "../App/View/Templates/Admin/"  . $view . ".php";
        $content = ob_get_clean();
        require_once "../App/View/Layouts/AdminLayout.php";
    }
}