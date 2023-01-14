<?php



use user;

use Closure;
class Ro
{  
      protected static array $routes = [];
    public static function match($method, $uri)
    {
        $routes = Route::match($method, $uri);
        if($routes){
            if (is_callable($routes)) {
                return $routes();
            }
            else if(gettype($routes) === 'string'){
                $action = explode('@', $routes);
                $controller = "app\Controllers\\" . $action[0];
                if (class_exists($controller)) {
                    $controller = new $controller;
                    if (method_exists($controller, $action[1])) {
                        return $controller->$action[1]();
                    }
                }
            }
        }
        self::handle404();
    }

    public static function register(string $method, string $uri, Closure|array $action): void
    {
        static::$routes[$method][$uri] = $action;
    }

    public static function handle404()
    {
        http_response_code(404);
    }
}
