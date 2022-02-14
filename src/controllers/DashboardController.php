<?php
namespace src\controllers;

use \core\Controller;
use \src\controllers\UserController;

class DashboardController extends Controller {
  public function index() {
    $user = new UserController();
    // if(!$user->isLogged()) {
    //   $this->redirect('/signin');
    // }
    
    $this->render('dashboard');
  }
}