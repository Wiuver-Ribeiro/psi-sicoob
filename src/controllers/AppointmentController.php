<?php
namespace src\controllers;

use \core\Controller;

class AppointmentController extends Controller {
  public function index() {
    $this->render('/admin/appointments');
  }

  public function logout() {
    $this->redirect('/signin');
  }
}