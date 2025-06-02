<?php 
// Show errors for debugging (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Autoload classes
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    if (strpos($class, $prefix) === 0) {
        $class = substr($class, strlen($prefix));
    }

    $path = str_replace('\\', '/', $class);
    $file = __DIR__ . "/app/$path.php";

    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "<pre>Autoload failed for: $class (Expected at: $file)</pre>";
    }
});

// Load routes
$routes = require __DIR__ . '/routes/web.php';

// Run the app
use App\Core\App;

$app = new App($routes);
$app->run(); 
