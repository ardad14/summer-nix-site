<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../vendor/autoload.php';

use Framework\Router\Router;
use Framework\Session\Session;

$session = new Session();
$session->start();

$router = new Router();
$router->matchRoute();

