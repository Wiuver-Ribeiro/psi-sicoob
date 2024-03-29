<?php

use core\Router;

$router = new Router();

//HomeController
$router->get('/', 'HomeController@index');
$router->get('/signin', "HomeController@signin");
$router->get('/signup', "HomeController@signup");


$router->post('/signin', 'UserController@login');
$router->post('/signup', 'UserController@register');

$router->get('/logout', 'UserController@logout');



//AuthController
$router->post('/doctors/create', 'AuthController@create');


//DashboardController
$router->get('/dashboard', 'DashboardController@index');


//DoctorController
$router->get('/doctors', 'DoctorController@index');
$router->post('/doctors/create', 'DoctorController@createDoctor');
$router->get('/doctors/edit/{id}', 'DoctorController@editDoctor');
$router->post('/doctors/edit/{id}', 'DoctorController@editarDoctor');
$router->get('/doctor/delete/{id}', 'DoctorController@deletarDoctor');


//PatientController
$router->get('/patients', 'PatientController@index');
$router->post('/patients/create', 'PatientController@createPatient');
$router->get('/patients/edit/{id}', 'PatientController@editPaciente');
$router->post('/patients/edit/{id}', 'PatientController@editarPaciente');
$router->post('/patients/delete/{id}', 'PatientController@deletarPaciente');
$router->get('/patients/create', 'UserController@createPatient');

//USerController
$router->get('/admins', 'UserController@admins');
$router->get('/doctors/create', 'UserController@createDoctor');
$router->get('/admins/create', 'UserController@createAdmin');
$router->post('/admins/create', 'UserController@registerAdministrador');
$router->get('/admins/edit/{id}', 'UserController@editAdmin');
$router->post('/admins/edit/{id}', 'UserController@editarAdministrador');




$router->get('/config', 'UserController@config');
$router->get('/users', 'UserController@listAllUsers');
$router->post('/users/edit/{id}', 'UserController@editUser');
$router->post('/users/delete/{id}', 'UserController@deleteUser');



//AppointmentController
$router->get('/appointments', 'AppointmentController@index');
$router->get('/appointments/create', 'AppointmentController@createAppointment');
$router->get('/appointments/cancel/{id}', 'AppointmentController@cancelAppointment');
$router->get('/appointments/confirm/{id}', 'AppointmentController@confirmAppointment');
$router->get('/appointments/edit/{id}', 'AppointmentController@editAppointment');
$router->get('/appointments/search/{usuario}', 'AppointmentController@searchUsers');
$router->post('/appointments/finish/{id}', 'AppointmentController@finishAppointment');

//VERIFICAR O PQ NÃO ESTA SENDO ENVIADO O NOME DO PACIENTE CERTO!
$router->post('/appointments/register', 'AppointmentController@registerAppointment');