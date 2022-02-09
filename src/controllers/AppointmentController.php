<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Appointment;

class AppointmentController extends Controller {
  public function index() {
    $this->render('/admin/appointments');
  }

  public function logout() {
    $this->redirect('/signin');
  }

  public static function listAllEvents() {
    
    $data = Appointment::select()->get();
    print_r($data);
    die();
    
    $eventos = [];

    while($row_events = $data) {
      $id = $row_events['id'];
      $title = $row_events['title'];
      $start = $row_events['start'];
      $end = $row_events['end'];

      $eventos[] = [
        "id" => $id,
        "title" => $title,
        "start" => $start,
        "end" => $end,
      ];
    }

    echo json_encode($eventos);

  }

  public function getAllAppointments() {

  }
}