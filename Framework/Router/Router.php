<?php

namespace framework\core\Router;

class Router
{
    private static array $routes;   # array of routes
    private static array $route = [];  # current route

    public function __construct()
    {

        $routes = require_once("../Config/routes.php");
        self::$routes = $routes;
    }

    private function routeCheck($url)
    {
        foreach (self::$routes as $pattern => $route)
        {
            if (preg_match("#$pattern#", $url, $result))
            {
                foreach ($result as $key => $value)
                {
                    if (is_string($key))
                    {
                        $route[$key] = $value;
                    }
                }
                if (empty($route['action']))
                {
                    $route['action'] = 'index';
                }
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    public function matchRoute()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        if ($this->routeCheck($this->removeQueryString($url)))
        {
            $controller = ucfirst(self::$route['controller']) . "Controller";
            $act = ucfirst(self::$route['action']);
            $str = "app\\controllers\\$controller";
            if (class_exists($str)) {
                $object = new $str($url);
                $object->$act();
            }
        }        
        return $url;
    }

    private function removeQueryString($uri) {
        if ($uri) {
            $parts = explode('?', $uri);
            if (strpos($parts['0'], "=") === false) {
                return trim($parts['0'],'/');
            } else {
                return '';
            }
        }
        else return false;
    }
    
}