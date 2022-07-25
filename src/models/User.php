<?php

namespace src\models;
global $pdo;

 require '../connnect.php';

class User
{
  
  public function dadosLogado()
  {
    global $pdo;
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE idusuario = :id");
    $sql->bindParam(':id', $_SESSION['lgusuario']);
    $sql->execute();

    $dados = $sql->fetch(\PDO::FETCH_ASSOC);
    return $dados;
  }

  public function todosAdministradores()
  {
    global $pdo;
    $sql = $pdo->prepare("SELECT idusuario, nome, email, avatar FROM usuarios WHERE tipo = 'admin'");
    $sql->execute();

    $dados = $sql->fetchAll(\PDO::FETCH_ASSOC);
    return $dados;
  }

  public function logado()
  {

    if ($_SESSION['logado'] && !empty($_SESSION['logado'])) {
      return true;
    }
    $_SESSION['restrita'] = "<div style='position: absolute; top:15%; left:52%'class='alert alert-danger' role='alert'>
            Área <b>restrita!</b> Contate seus administradores.
          </div>";
    return false;
  }

  public function login()
  {
    global $pdo;
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
    $sql->bindParam(':email', $email);
    $sql->bindParam(':senha', $senha);
    $sql->execute();

    if ($sql->rowCount() > 0) {
      $dados = $sql->fetch(\PDO::FETCH_ASSOC);

      $_SESSION['lgusuario'] = $dados['idusuario'];
      $_SESSION['logado'] = true;
      return true;
      exit;
    }
    $_SESSION['erro'] = '<div class="alert alert-danger" role="alert">
        E-mail ou senha incorretos. Por favor tente outra vez...
      </div>';
    return false;
  }

  public function verificaLogin($email)
  {
    global $pdo;

    $sql = $pdo->prepare("SELECT email FROM usuarios WHERE email = :email ");
    $sql->bindParam(':email', $email);
    $sql->execute();
    if ($sql->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function register()
  {
    global $pdo;
    $avatar = $_POST['avatar'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    if ($this->verificaLogin($email)) {
      global $pdo;

      $_SESSION['email'] = "<div  class='alert alert-danger' role='alert' style='position:absolute; top:10%; left:53%;'> Usuário com esse <b>e-mail</b> já cadastrado!</div>";
      return false;
    } else {
      $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, avatar, criado_em) VALUES (
          :nome, :email, :senha, :avatar, now()
        )");
      $sql->bindParam(':nome', $nome);
      $sql->bindParam(':email', $email);
      $sql->bindParam(':senha', $senha);
      $sql->bindParam(':avatar', $avatar);
      $sql->execute();

      $_SESSION['email'] = "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso!</div>";
      return true;
    }
  }

  public function registerAdministrador()
  {
    global $pdo;

    $avatar = $_POST['avatar'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($this->verificaLogin($email)) {
      $_SESSION['email'] = "<div class='alert alert-danger' role='alert'> Usuário com esse <b>e-mail</b> já cadastrado!</div>";
      return false;
    } else if (empty($avatar)) {
      $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, avatar, tipo, criado_em) 
                          VALUES (:nome, :email, :senha, :avatar, 'admin', now() )");
      $sql->bindParam(':nome', $nome);
      $sql->bindParam(':email', $email);
      $sql->bindParam(':senha', $senha);
      $sql->bindParam(':avatar', 'default.png');
      $sql->execute();

      $_SESSION['email'] = "<div class='alert alert-success' role='alert'> Administrador cadastrado com sucesso!</div>";
      return true;
    } else {
      $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, avatar, tipo, criado_em) 
                          VALUES (:nome, :email, :senha, :avatar, 'admin', now() )");
      $sql->bindParam(':nome', $nome);
      $sql->bindParam(':email', $email);
      $sql->bindParam(':senha', $senha);
      $sql->bindParam(':avatar', $avatar);
      $sql->execute();

      $_SESSION['email'] = "<div class='alert alert-success' role='alert'> Administrador cadastrado com sucesso!</div>";
      return true;
    }
  }

  public function busqueAdministradorPorID($id)
  {
    global $pdo;
    // var_dump($id); die();
    $sql = $pdo->prepare("SELECT idusuario, nome, email, avatar FROM  usuarios WHERE idusuario = :id ");
    $sql->bindParam(':id', $id['id']);
    $sql->execute();

    $dados = $sql->fetch(\PDO::FETCH_ASSOC);
    return $dados;
  }

  public function editarAdministrador($id)
  {
    global $pdo;
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $avatar = $_POST['avatar'];

    if (empty($avatar)) {
      $sql = $pdo->prepare("UPDATE usuarios SET nome = :nome,avatar = :avatar, email = :email WHERE idusuario = :id");
      $sql->bindValue(':nome', $nome);
      $sql->bindValue(':email', $email);
      $sql->bindValue(':avatar', 'default.png');
      $sql->bindValue(':id', $id['id']);
      $sql->execute();
      return true;
    } else {
      $sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, avatar = :avatar WHERE idusuario = :id");
      $sql->bindValue(':nome', $nome);
      $sql->bindValue(':email', $email);
      $sql->bindValue(':avatar', $avatar);
      $sql->bindValue(':id', $id['id']);
      $sql->execute();
      return true;
    }
  }

  public function listAllUsers()
  {
    global $pdo;

    $sql = $pdo->prepare("SELECT idusuario, nome, email,tipo, avatar FROM usuarios");
    $sql->execute();

    $dados = $sql->fetchAll(\PDO::FETCH_ASSOC);
    return $dados;
  }

  public function editarUsuario($id)
  {
    global $pdo;

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    $sql = $pdo->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE idusuario = ?");
    $sql->bindParam(1, $nome);
    $sql->bindParam(2, $email);
    $sql->bindParam(3, md5($senha));
    $sql->bindParam(4, $id['id']);

    $sql->execute();
    $_SESSION['sucesso'] = "<div class='alert alert-success  alert-dismissible fade show' role='alert'>Usuário alterado com sucesso!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    
    return true;
  }

  public function deletarUsuario($id)
  {
    global $pdo;

    $sql = $pdo->prepare("DELETE FROM usuarios WHERE idusuario = :id");
    $sql->bindValue(':id', $id['id']);
    $sql->execute();
    $_SESSION['sucesso'] = "<div class='alert alert-success  alert-dismissible fade show' role='alert'>Usuário deletado com sucesso!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    
  


    
    return true;
  }
}
