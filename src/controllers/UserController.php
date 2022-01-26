<?php
namespace src\controllers;

use \core\Controller;

class UserController extends Controller {
  public function index() {
    $this->render('signin');
  }
}