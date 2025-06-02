<?php

$routes = [];

$routes['/'] = ['controller' => 'HomeController', 'method' => 'index'];
$routes['about'] = ['controller' => 'AboutController', 'method' => 'index'];

return $routes;