<?php



class Routed
{
    protected static $routes = [];

    public static function add($method, $uri, $action)
    {
        self::$routes[$method][$uri] = $action;
    }

    public static function match($method, $uri)
    {
        if (array_key_exists($method, self::$routes)) {
            if (array_key_exists($uri, self::$routes[$method])) {
                return self::$routes[$method][$uri];
            }
        }
        self::handle404();
    }

    public static function handle404()
    {
        http_response_code(404);

    }
    public static function check_uri_method()
    {
        $path = Request::uri();
        $method = Request::method();
        $action = Router::match($method, $path);

        if ($action) { 
            call_user_func($action);
        } else {
             echo "page  not found  404s uii";
        }
    }
}
