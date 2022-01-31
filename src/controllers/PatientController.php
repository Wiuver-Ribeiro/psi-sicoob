<?php
namespace src\controllers;

use \core\Controller;

class PatientController extends Controller {
  public function index() {
    $this->render('/admin/patients');
  }
}