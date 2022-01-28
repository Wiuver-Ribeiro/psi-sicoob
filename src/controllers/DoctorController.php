<?php
namespace src\controllers;

use \core\Controller;

class DoctorController extends Controller {
  public function index() {
    /// /admin/nome_pasta
    $this->render('/admin/doctors');
  }

  public function getAllDoctors() {

  }
}