<?php
namespace src\models;
use \core\Model;

// setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");
// $hora = date('H:i:s');
// $dia = date("Y-m-d");
// $data = $dia."".$hora;

class User extends Model {
  
  public function dadosLogado() {
    require '../connnect.php';
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE idusuario = :id");
    $sql->bindParam(':id', $_SESSION['lgusuario']);
    $sql->execute();

    $dados = $sql->fetch(\PDO::FETCH_ASSOC);
    return $dados;
  }

  public function todosAdministradores() {
    require '../connnect.php';
    $sql = $pdo->prepare("SELECT idusuario, nome, email, avatar FROM usuarios WHERE tipo = 'admin'");
    $sql->execute();
    
    $dados = $sql->fetchAll(\PDO::FETCH_ASSOC);
    return $dados;
  }

  public function logado() {

    if($_SESSION['logado'] && !empty($_SESSION['logado'])) {
      return true;
    } 
    $_SESSION['restrita'] = "<div style='position: absolute; top:15%; left:52%'class='alert alert-danger' role='alert'>
            Área <b>restrita!</b> Contate seus administradores.
          </div>";
    return false;
  }

  public function login() {
    include '../connnect.php';
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
    $sql->bindParam(':email', $email);
    $sql->bindParam(':senha', $senha);
    $sql->execute();

    if($sql->rowCount() > 0) {
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

  public function verificaLogin($email) {
    include '../connnect.php';

    $sql = $pdo->prepare("SELECT email FROM usuarios WHERE email = :email ");
    $sql->bindParam(':email', $email);
    $sql->execute();
    if($sql->rowCount() > 0) {
     return true;
    } else {
      return false;
    }
  }

  public function register() {
    include '../connnect.php';
    $avatar = $_POST['avatar'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    if($this->verificaLogin($email)) {
      require '../connnect.php';

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

  public function registerAdministrador() {
    require '../connnect.php';

    $avatar = $_POST['avatar'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if($this->verificaLogin($email)) {
      $_SESSION['email'] = "<div class='alert alert-danger' role='alert'> Usuário com esse <b>e-mail</b> já cadastrado!</div>";
      return false;
    }
    $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, avatar, tipo, criado_em) 
                        VALUES (:nome, :email, :senha, :avatar, 'admin', now() )");
    $sql->bindParam(':nome',$nome);
    $sql->bindParam(':email',$email);
    $sql->bindParam(':senha',$senha);
    $sql->bindParam(':avatar',$avatar);
    $sql->execute();

    $_SESSION['email'] = "<div class='alert alert-success' role='alert'> Administrador cadastrado!</div>";
    return true;
  }

  public function busqueAdministradorPorID($id) {
   require '../connnect.php';
    // var_dump($id); die();
   $sql = $pdo->prepare("SELECT idusuario, nome, email, avatar FROM  usuarios WHERE idusuario = :id ");
   $sql->bindParam(':id', $id['id']);
   $sql->execute();

   $dados = $sql->fetch(\PDO::FETCH_ASSOC);
    return $dados;
  }

  public function editarAdministrador($id) {
    require '../connnect.php';
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $avatar = $_POST['avatar'];

    if(empty($avatar)) {
      $sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE idusuario = :id");
      $sql->bindValue(':nome', $nome);
      $sql->bindValue(':email', $email);
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

  public function listAllUsers() {
    require '../connnect.php';

    $sql = $pdo->prepare("SELECT idusuario, nome, email, avatar FROM usuarios");
    $sql->execute();

    $dados = $sql->fetchAll(\PDO::FETCH_ASSOC);
    return $dados;
  }

  public function editarUsuario($id) {
    print_r($_POST); die();
  }

}