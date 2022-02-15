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
    // return $dados;
    $this->render('dashboard', [
      "agendamento" => $data,
      "pendentes" =>  $pendentes,
      "marcados" => $marcados
    ]);
  }
}