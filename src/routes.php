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
$router->get('/doctors/create', 'UserController@createDoctor');
$router->get('/patients/create', 'UserController@createPatient');
$router->get('/admins/create', 'UserController@createAdmin');

//AppointmentController
$router->get('/appointments', 'AppointmentController@index');