<?php
namespace Core;

use Closure;

class Route
{
    public static function GET($uri, Closure | array $controller)
    {
        Router::add("GET", $uri, $controller);
    }

    public static function POST($uri, Closure | array $controller)
    {
        Router::add("POST", $uri, $controller);
    }
}
