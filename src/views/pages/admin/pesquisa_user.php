<?php

require __DIR__ . '../../../../../connnect.php';

$pesquisa = filter_input(INPUT_POST, 'palavra');

$sql = $pdo->prepare("SELECT * FROM usuarios WHERE nome LIKE '%$pesquisa%'");

$sql->execute();


if ($sql->rowCount() > 0) {
  while ($usuario = $sql->fetch(\PDO::FETCH_ASSOC)) {
    echo "
    <tr>
    <td>
      <img class='img-fluid' style='width:50px; height:50px; border-radius:50%; object-fit:cover' src='http://localhost/psi-sicoob/public/assets/icons/".$usuario['avatar']."'>
    </td>
    <td>" . $usuario['nome'] . "</td>
    <td>" . $usuario['email'] . "</td>
    <td>" . $usuario['tipo'] . "</td>
    <td><a style='background: #ffca2c;' class='btn btn-warning' href='http://localhost/psi-sicoob/public/'><i class='fas fa-user-edit text-light'></i></a></td>
  </tr>";
  }
} else {
  echo "Nenhum usuário encontrado...";
}
?>
<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>
