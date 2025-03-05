<?php
/**
 * Created by Seçkin Kılınç.
 */

// Core/Route.php

/**
 * Route tanımlamalarını saklayan ve istekleri yönlendiren sınıf.
 */
class Route
{
    private static $routes = [];
    private static $middlewares = [];

    public static function get($uri, $action)
    {
        self::$routes[$uri] = $action;
    }

    public static function middleware($uri, $middleware)
    {
        self::$middlewares[$uri] = $middleware;
    }

    public function dispatch()
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach (self::$routes as $route => $action) {
            // Regex destekli parametre yakalama
            $pattern = preg_replace('/{\\d\+}/', '(\\d+)', $route); // Sadece rakam içeren parametreler için
            $pattern = preg_replace('/{(\w+)}/', '(?P<$1>[^/]+)', $pattern); // Genel değişken yakalama
            $pattern = preg_replace('/{(\w+)\?}/', '(?P<$1>[^/]*)?', $pattern); // Opsiyonel parametreler için

            if (preg_match("~^$pattern$~", $requestUri, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                if (isset(self::$middlewares[$route])) {
                    (new self::$middlewares[$route])->handle(); // Middleware çalıştırılır.
                }

                list($controller, $method) = explode('@', $action);
                $controller = new $controller;
                $response = call_user_func_array([$controller, $method], $params);

                // Response türüne göre Content-Type belirleme
                if (is_array($response) || is_object($response)) {
                    header('Content-Type: application/json');
                    echo json_encode($response);
                } elseif (is_string($response)) {
                    header('Content-Type: text/plain');
                    echo $response;
                }
                return;
            }
        }

        http_response_code(404);
        echo '404 Not Found';
    }
}
