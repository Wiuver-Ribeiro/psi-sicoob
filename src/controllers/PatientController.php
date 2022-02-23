<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Patient;
use \src\models\User;

class PatientController extends Controller {
  public function index() {

    $usuario = new User();
    
    if(!$usuario->logado ()) {
      $this->redirect('/signin');
    }

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
    $usuario = new User();
    
    if(!$usuario->logado ()) {
      $this->redirect('/signin');
    }

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