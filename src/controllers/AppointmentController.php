<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Appointment;
use \src\models\User;

class AppointmentController extends Controller {
  public function index() {
    $usuario = new User();

    if(!$usuario->logado ()) {
      $this->redirect('/signin');
    }
    $this->render('/admin/appointments');

  }

  public function logout() {
    $this->redirect('/signin');
  }

}