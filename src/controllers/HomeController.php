<?php
namespace src\controllers;

use \core\Controller;

class HomeController extends Controller {

    public function index() {
        //Passando parametros na rota
        // $this->render('home', ['nome' => 'Bonieky']);
        $this->render('home');
    }

    public function signin() {
        $this->render('signin');
    }

    public function signup() {
        $this->render('signup');
    }

}