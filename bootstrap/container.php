<?php

require  __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new \DI\ContainerBuilder;
$containerBuilder->useAutowiring(false);
$containerBuilder->addDefinitions(base_path('bootstrap/config.php'));
// $containerBuilder->addDefinitions( __DIR__ . '/../bootstrap/config.php');
$container = $containerBuilder->build();

return $container;


Kint::dump($containerBuilder);