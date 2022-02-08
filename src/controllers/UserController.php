<?php
namespace src\controllers;


use \core\Controller;
use \src\models\User;

class UserController extends Controller {
  public function index() {
    $this->render('signin');
  }

  public function createDoctor() {
    $this->render('/admin/doctors-create');
  }

  public function createPatient() {
    $this->render('/admin/patients-create');
  }

  public function createAdmin() {
    $this->render('/admin/admins-create');
  }

  public function config() {
    $this->render('/admin/config');
  }

  //Função responsável por chamar a vi
  public function admins() {
    $this->render('/admin/admins');
  }

  public function login() {
    $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if(empty($email) && empty($password)) {
      $_SESSION['erro'] = "<div style='position:absolute; z-index:999; top:6rem; left:47rem' class='alert alert-danger' role='alert'>
      <b class='alert-link''>Erro</b> Favor preencher os campos!
      </div>";
      $this->redirect('/signin');
    } else {

      $data = User::select()->where('email', $email)->where('password', $password)->execute();

        if(count($data) > 0) {
          $_SESSION['login'] = "<div class='alert alert-success' role='alert'>
          Seja Bem-vindo <b>Admin</b>
        </div>";
          $this->redirect('/dashboard');
        } else {
          $_SESSION['erro'] = "<div style='position:absolute; z-index:999; top:6rem; left:47rem' class='alert alert-danger' role='alert'>
          <b class='alert-link''>Erro</b> usuário não encontrado!
          </div>"; 
          $this->redirect('/signin');

        } 
       }
    }
  }
