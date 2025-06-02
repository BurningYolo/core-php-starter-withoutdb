<?php
namespace App\Controller;

use App\Core\Controller;

class AboutController extends Controller {
    public function index() {
        $this->view('about', ['pageTitle' => 'about']);
    }
}