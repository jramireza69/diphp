<?php

return \FastRoute\simpleDispatcher (function (\FastRoute\RouteCollector $route){
$route->addRoute('GET', '/', ['Application\Controllers\HomeController', 'index']);
$route->addRoute('GET', '/hello/{name}', ['Application\Controllers\HomeController', 'hello']);

/**
 * RUTAS LOGIN
 */

$route->addRoute('GET', '/login', ['Application\Controllers\LoginController', 'showLoginForm']);
$route->addRoute('POST', '/login', ['Application\Controllers\LoginController', 'login']);

});

