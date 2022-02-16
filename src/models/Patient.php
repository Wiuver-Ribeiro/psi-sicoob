<?php
namespace src\models;
use \core\Model;

class Patient extends Model {

  public function todosPacientes() {
    include '../connnect.php';

    $sql = $pdo->prepare("SELECT nome, email, avatar FROM usuarios WHERE tipo = 'paciente' ");
    $sql->execute();

    $dados = $sql->fetchAll();
    return $dados;
  }
}