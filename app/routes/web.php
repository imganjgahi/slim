<?php

$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'home.twig');
});
$app->get('/home', "HomeController:index");


$app->get('/user', "UserController:create");