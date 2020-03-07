<?php

/* error_reporting(E_ALL);
ini_set('display_errors', 1); */

$container = require  __DIR__ . '/../bootstrap/container.php';
$container->get('SharedContainerTwig');

$dispatcher = require base_path('routes/web.php');

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$route = $dispatcher->dispatch($httpMethod, $uri);



switch ($route [0]) {
    case \FastRoute\Dispatcher::NOT_FOUND: {
echo "Ruta no encontrada";
    break;
    }
    case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED: {
echo "Metodo hptt no permitido";
    break;
    }
    case \FastRoute\Dispatcher::FOUND: {

$controllers = $route[1];
$params = $route[2];
$container->call($controllers, $params);

    break;

    
    }
        
}

// Kint::dump($route);
