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

    $minhasConsultas = $agendamento->minhasConsultas($info);
    $minhasConsultasMarcadas = $agendamento->minhasConsultasMarcadas($info);
    $minhasConsultasPendentes = $agendamento->minhasConsultasPendentes($info);
    $minhasConsultasCanceladas = $agendamento->minhasConsultasCanceladas($info);
    $meusUltimosPacientes = $agendamento->meusUltimosPacientes($info);
    $meusUltimosPsicologos = $agendamento->meusUltimosPsicologos($info);
    
  if(!$usuario->logado ()) {
    $this->redirect('/signin');

  } else if ($usuario->logado() && $info['tipo'] == "admin" ) {
    
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
        "pendentes" =>  $minhasConsultasPendentes,
        "marcados" => $minhasConsultasMarcadas,
        "cancelados" => $minhasConsultasCanceladas,
        "info" => $info,
        "consultas" => $minhasConsultas,
        "ultimosPacientes" => $meusUltimosPacientes,
      ]);
  } else if ($usuario->logado() && $info['tipo'] == "paciente") {
    $this->render('dashboardPatient', [
      "agendamento" => $data,
      "pendentes" =>  $pendentes,
      "marcados" => $marcados,
      "cancelados" => $cancelados,
      "ultimosPsicologos" => $meusUltimosPsicologos,

      "info" => $info,
    ]);
  }
  }
} 