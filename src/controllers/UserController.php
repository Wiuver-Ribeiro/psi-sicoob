<?php
namespace src\controllers;

use \core\Controller;

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




  //Função responsável por chamar a vi
  public function admins() {
    $this->render('/admin/admins');
  }
}