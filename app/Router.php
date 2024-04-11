<?php

namespace APP;

use http\Params;

class Router
{
    private static $routes = [];

    public static function route($pattern, $callback)
    {
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        self::$routes[$pattern] = $callback;
    }

    public static function execute()
    {
        $url = $_SERVER['REQUEST_URI'];

        foreach (self::$routes as $pattern => $callback) {
            if (preg_match($pattern, $url, $params)) {
                array_shift($params);
                if (is_array($callback)) {
                    $class = new $callback[0];
                    $class->{$callback[1]}();
                } else {
                    call_user_func_array($callback, [$params]);
                }
            }
        }
    }
}