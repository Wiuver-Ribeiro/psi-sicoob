<?php
namespace src\controllers;

use \core\Controller;
use \src\models\User;
use \src\models\Doctor;
use \src\models\Patient;
use \src\models\Appointment;

clASs AppointmentController extends Controller {
  public function index() {
    $usuario = new User();
    $info = $usuario->dadosLogado();


    $psi = new Doctor();
    $paciente = new Patient();
    $agendamento = new Appointment();

    $todosPaciente = $paciente->todosPacientes();
    $todosPSI = $psi->todosPsicologos();

    // $minhasConsultas = $agendamento->minhasConsultas($info);

    if(!$usuario->logado ()) {
      $this->redirect('/signin');
    } else if ($usuario->logado() && $info['tipo'] == 'admin') {
      $this->render('/admin/appointments', [
        "psi" => $todosPSI,
        "paciente" => $todosPaciente,
      ]);
    } else if($usuario->logado() && $info['tipo'] == 'psi'){
      $this->render('/admin/appointments', [
        "psi" => $todosPSI,
        "paciente" => $todosPaciente,
        
      ]);
    }


    // $this->render('/admin/appointments', [
    //   "psi" => $todosPSI,
    //   "paciente" => $todosPaciente,
    // ]);

  }

  public function createAppointment() {
    $agendamento = new Appointment();
    // $agendamento->cadAStrarAgendamento();
    $agendamento->marcarConsulta();
  }

  public function logout() {
    $this->redirect('/signin');
  }

  public function cancelAppointment($id) {
    $agendamento = new Appointment();
    $editAgendamento = $agendamento->cancelarAgendamento($id);

    if($editAgendamento) {
      $_SESSION['sucesso'] =  "<div clASs='alert alert-success' role='alert'  style='position:absolute; left:50%;top:30%;z-index:999;'>Consulta cancelada com sucesso</div>";
      $this->redirect('/dashboard');

    } else {
      $_SESSION['sucesso'] =  "<div clASs='alert alert-danger' role='alert'  style='position:absolute; left:50%;top:30%;z-index:999;'>Erro ao cancelar consulta com sucesso</div>";
      $this->redirect('/dashboard');
    }
  }
  public function confirmAppointment($id) {
    
    $agendamento = new Appointment();
    $editAgendamento = $agendamento->confirmarAgendamento($id);

    if($editAgendamento) {
      $_SESSION['sucesso'] =  "<div clASs='alert alert-success' role='alert' style='position:absolute; left:50%;top:30%;z-index:999;'>Consulta confirmada com sucesso</div>";
      $this->redirect('/dashboard');

    } else {
      $_SESSION['sucesso'] =  "<div clASs='alert alert-danger' role='alert' style='position:absolute; left:50%;top:20%;z-index:999;'>Erro ao confirmar consulta com sucesso</div>";
      $this->redirect('/dashboard');
    }
  }

  public function searchUsers() {
    $agendamento = new Appointment();
    $agendamento->buscarAgendamentosPorNome();
    $this->redirect('/dashboard');
  }

  public function registerAppointment() {
    $agendamento = new Appointment();
    $cadAStraAgendamento = $agendamento->marcarConsulta();
    if($cadAStraAgendamento) {
      $_SESSION['sucesso'] = "<div clASs='alert alert-success' role='alert' style='left: 49%;
    position: absolute;
    top: 15%;'>Consulta marcada com sucesso!</div>";
      $this->redirect('/appointments');
    } else {
      $_SESSION['sucesso'] = "<div clASs='alert alert-danger' role='alert' style='left: 49%;
    position: absolute;
    top: 15%;'>Já existe uma consulta marcada neste horário!</div>";
      $this->redirect('/appointments');
    }
  }

  public function editAppointment($id) {
    require '../connnect.php';
    $agendamento = new Appointment();
    $agendamentoEditar = $agendamento->editarConsulta($id);

    if($agendamentoEditar ) {
      $_SESSION['sucesso'] =  "<div clASs='alert alert-success' role='alert' style='position:absolute; left:50%;top:30%;z-index:999;'>Consulta alterada com sucesso!</div>";
      $this->redirect('/appointments');
    } else {
      $_SESSION['sucesso'] =  "<div clASs='alert alert-danger' role='alert' style='position:absolute; left:50%;top:20%;z-index:999;'>Erro ao editar detalhes da consulta!</div>";
      $this->redirect('/appointments');
    }
  }

  public function finishAppointment($id) {
    require '../connnect.php';
    $agendamento = new Appointment();
    $agendamento->encerrarConsulta($id);

  }
}