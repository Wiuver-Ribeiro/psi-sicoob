<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Patient;

class PatientController extends Controller {
  public function index() {
    $pacientes = new Patient();
    $todosPacientes = $pacientes->todosPacientes();
    $this->render('/admin/patients', [
      "todosPacientes" => $todosPacientes,
    ]);
  }


}