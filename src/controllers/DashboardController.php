<?php
namespace src\controllers;

use \core\Controller;

class DashboardController extends Controller {
  public function index() {
    $this->render('dashboard');
  }
}