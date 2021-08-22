<?php

class Router {
    private static $page_404, $routes = array();

    public static function add(string $route, string $path) {
        if(!array_key_exists($route, self::$routes)) {
            self::$routes[$route] = $path;
        }
    }

    public static function display_all() {
        echo '<pre>';
        var_dump(self::$routes);
        echo '</pre>';
        die;
    }

    public static function page_404(string $path) {
        self::$page_404 = $path;
    }

    public static function run() {
        $route = $_SERVER['REQUEST_URI'];

        if(array_key_exists($route, self::$routes)) {
            include self::$routes[$route]; exit;
        } else {
            include self::$page_404; exit;
        }
    }

}