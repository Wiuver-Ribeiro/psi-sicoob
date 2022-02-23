<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Appointment;
use \src\models\User;

class DashboardController extends Controller {
  public function index() {
    $agendamento = new Appointment();
    $data  = $agendamento->todosAgendamentos();
    $pendentes  = $agendamento->agendamentosPendentes();
    $marcados  = $agendamento->agendamentosMarcados();
    $cancelados = $agendamento->agendamentosCancelados();

    $usuario = new User();
    $info = $usuario->dadosLogado();
  
  if(!$usuario->logado ()) {
    $this->redirect('/signin');

  } else if ($usuario->logado() && ($info['tipo'] == "admin" || $info['tipo'] == "paciente")) {
    
    $this->render('dashboard', [
      "agendamento" => $data,
      "pendentes" =>  $pendentes,
      "marcados" => $marcados,
      "cancelados" => $cancelados,
      "info" => $info,
     ]);
    } else if ($usuario->logado() && $info['tipo'] == "psi") {
      $this->render('dashboardDoctor', [
        "agendamento" => $data,
        "pendentes" =>  $pendentes,
        "marcados" => $marcados,
        "cancelados" => $cancelados,
        "info" => $info,
      ]);
  }
  }
} 