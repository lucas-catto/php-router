<?php

class Route
{
    private static $routes = [];

    /* HTTP => Route
     *
     * For example:
     * get => /helloworld    
    */

    public static function get($uri, $callback)
    {
        self::$routes['GET'][$uri] = $callback;
    }

    public static function post($uri, $callback)
    {
        self::$routes['POST'][$uri] = $callback;
    }

    public static function put($uri, $callback)
    {
        self::$routes['PUT'][$uri] = $callback;
    }

    public static function delete($uri, $callback)
    {
        self::$routes['DELETE'][$uri] = $callback;
    }

    public static function resolve($method, $uri)
    {
        /*
         * if both exists, a route and http verb in array
         * it'll call call_user_func with the function passed
        */
        if (isset(self::$routes[$method][$uri]))
        {
            call_user_func(self::$routes[$method][$uri]);
        }
        else
        {
            echo "404 Not Found";
        }
    }
}

Route::resolve($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

Route::get('/', function() {
    echo "Home Page";
});
