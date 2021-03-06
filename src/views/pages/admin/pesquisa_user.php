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
    <td><button style='background: #ffca2c;' class='btn btn-warning view_data' id=' ".$usuario['idusuario']."' class='btn btn-warning view_data'><i class='fas fa-user-edit text-light'></i></button></td>
    <td><button style='background: #bb2d3b;' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#confirm-delete' id='".$usuario['idusuario']."' class='btn btn-danger delete_user'><i class='fas fa-user-edit text-light'></i></button></td>
  </tr>";
  }
} else {
  echo "Nenhum usuário encontrado...";
}
?>
<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>
