<?php

namespace Core;

class Request
{
    public static function uri(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        $position = strpos($path, '?');

        if (!$position) {
            return $path;
        }
        
        return substr($path, 0, $position);
    }

    public static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function get($key)
    {
        return $_GET[$key] ?? null;
    }
    public static function post($key)
    {
        return $_POST[$key] ?? null;
    }
    public static function all()
    {
        return array_merge($_GET, $_POST);
    }
}
