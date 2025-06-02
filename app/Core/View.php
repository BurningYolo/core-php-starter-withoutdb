<?php

namespace App\Core;

class View {
    public static function render($view, $data = []) {
        extract($data);

        $basePath = dirname(__DIR__, 2); // Go up from app/Core to root

        include $basePath . '/views/components/header.php';

        $viewPath = $basePath . '/views/' . $view . '.php';



        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            include $basePath . '/views/404.php';
        }

        include $basePath . '/views/components/footer.php';
    }
}