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

  public function createPatient() {
    $paciente = new Patient();
    $pacienteCadastrado = $paciente->registrarPaciente();
    if($pacienteCadastrado) {
      $this->redirect('/patients');
    } else {
      $this->redirect('/patients/create');
    }
  }

  public function editPaciente($id) {
    $paciente = new Patient();
    $pacienteDados = $paciente->busquePacientePorID($id);
    $this->render('/admin/patient-edit',[
      "paciente" => $pacienteDados,
    ]);
  }

  public function editarPaciente($id) {
    $paciente = new Patient();
    $editPaciente = $paciente->editarPaciente($id);

    if($editPaciente) {
      $this->redirect('/patients');
    } else {
      $this->redirect('/patients/create');
    }
  }


}