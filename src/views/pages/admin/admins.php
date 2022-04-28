<?php

use \src\models\USer;

$usuario = new User();
$info = $usuario->dadosLogado();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style>
    .container {
      width: calc(100% - 250px);
      margin-left: 250px;
    }

    img {
      width: 80px;
      object-fit: contain !important;
    }

    .hover {
      cursor: pointer !important;
    }
  </style>
  <title>PSI | Administradores</title>
</head>

<body>
  <?php
  $render('navbar');
  $render('sidebar');
  //SESSÕES
  if (isset($_SESSION['email'])) {
    echo $_SESSION['email'];
    unset($_SESSION['email']);
    $_SESSION['email'] = '';
  }
  ?>

  <div class="container pt-5 bg-dark">
    <h2 class="text-light mb-4">Administradores:</h2>
    <div class="container-fluid rounded p-4" style="background: #151419">
      <div class="column d-flex justify-content-between">
        <h4 class="text-light">Todos os Administradores:</h4>
        <?php echo ($info['tipo'] == "admin") ? " <a class='btn btn-primary' href='" . $base . "/admins/create'><i class='fas fa-user-plus'></i></a>" : "" ?>
      </div>
      <hr class="text-light">

      <div class="row justify-content-between mb-2 p-3">
        <?php foreach ($administradores as $administrador) : ?>
          <div class="hover col-lg-5 col-md-7 cols-m-1 bg-dark mr-3 mb-4 p-3 d-flex justify-content-between align-items-center rounded shadow-sm" onclick="location.href='http://localhost/psi-sicoob/public/admins/edit/<?php echo $administrador['idusuario']; ?>'">
            <img class="img-fluid rounded-circle " src="<?php echo $base . '/assets/icons/' . $administrador['avatar']; ?>" alt="">
            <div class="row ">
              <span class="text-light text-center fs-5"><?php echo $administrador['nome']; ?></span>
              <span class="text-light text-center fs-6"><?php echo $administrador['email']; ?></span>

            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <!--row-pai-->
  </main>


  <script src="<?php echo $base; ?>/assets/js/script.js"></script>
  <script src="<?php echo $base . '/assets/js/personalizado.js'; ?>"></script>

  <script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>
</body>

</html>