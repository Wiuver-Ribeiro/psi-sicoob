<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Appointment;

class DashboardController extends Controller {
  public function index() {
    $agendamento = new Appointment();
    $data  = $agendamento->todosAgendamentos();
    $pendentes  = $agendamento->agendamentosPendentes();
    $marcados  = $agendamento->agendamentosMarcados();
    $cancelados = $agendamento->agendamentosCancelados();
    //Renderiza todos os dados na template
    $this->render('dashboard', [
      "agendamento" => $data,
      "pendentes" =>  $pendentes,
      "marcados" => $marcados,
      "cancelados" => $cancelados
    ]);
  }
}