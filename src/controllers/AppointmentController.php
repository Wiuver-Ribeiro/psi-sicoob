<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Appointment;

class AppointmentController extends Controller {
  public function index() {
    $this->render('/admin/appointments',[
      "appointments" => $this->listAllEvents(),
    ]);
  }

  public function logout() {
    $this->redirect('/signin');
  }

  public static function listAllEvents() {
    
    $data = Appointment::select()->execute();
    return $data;
      
  }

  public function getAllAppointments() {

  }
}