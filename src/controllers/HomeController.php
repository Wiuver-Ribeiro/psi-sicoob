<?php
namespace src\controllers;

use \core\Controller;

class HomeController extends Controller {

    public function index() {

        $this->render('home');
    }

    public function signin() {
        $this->render('signin');
    }

    public function signup() {
        $this->render('signup');
    }

}