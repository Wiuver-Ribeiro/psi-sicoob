<?php
use core\Router;

$router = new Router();

//HomeController
$router->get('/', 'HomeController@index');
$router->get('/signin', "HomeController@signin");
$router->get('/signup', "HomeController@signup");

//AuthController

$router->post('/doctors/create', 'AuthController@create');


//DashboardController
$router->get('/dashboard', 'DashboardController@index');


//DoctorController
$router->get('/doctors', 'DoctorController@index');


//PatientController
$router->get('/patients', 'PatientController@index');

//USerController
$router->get('/admins', 'UserController@admins');
$router->get('/doctors/create', 'UserController@createDoctor');
$router->get('/patients/create', 'UserController@createPatient');

$router->get('/admins/create', 'UserController@createAdmin');
$router->post('/admins/create', 'UserController@registerAdministrador');
$router->get('/admins/edit/{id}', 'UserController@editAdmin');
$router->post('/admins/edit/{id}', 'UserController@editarAdministrador');
$router->post('/admins/delete/{id}', 'UserController@deletarAdministrador');



$router->get('/config', 'UserController@config');
$router->post('/signin', 'UserController@login');
$router->post('/signup', 'UserController@register');

$router->get('/logout', 'UserController@logout');


//AppointmentController
$router->get('/appointments', 'AppointmentController@index');