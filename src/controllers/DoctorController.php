<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Doctor;

class DoctorController extends Controller {
  public function index() {
    /// /admin/nome_pasta
    $this->render('/admin/doctors');
  }

  public static function getAllDoctors() {
    $data = Doctor::select('users.name, doctors.speciality')->join('users', 'users.iduser', '=', 'doctors.user_id')->where('users.type','ps')->get();
    return $data;
  
    
  }
}