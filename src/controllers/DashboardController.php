<?php
namespace src\controllers;

use \core\Controller;
use \src\controllers\UserController;

class DashboardController extends Controller {
  public function index() {

    $this->render('dashboard');
  }
}