<?php

use \src\models\USer;

$usuario = new User();
$info = $usuario->dadosLogado();
// echo "<pre>";
// print_r($psicologo); die();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/sidebar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/navbar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/doctors.css'; ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="<?php echo $base . '/assets/js/script.js'; ?>"></script>

  <title>PSI | Psicólogos </title>
  <style>
    .container {
      height: 100vh;
      width: calc(100% - 270px);
      margin-left: 270px;
      overflow: hidden;
    }

    img {
      width: 80px;
      object-fit: contain !important;
    }
  </style>
</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar'); ?>

  <main class="container p-5 bg-dark">
    <h2 class="text-light mb-4">Psicólogos</h2>
    <div class="container-fluid rounded p-4" style="background: #151419">
      <div class="column d-flex justify-content-between">
        <h4 class="text-light">Todos os médicos:</h4>
        <?php echo ($info['tipo'] == "admin") ? " <a class='btn btn-primary' href='" . $base . "/doctors/create'><i class='fas fa-user-plus'></i></a>" : "" ?>
      </div>
      <hr class="text-light">

      <div class="row justify-content-between mb-2 p-3">
        <?php foreach ($psicologo as $psicologos) : ?>
          <div class="hover-md col-lg-5 col-md-7 cols-m-1 bg-dark mr-3 mb-4 p-3 d-flex justify-content-between align-items-center rounded shadow-sm">
            <img class="img-fluid rounded-circle " src="<?php echo $base . '/assets/icons/' . $psicologos['avatar']  ?>" alt="">
            <div class="row ">
              <span class="text-light text-center fs-5"> <?php echo $psicologos['nome']; ?></span>
              <span class="text-light text-center fs-6">CRP: <?php echo $psicologos['crp']; ?></span>
              <span class="text-light text-center fs-6">Especialidade:<?php echo $psicologos['especialidade']; ?></span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <!--row-pai-->
  </main>


  <script src="<?php echo $base . '/assets/js/personalizado.js'; ?>"></script>

  <script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>
</body>

</html>