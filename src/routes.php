<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/signin', "HomeController@signin");
$router->get('/signup', "HomeController@signup");