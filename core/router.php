<?php

namespace Core;

use Closure;

class Router
{
    public static $routes = array();

    public static function add(string $method, string $uri, Closure|array $controller)
    {
        static::$routes[$method][$uri] = $controller;
    }

    public static function check_uri_method()
    {
        $routes = static::$routes;
        $path = Request::uri();
        $method = Request::method();
        $action = $routes[$method][$path] ?? false;
        if (!$action) {
            http_response_code(404);
        return   'page not found';
            exit();
        }

        if (is_array($action)) {
            return call_user_func([new $action[0], $action[1]]);
        }

        return call_user_func($action);
    }
    public static function run(): void
    {

      echo static::check_uri_method();
    }
}
