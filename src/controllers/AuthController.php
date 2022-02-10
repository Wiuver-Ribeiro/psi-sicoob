<?php
namespace src\controllers;

use \core\Controller;
use \src\models\User;

class AuthController extends Controller {
  public function index() {
    $this->render('signin');
  }

  public function logout() {
    $this->redirect('/signin');
    unset($_SESSION['login']);
    session_destroy();
  }

  public function create() {
    $avatar = filter_input(INPUT_POST, 'avatar',FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password',FILTER_SANITIZE_STRING);
    $speciality = filter_input(INPUT_POST, 'speciality',FILTER_SANITIZE_STRING);

    if(empty($name) || empty($password) || empty($email) || empty($speciality)) {
      $_SESSION['erro'] = "<div style='position:absolute; z-index:999; top:2rem; left:47rem' class='alert alert-danger' role='alert'>
      <b class='alert-link''>Erro</b> Favor preencher os campos!
      </div>";
      $this->redirect('/doctors/create');
    } else {
      $data = User::insert([
        "avatar" => $avatar,
        "name" => $name,
        "email" => $email,
        "password" => $password,
        "speciality" => $speciality
      ])->execute();
      $this->redirect('/dashboard');
    }
  }

  
}