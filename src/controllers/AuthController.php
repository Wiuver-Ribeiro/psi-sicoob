<?php
namespace src\controllers;

use \core\Controller;

class AuthController extends Controller {
  public function index() {
    $this->render('signin');
  }

  public function logout() {
    $this->redirect('/signin');
    unset($_SESSION['login']);
    session_destroy();
  }

  
}