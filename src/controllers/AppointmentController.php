<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Appointment;

class AppointmentController extends Controller {
  public function index() {
    $this->render('/admin/appointments');
  }

  public function logout() {
    $this->redirect('/signin');
  }

}