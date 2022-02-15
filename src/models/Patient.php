<?php
namespace src\models;
use \core\Model;

class Patient extends Model {

  public function todosPacientes() {
    include '../connnect.php';

    $sql = $pdo->prepare("SELECT u.nome, u.email 
      FROM usuarios AS u 
        INNER JOIN pacientes AS p ON (u.idusuario = p.id_usuario)");
    $sql->execute();

    $dados = $sql->fetch(\PDO::FETCH_ASSOC);
    return $dados;
  }
}