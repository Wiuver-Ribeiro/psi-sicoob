<?php
namespace src\controllers;


use \core\Controller;
use \src\models\User;
use \src\models\Patient;

class UserController extends Controller {
  public function index() {
    $this->render('signin');
  }

  public function createDoctor() {
    $this->render('/admin/doctors-create');
  }

  public function createPatient() {
    $paciente = new Patient();
    $paciente->registrarPaciente();
    $this->render('/admin/patients-create');
  }

  public function createAdmin() {
    $this->render('/admin/admins-create');
  }

  public function editAdmin($id) {
    $usuario = new User();
    $admin = $usuario->busqueAdministradorPorID($id);
    $this->render('/admin/admins-edit',
      [
        "administrador" => $admin,
      ]
    );
  }

  public function config() {
    $this->render('/admin/config');
  }

  //Função responsável por chamar a view administrador
  public function admins() {
    $usuario = new User();
    $admins = $usuario->todosAdministradores();
    $this->render('/admin/admins',
      [
        "administradores" => $admins,
      ]
    );
  }

    //Função responsável para destruir a sessão logado e deslogar da aplicação.
  public function logout() {
    unset($_SESSION['logado']);
    session_destroy();
    $this->redirect('/signin');
  }

  /*
    Sempre que tem um uma rota que chama um Controller 
      que irá chamar um método de um Model específico
  */
  public function login() {
    $usuario = new User(); //Intanciando um novo objeto
   $logado =  $usuario->login(); //Chamando um método do Model estanciado.
    if($logado) {
      $this->redirect('/dashboard');
    } 
    $this->redirect('/signin');
  }

  public function register() {
    $usuario = new User();
    $register = $usuario->register();
    if($register) {
      $this->redirect('/signin');
    } else {
      $this->redirect('/signup');
    }
  }

  public function registerAdministrador() {
    $usuario = new User();
    $register = $usuario->registerAdministrador();
    if($register) {
      $this->redirect('/admins');
    } else {
      $this->redirect('/admins/create');
    }
    
  }

  public function editarAdministrador($id) {
    $usuario = new User();
    // $admin = $usuario->busqueAdministradorPorID($id);

    $editarAdmin =  $usuario->editarAdministrador($id);
    if($editarAdmin) {
       $this->redirect('/admins');
    } else {
      $this->redirect('/admins/edit');
    }
  }
}
