<?php
namespace src\models;
use \core\Model;
use \src\models\User;

class Doctor extends Model {
  //psicólogos
  public function todosPsicologos() {
    require '../connnect.php';

    $sql = $pdo->prepare("SELECT u.nome, u.avatar, p.crp, p.especialidade
                  FROM usuarios as u INNER JOIN psi as p ON (u.idusuario = p.id_usuario) ");
    $sql->execute();

    $dados  = $sql->fetchAll();
    return $dados;
  }

  public function registrarPsicologo() {
    require '../connnect.php';
    $usuario = new User();

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $avatar  = $_POST['avatar'];
    $crp = $_POST['crp'];
    $especialidade = $_POST['especialidade'];
    //Atribui o valor padrão, caso o usuário não selecione avatar nenhum.
    $avatarNovo = (empty($_POST['avatar'])) ? 'default.png' : $_POST['avatar'];

    if($usuario->verificaLogin($email)) {
      $_SESSION['email'] = "<div class='alert alert-danger' role='alert'> Usuário com esse <b>e-mail</b> já cadastrado!</div>";
      return false;
    } else {
      
      $sql1 = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, avatar,tipo, criado_em) VALUES (:nome,:email,:senha, :avatar,'psi', now())");
      $sql1->bindValue(':nome', $nome);
      $sql1->bindValue(':email', $email);
      $sql1->bindValue(':senha', $senha);
      $sql1->bindValue(':avatar', $avatarNovo);
      $sql1->execute();

      $lastId = $pdo->lastInsertId();

      $sql2 = $pdo->prepare("INSERT INTO psi (id_usuario, crp, especialidade, criado_em) VALUES (:id_usuario, :crp, :especialidade, now())");
      $sql2->bindValue(':id_usuario', $lastId);
      $sql2->bindValue(':crp', $crp);
      $sql2->bindValue(':especialidade', $especialidade);
      $sql2->execute();

      $_SESSION['email'] = "<div class='alert alert-success' role='alert'> Usuário cadastrado com sucesso!</div>";
      return true;
      
    }
  }
}