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
    $editAgendamento = $agendamento->cancelarAgendamento($id);

    if($editAgendamento) {
      $_SESSION['sucesso'] =  "<div class='alert alert-success' role='alert'  style='position:absolute; left:50%;top:30%;z-index:999;'>Consulta cancelada com sucesso</div>";
      $this->redirect('/dashboard');

    } else {
      $_SESSION['sucesso'] =  "<div class='alert alert-danger' role='alert'  style='position:absolute; left:50%;top:30%;z-index:999;'>Erro ao cancelar consulta com sucesso</div>";
      $this->redirect('/dashboard');
    }
  }
  public function confirmAppointment($id) {
    
    $agendamento = new Appointment();
    $editAgendamento = $agendamento->confirmarAgendamento($id);

    if($editAgendamento) {
      $_SESSION['sucesso'] =  "<div class='alert alert-success' role='alert' style='position:absolute; left:50%;top:30%;z-index:999;'>Consulta confirmada com sucesso</div>";
      $this->redirect('/dashboard');

    } else {
      $_SESSION['sucesso'] =  "<div class='alert alert-danger' role='alert' style='position:absolute; left:50%;top:20%;z-index:999;'>Erro ao confirmar consulta com sucesso</div>";
      $this->redirect('/dashboard');
    }
  }

  public function searchUsers() {
    $agendamento = new Appointment();
    $agendamento->buscarAgendamentosPorNome();
    $this->redirect('/dashboard');
  }



}