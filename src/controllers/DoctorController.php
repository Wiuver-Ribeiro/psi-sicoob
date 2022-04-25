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
     $_SESSION['sucesso'] = "<div class='alert alert-success' role='alert'>Pscólogo alterado com sucesso!</div>";
     $this->redirect('/doctors');
   } else {
     $_SESSION['falha'] = "<div class='alert alert-danger'>Erro ao alterar dados do Psicólogo!</div>";
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
  //  print_r($editPsicologo); die();

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
}