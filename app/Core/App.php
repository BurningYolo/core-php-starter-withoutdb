<?php
namespace App\Core;

class App {
    protected $routes = [];

    public function __construct($routes) {
        $this->routes = $routes;
        print_r($this->routes);
    }

    public function run() {
    // Parse URI path
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // Remove any base folder path here if your app is in a subfolder, e.g. '/site'
    $baseFolder = '/site'; // change to '' if at web root
    if (strpos($uri, $baseFolder) === 0) {
        $uri = substr($uri, strlen($baseFolder));
    }

    // Trim slashes
    $uri = trim($uri, '/');

    // If empty after trimming, set to '/'
    $uri = $uri === '' ? '/' : $uri;

    echo "<pre>Normalized URI: $uri</pre>";

    // Use normalized URI to find route
    $route = $this->routes[$uri] ?? null;

    echo "<pre>Route: " . print_r($route, true) . "</pre>";

    if (!$route) {
        View::render('404');
        return;
    }

    $controllerName = 'App\\Controller\\' . $route['controller'];
    $method = $route['method'];

    echo $controllerName . "::$method()";

    if (class_exists(class: $controllerName)) {
        $controller = new $controllerName;
        if (method_exists($controller, $method)) {
            $controller->$method();
            
        } else {
            
            View::render('404');

            
        }
    } else {
        
        View::render('404');
        
    }
}
}
