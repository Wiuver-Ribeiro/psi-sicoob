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
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/bootstrap.min.css'?>">
  <title>PSI | Dashboard</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="<?php echo $base . '/assets/js/script.js'; ?>"></script>
  <style>
    .container {
      width: calc(100% - 250px);
      margin-left: 250px;
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
    <div class="row justify-content-evenly align-items-center pt-5">

      <div class="col-sm-3 col-md col-lg-3 bg-secondary rounded p-4">
        <div class="row justify-content-between">
          <div class="col">
            <img class="img-fluid" style="max-width: 60%" src="<?php echo $base . '/assets/icons/calendar-day-solid.svg'; ?>" alt="">

          </div>
          <div class="row col text-right">
            <span class="text-light fs-2"><?php echo $pendentes['pendentes']; ?></span>
            <span class="text-light fs-4">Próximos</span>
          </div>
        </div>
      </div>
      <!--coluna 01 -->
      <div class="col-sm-3 col-md col-lg-3 bg-success rounded p-4">
        <div class="row justify-content-between">
          <div class="col">
            <img class="img-fluid " style="max-width: 70%;" src="<?php echo $base . '/assets/icons/calendar-check-solid.svg'; ?>" alt="">
          </div>
          <div class="row col ">
            <span class="text-light fs-2"><?php echo $marcados['marcados']; ?></span>
            <span class="text-light fs-4">Confirmados</span>
          </div>
        </div>
      </div>
      <!--coluna 01 -->
      <div class="col-sm-3 col-md col-lg-3 bg-danger rounded p-4">
        <div class="row justify-content-between">
          <div class="col">
            <img class="img-fluid" style="max-width: 70%" src="<?php echo $base . '/assets/icons/clock-solid.svg'; ?>" alt="">
          </div>
          <div class="row col text-right">
            <span class="text-light fs-2"><?php echo $cancelados['cancelados']; ?></span>
            <span class="text-light fs-4">Terminados</span>
          </div>
        </div>
      </div>

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

            echo " <div class='alert alert-secondary' role='alert' style='position:absolute; top:60%; left:45%;'>Sem consultas pendentes no momento!</div>";
          } else {
            foreach ($agendamento as $agendamentos) : 
            $dataInicio = str_replace('-', '/',$agendamentos['inicio']);
            $dataFim = str_replace('-', '/',$agendamentos['fim']);
            ?>
              <tr>
                <td><?php echo $agendamentos['Paciente']; ?></td>
                <td><?php echo $agendamentos['Medico']; ?></td>
                <td><?php echo date('d/m/Y H:i:s', strtotime($dataInicio)); ?></td>
                <td><?php echo date('d/m/Y H:i:s', strtotime($dataFim)); ?></td>
                <td>
                  <a href="<?php echo $base . '/appointments/confirm/' . $agendamentos['idagendamento']; ?>" class="confirm" title='Confirmar Consulta'>
                    <i style="color:green;" class='fas fa-check fa-2x'></i>
                  </a>
                </td>
                <td>
                  <a href="<?php echo $base . '/appointments/cancel/' . $agendamentos['idagendamento']; ?>" class="confirm col-sm-2" title='Cancelar Consulta'>
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
<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>