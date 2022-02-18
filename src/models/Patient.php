<?php
namespace src\models;
use \core\Model;
use \src\models\User;

class Patient extends Model {

  public function todosPacientes() {
    include '../connnect.php';

    $sql = $pdo->prepare("SELECT idusuario, nome, email, avatar FROM usuarios WHERE tipo = 'paciente' ");
    $sql->execute();

    $dados = $sql->fetchAll();
    return $dados;
  }

  public function registrarPaciente() {
    require '../connnect.php';
    /*
      Pegar o último ID do registro inserido no bando de dados =>  $last_id = $conn->lastInsertId();
    */
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha']; 
    $avatar = $_POST['avatar'];
    $telefone = $_POST['telefone'];
    
    $usuario = new User();

    if($usuario->verificaLogin($email)) {
      $_SESSION['email'] = "<div class='alert alert-danger' role='alert'> Usuário com esse <b>e-mail</b> já cadastrado!</div>";
      return false;
    } else {
      //Query 1 inserir na tabela usuarios
      $sql1 = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, avatar) 
                                          VALUES  (:nome, :email, :senha, :avatar) ");
      $sql1->bindValue(':nome',$nome);
      $sql1->bindValue(':email',$email);
      $sql1->bindValue(':senha', $senha);
      $sql1->bindValue(':avatar', $avatar);
      $sql1->execute();

      $last_id = $pdo->lastInsertId();

        //Query 2 inserir na tabela pacientes
      $sql2 = $pdo->prepare("INSERT INTO pacientes (telefone, id_usuario) VALUES (:telefone, :id_usuario)");
      $sql2->bindValue(':telefone', $telefone);
      $sql2->bindValue(':id_usuario', $last_id);
      $sql2->execute();

      $_SESSION['email'] = "<div class='alert alert-success' role='alert'> Usuário cadastrado com sucesso!</div>";
    }

  }

  public function busquePacientePorID($id) {
    require '../connnect.php';
    $sql = $pdo->prepare("SELECT idusuario, nome, email, avatar FROM usuarios WHERE tipo ='paciente' AND idusuario = :id");
    $sql->bindValue(':id', $id['id']);
    $sql->execute();

    $dados = $sql->fetch(\PDO::FETCH_ASSOC);
    return $dados;
  }
  public function editarPaciente($id) {
    require '../connnect.php';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $avatar = $_POST['avatar'];

    if(empty($avatar)) {
      $sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email
        WHERE idusuario = :id");
      $sql->bindValue(':nome', $nome);
      $sql->bindValue(':email', $email);
      $sql->bindValue(':id', $id['id']);
      $sql->execute();
    }else {
      $sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, avatar = :avatar
        WHERE idusuario = :id");
      $sql->bindValue(':nome', $nome);
      $sql->bindValue(':email', $email);
      $sql->bindValue(':avatar', $avatar);
      $sql->bindValue(':id', $id['id']);
      $sql->execute();
    }


    $_SESSION['email'] = "<div class='alert alert-danger' role='alert'> Usuário cadastrado com sucesso! </div>";
    return true;
  }
}