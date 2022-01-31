<?php
use core\Router;

$router = new Router();

//HomeController
$router->get('/', 'HomeController@index');
$router->get('/signin', "HomeController@signin");
$router->get('/signup', "HomeController@signup");

//AuthController
$router->get('/logout', "AuthController@logout");

//DashboardController
$router->get('/dashboard', 'DashboardController@index');

//DoctorController
$router->get('/doctors', 'DoctorController@index');


//PatientController
$router->get('/patients', 'PatientController@index');

//USerController
$router->get('/admins', 'UserController@admins');