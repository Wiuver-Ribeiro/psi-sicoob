<!DOCTYPE html>
<html lang="en">

<?php

use \src\models\USer;

$usuario = new User();
$info = $usuario->dadosLogado();

?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/sidebar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/navbar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/dashboard.css'; ?>">

  <title>PSI | Dashboard</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="<?php echo $base . '/assets/js/script.js'; ?>"></script>
  <style>
    .container {
      height: 100vh;
      width: calc(100% - 270px);
      margin-left: 270px;
      overflow: hidden;
    }
  </style>

</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar');
  ?>
  <!-- SESSÕES -->
  <?php
  if (isset($_SESSION['sucesso'])) {
    echo $_SESSION['sucesso'];
    unset($_SESSION['sucesso']);
    $_SESSION['sucesso']  = '';
  }
  ?>

  <div class="container bg-dark">
    <div class="row justify-content-evenly align-items-center mt-5">

      <div class="col-sm-3 col-md-2 col-lg-3 bg-secondary rounded p-4">
        <div class="row justify-content-between">
          <div class="col">
            <img class="img-fluid" style="max-width: 60%" src="<?php echo $base . '/assets/icons/calendar-day-solid.svg'; ?>" alt="">

          </div>
          <div class="row col text-right">
            <span class="text-light fs-4">Próximos</span>
            <span class="text-light fs-4">20</span>
          </div>
        </div>
      </div>
      <!--coluna 01 -->
      <div class="col-sm-3 col-md-2 col-lg-3 bg-success rounded p-4">
        <div class="row justify-content-between">
          <div class="col">
            <img class="img-fluid " style="max-width: 70%;" src="<?php echo $base . '/assets/icons/calendar-check-solid.svg'; ?>" alt="">
          </div>
          <div class="row col text-right">
            <span class="text-light fs-4">Confirmados</span>
            <span class="text-light fs-4">20</span>
          </div>
        </div>
      </div>
      <!--coluna 01 -->
      <div class="col-sm-3 col-md-2 col-lg-3 bg-danger rounded p-4">
        <div class="row justify-content-between">
          <div class="col">
            <img class="img-fluid" style="max-width: 70%" src="<?php echo $base . '/assets/icons/clock-solid.svg'; ?>" alt="">
          </div>
          <div class="row col text-right">
            <span class="text-light fs-4">Cancelados</span>
            <span class="text-light fs-4">20</span>
          </div>
        </div>
      </div>
      <!--coluna 01 -->
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-hover table-dark mt-5">
        <thead class="thead-light text-light">
          <tr>
            <th>Paciente</th>
            <th>Psicólogo</th>
            <th>Início</th>
            <th>Fim</th>
            <th>Confirmar</th>
            <th>Cancelar</th>
          </tr>
        </thead>

        <tbody>
          <?php
          if (empty($agendamento)) {
            echo "<span class='sem-consulta'>Sem consultas pendentes no momento!</span>";
          } else {
            foreach ($agendamento as $agendamentos) : ?>
              <tr>
                <td><?php echo $agendamentos['Paciente']; ?></td>
                <td><?php echo $agendamentos['Medico']; ?></td>
                <td><?php echo $agendamentos['inicio']; ?></td>
                <td><?php echo $agendamentos['fim']; ?></td>
                <td>
                  <a href="<?php echo $base . '/appointments/confirm/' . $agendamentos['idagendamento']; ?>" class="confirm" title='Confirmar Consulta'>
                    <i style="color:green;" class='fas fa-check fa-2x'></i>
                  </a>
                </td>
                <td>
                  <a href="<?php echo $base . '/appointments/cancel/' . $agendamentos['idagendamento']; ?>" class="confirm" title='Cancelar Consulta'>
                    <i style="color:#f00;" class='fas fa-ban fa-2x'></i>
                  </a>
                </td>
              </tr>
          <?php endforeach;
          } ?>
        </tbody>
      </table>
    </div>
  </div>



  <div id="resultado" style="background-color:red"></div>

</body>

</html>
<script src="<?php echo $base . '/assets/js/personalizado.js'; ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>