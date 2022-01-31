<?php
namespace src\controllers;

use \core\Controller;

class UserController extends Controller {
  public function index() {
    $this->render('signin');
  }




  //Função responsável por chamar a vi
  public function admins() {
    $this->render('/admin/admins');
  }
}