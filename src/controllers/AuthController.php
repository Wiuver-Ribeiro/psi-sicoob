<?php
namespace src\controllers;

use \core\Controller;
use \src\models\User;

class AuthController extends Controller {
  public function index() {
    $this->render('signin');
  }  
}