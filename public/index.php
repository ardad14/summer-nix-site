<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../Framework/Core/Autoloader/autoloader.php";

use framework\core\Router\Router;

$router = new Router();
$router->matchRoute();

