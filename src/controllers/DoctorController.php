<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Doctor;

class DoctorController extends Controller {
  public function index() {
    /// /admin/nome_pasta
    $psicologo =  new Doctor();
    $todosPSI = $psicologo->todosPsicologos();
    $this->render('/admin/doctors', [
      "psicologo" => $todosPSI,
    ]);
  }

  public function createDoctor() {
    $psicologo = new Doctor();
    $psi = $psicologo->registrarPsicologo();
   if($psi) {
     $this->redirect('/doctors');
   } else {
     $this->redirect('/doctors/create');
   }
  }

}