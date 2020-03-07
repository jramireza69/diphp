<?php

use Application\Controllers\HomeController;
use Application\Controllers\LoginController;
use Application\Providers\Doctrine;
use Application\Utils\TwigFunctions;
use Application\Providers\View;
use Application\Validators\LoginValidator;
use Aura\Session\Session;


return [

    'config.database' => function(){
return parse_ini_file(base_path('app/Config/database.init'));
    },

/* HomeController::class => function (\Psr\Container\ContainerInterface $container) {
    return new HomeController($container->get(Doctrine::class));
    
}, */
HomeController::class => \DI\create()->constructor(\DI\get(Doctrine::class)),
LoginController::class => \DI\create()->constructor(
    \DI\get(View::class),
    \DI\get(LoginValidator::class)
),
Doctrine::class => function (\Psr\Container\ContainerInterface $container){
    return new Doctrine($container);
},

Doctrine::class => function (\Psr\Container\ContainerInterface $container){
return new Doctrine($container);
},

View::class => \DI\create(View::class),
'SharedContainerTwig' => function (\Psr\Container\ContainerInterface $container){
TwigFunctions::setContainer($container);
},

Session::class => function (): Session {
    return (new \Aura\Session\SessionFactory())->newInstance($_COOKIE);
},
LoginValidator::class => \DI\create(LoginValidator::class)

];