<?php

namespace App\Core;
use App\Core\View;

class Router {
    private static $getRoutes = [];
    private static $postRoutes = [];
    private static $putRoutes = [];
    private static $deleteRoutes = [];

    public static function post($path, $handler)
    {
        self::$postRoutes[] = [
            'path' => APP_URL . $path,
            'handler' => $handler
        ];
    }
    public static function put($path, $handler)
    {
        self::$putRoutes[] = [
            'path' => APP_URL . $path,
            'handler' => $handler
        ];
    }
    public static function delete($path, $handler)
    {
        self::$deleteRoutes[] = [
            'path' => APP_URL . $path,
            'handler' => $handler
        ];
    }
    public static function get($path, $handler)
    {
        self::$getRoutes[] = [
            'path' => rtrim(APP_URL, '/') . '/' . trim($path, '/'), // Normalize URL
            'handler' => $handler
        ];
    }

    public static function route($method, $path)
    {
        $routes = [];
        switch ($method) {
            case 'GET':
                $routes = self::$getRoutes;
                break;
            case 'POST':
                $routes = self::$postRoutes;
                break;
            case 'PUT':
                $routes = self::$putRoutes;
                break;
            case 'DELETE':
                $routes = self::$deleteRoutes;
                break;
        }

        foreach ($routes as $route) {
            $pattern = str_replace("/", "\/", $route['path']);
            $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^\/]+)', $pattern);
            $pattern = '/^' . $pattern . '$/';

            if (preg_match($pattern, $path, $matches)) {
                $handler = $route['handler'];
                return is_callable($handler) ? call_user_func($handler, $matches) : null;
            }
        }

        // Handle 404
        header("HTTP/1.0 404 Not Found");
            View::render('erreur/404');
    }
}
?>