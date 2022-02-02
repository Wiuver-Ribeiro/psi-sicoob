<?php
namespace src\controllers;

use \core\Controller;

class AppointmentController extends Controller {
  public function index() {
    $this->render('/admin/appointments');
  }

  public function logout() {
    $this->redirect('/signin');
  }

  public function listAllEvents() {
    require __DIR__.'../../../core/Database.php';
    $sql = $pdo->prepare("SELECT * FROM events");
    $sql->execute();
    
    $eventos = [];

    while($row_events = $sql->fetch(\PDO::FETCH_ASSOC)) {
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
}