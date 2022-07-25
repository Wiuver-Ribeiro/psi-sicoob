<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Doctor;
use \src\models\User;

class DoctorController extends Controller {
  public function index() {
    $psicologo =  new Doctor();
    $todosPSI = $psicologo->todosPsicologos();
    $this->render('/admin/doctors', [
      "psicologo" => $todosPSI,
    ]);
  }

  public function createDoctor() {

    $usuario = new User();  
    
    if(!$usuario->logado ()) {
      $this->redirect('/signin');
    }

    $psicologo = new Doctor();
    // $psi = $psicologo->registrarPsicologo();
   if($psicologo->registrarPsicologo()) {
     $this->redirect('/doctors');
   } else {
     $this->redirect('/doctors/create');
   }
  }

  public function editDoctor($id) { 
    $usuario = new User();
    
    if(!$usuario->logado ()) {
      $this->redirect('/signin');
    }

    $psicologo = new Doctor();
   $editPsicologo =  $psicologo->busquePsicologoPorID($id);

    $this->render('/admin/doctor-edit', [
      "psicologo" => $editPsicologo,
    ]);
  }

  public function editarDoctor($id) {
    $psicologo = new Doctor();
    $editPsicologo = $psicologo->editarPsicologo($id);

    if($editPsicologo) {
      $this->redirect('/doctors');
    } else {
      $this->redirect('/doctors/edit');
    }
  }

  public function deletarDoctor($id) {
    $psicologo =  new Doctor();
    $psicologo->excluirPsicologo($id);
  }
}