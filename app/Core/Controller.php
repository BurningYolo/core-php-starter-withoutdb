<?php
namespace App\Core;

class Controller {
    public function view($view, $data = []) {
        \App\Core\View::render($view, $data);
    }
}
