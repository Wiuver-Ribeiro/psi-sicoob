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

  public function cancelAppointment($id) {
    $agendamento = new Appointment();
    if($agendamento->cancelarAgendamento($id)) {
      $_SESSION['sucesso'] =  "<div class='alert alert-success' role='alert'>'Consulta cancelada com sucesso</div>";
      $this->redirect('/dashboard');

    } else {
      $_SESSION['sucesso'] =  "<div class='alert alert-danger' role='alert'>'Erro ao cancelar consulta com sucesso</div>";
      $this->redirect('/dashboard');
    }
  }

}