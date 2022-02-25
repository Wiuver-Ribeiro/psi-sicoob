<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Appointment;

class EventController extends Controller {
  public function loadEvents() {
    $agendamento = new Appointment();
   $allAgendamentos =  $agendamento->agendamentos();
  
  }



}