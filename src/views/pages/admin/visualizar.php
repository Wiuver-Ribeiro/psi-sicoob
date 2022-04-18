<?php
require __DIR__ . '../../../../../connnect.php';

$resultado = '';

$sql = $pdo->prepare(
  "SELECT 
    nome, 
    email, 
    tipo, 
    senha
      FROM usuarios
        WHERE idusuario = " . $_POST['user_id'] . ";
   "
);
$sql->execute();

$dados = $sql->fetch(PDO::FETCH_ASSOC);
$resultado .= "<div class='col mb-2'>";
$resultado .= "<label for='paciente'>Nome:</label>";
$resultado .= "<input type='text' class='form-control' name='nome'   id='pacienteForm' value='" . $dados['nome'] . "'>";
$resultado .= "</div>";
$resultado .= "<div class='col mb-2'>";
$resultado .= "<label for='psi'>E-mail:</label>";
$resultado .= "<input type='text' class='form-control'  name='email'  value='" . $dados['email'] . "'>";
$resultado .= "</div>";
$resultado .= "<div class='col mb-2'>";
$resultado .= "<label for='psi'>Senha:</label>";
$resultado .= "<input type='password' class='form-control'  name='senha'  value='" . $dados['senha'] . "'>";
$resultado .= "</div>";

echo $resultado;
