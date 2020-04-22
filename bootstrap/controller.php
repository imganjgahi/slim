<?php

$container['view'] = function ($container) {
    
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
    'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};

$container['HomeController'] = function($container) {
    return new \App\Controllers\HomeController($container);
};
$container['UserController'] = function($container) {
    return new \App\Controllers\UserController($container);
};