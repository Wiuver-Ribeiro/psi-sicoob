<?php
namespace src\models;
use \src\models\User;

global $pdo;
require '../connnect.php';

class Doctor {

  //psicólogos
  public function todosPsicologos() {
    global $pdo;
    //Pega todos os dados
    $sql = $pdo->prepare("SELECT p.idpsi, u.nome, u.avatar, p.crp, p.especialidade
                  FROM usuarios as u INNER JOIN psi as p ON (u.idusuario = p.id_usuario) ");
    $sql->execute();

    $dados  = $sql->fetchAll(\PDO::FETCH_ASSOC);

    return $dados;
  }

  public function registrarPsicologo() {
    global $pdo;
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
      $_SESSION['falha'] = "<div style='position:absolute' class='alert alert-danger' role='alert'> Usuário com esse <b>e-mail</b> já cadastrado!</div>";
      return false;
    } else {
      
      $sql1 = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, avatar,tipo, criado_em) VALUES (:nome,:email,:senha, :avatar,'psi', now())");
      $sql1->bindValue(':nome', $nome);
      $sql1->bindValue(':email', $email);
      $sql1->bindValue(':senha', md5($senha));
      $sql1->bindValue(':avatar', $avatarNovo);
      $sql1->execute();

      $lastId = $pdo->lastInsertId();

      $sql2 = $pdo->prepare("INSERT INTO psi (id_usuario, crp, especialidade, criado_em) VALUES (:id_usuario, :crp, :especialidade, now())");
      $sql2->bindValue(':id_usuario', $lastId);
      $sql2->bindValue(':crp', $crp);
      $sql2->bindValue(':especialidade', $especialidade);
      $sql2->execute();

     $_SESSION['sucesso'] = "<div class='alert alert-success  alert-dismissible fade show' role='alert'>Psicólogo cadastrado com sucesso!
     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
     </div>";
     return true;
      
    }
  }

  public function busquePsicologoPorID($id) {
    global $pdo;

    $sql = $pdo->prepare("SELECT * FROM usuarios as u 
      INNER JOIN psi as p ON (u.idusuario = p.id_usuario) WHERE p.idpsi = :id");
    $sql->bindParam(':id',$id['id']);
    $sql->execute();

    $dados = $sql->fetch(\PDO::FETCH_ASSOC);
    
    return $dados;
  }

  public function editarPsicologo($id) {
    global $pdo;
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $crp = $_POST['crp'];
    $especialidade = $_POST['especialidade'];
    $avatar = $_POST['avatar'];

    if(empty($avatar)) {
      $sql = $pdo->prepare("UPDATE usuarios as u INNER JOIN  psi as p ON (u.idusuario = p.id_usuario)
      SET u.nome = :nome, u.email =  :email, p.crp = :crp, p.especialidade = :especialidade, u.editado_em = now(), p.editado_em = now() WHERE p.idpsi = :idusuario");
      $sql->bindValue(':nome',$nome);
      $sql->bindValue(':email',$email);
      $sql->bindValue(':crp',$crp);
      $sql->bindValue(':especialidade',$especialidade);
      $sql->bindValue(':idusuario',$id['id']);
      $sql->execute();
      $_SESSION['sucesso'] = "<div class='alert alert-success  alert-dismissible fade show' role='alert'>Psícologo atualizado com sucesso!
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    return true;
    } else {
      $sql = $pdo->prepare("UPDATE usuarios as u INNER JOIN  psi as p ON (u.idusuario = p.id_usuario)
      SET u.nome = :nome, u.email =  :email, p.crp = :crp, p.especialidade = :especialidade, u.avatar = :avatar, u.editado_em = now(), p.editado_em = now() WHERE p.idpsi = :idusuario
      ");

      $sql->bindValue(':nome',$nome);
      $sql->bindValue(':email',$email);
      $sql->bindValue(':crp',$crp);
      $sql->bindValue(':especialidade',$especialidade);
      $sql->bindValue(':avatar',$avatar);
      $sql->bindValue(':idusuario', $id['id']);
      $sql->execute();
      
      $_SESSION['sucesso'] = "<div  class='alert alert-success  alert-dismissible fade show' role='alert'>Psícologo atualizado com sucesso!
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
   
    return true;
    }
    $_SESSION['falha'] = "<div style='position:absolute; left:35%;' class='alert alert-success' role='alert'> Erro ao alterar dados do psicólogo! </div>";
    return false;
  }

  public function excluirPsicologo($id) {
    global $pdo;

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE idusuario = :idusuario");
    $sql->bindValue(':idusuario', $id['id']);
    $sql->execute();

    if($sql->rowCount() > 0) {
      $sql = $pdo->prepare("DELETE FROM usuarios  WHERE idusuario = :idusuario");
      $sql->bindValue(':idusuario', $id['id']);
      $sql->execute();
      $_SESSION['sucesso'] = "<div class='alert alert-success  alert-dismissible fade show' role='alert'>Usuário deletado com sucesso!
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
      return true;
    } return false;

  }

}