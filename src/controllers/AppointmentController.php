<?php
namespace src\controllers;

use \core\Controller;
use \src\models\User;
use \src\models\Doctor;
use \src\models\Patient;
use \src\models\Appointment;

class AppointmentController extends Controller {
  public function index() {
    $usuario = new User();
    $psi = new Doctor();
    $paciente = new Patient();

    $todosPaciente = $paciente->todosPacientes();
    $todosPSI = $psi->todosPsicologos();

    if(!$usuario->logado ()) {
      $this->redirect('/signin');
    }
    $this->render('/admin/appointments', [
      "psi" => $todosPSI,
      "paciente" => $todosPaciente,
    ]);

  }

  public function createAppointment() {
    $agendamento = new Appointment();
    $agendamento->cadastrarAgendamento();
  }

  public function logout() {
    $this->redirect('/signin');
  }

}