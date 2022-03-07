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
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css'; ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/sidebar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/navbar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/dashboard.css'; ?>">

  <title>PSI | Dashboard</title>
</head>

<body>


  <?php $render('navbar'); ?>
  <?php $render('sidebar');
  ?>
  <main>
    <div class="main-container">
      <!-- SESSÕES -->
      <?php
        if(isset($_SESSION['sucesso'])) {
          echo $_SESSION['sucesso'];
          unset($_SESSION['sucesso']);
          $_SESSION['sucesso']  = '';
        }
        
      ?>


      <div class="content-appointment">
        <div class="appointment-info" title="Pendentes">
          <i class="fas fa-calendar-day fa-6x"></i>
          <div class="appointment-scheduled">
            <span><?php echo $pendentes['pendentes']; ?></span>
            <span class="text-appointments">Pendentes</span>
          </div>
          <!--appointment-info-->
        </div>
        <!--appointment-info-->
        <div class="appointment-info" title="Marcados">
          <i class="fas fa-calendar-check fa-6x"></i>
          <div class="appointment-scheduled">
            <span><?php echo $marcados['marcados']; ?></span>
            <span class="text-appointments">Confirmados</span>
          </div>
          <!--appointment-info-->
        </div>
        <!--appointment-info-->
        <div class="appointment-info" title="Terminados">
          <i class="fas fa-clock fa-6x"></i>
          <div class="appointment-scheduled">
            <span><?php echo $cancelados['cancelados']; ?></span>
            <span class="text-appointments">Terminados</span>
          </div>
          <!--appointment-info-->
        </div>
        <!--appointment-info-->
      </div>
      <!--content-appointment-->

      <div class="table-content">
        <table width="100%">
          <div class="box-search">
            <span>Agendamentos Pendentes</span>
            <input type="text" id="pesquisa" placeholder="Procure um agendamento">
          </div>
          <thead>
            <tr>

              <td>Paciente</td>
              <td>Psicólogo</td>
              <td>Início</td>
              <td>Fim</td>
              <td>Confirmar/Cancelar</td>
            </tr>
          </thead>
          <tbody>

            <?php 
            if(empty($agendamento)) {
              echo "<span class='sem-consulta'>Sem consultas pendentes no momento!</span>";
            } else {
              foreach ($agendamento as $agendamentos) :?>
                <tr>
                  <td><?php echo $agendamentos['Paciente']; ?></td>
                  <td><?php echo$agendamentos['Medico']; ?></td>
                  <td><?php echo $agendamentos['inicio']; ?></td>
                  <td><?php echo $agendamentos['fim']; ?></td>
                  <td colspan="2">
                    <a href="<?php echo $base.'/appointments/confirm/'.$agendamentos['idagendamento']; ?>" class="confirm" title='Confirmar Consulta'>
                      <i style="color:green;" class='fas fa-check fa-2x'></i>
                    </a>
                    <a href="<?php echo $base.'/appointments/cancel/'.$agendamentos['idagendamento']; ?>" class="confirm" title='Cancelar Consulta'>
                      <i style="color:#f00;" class='fas fa-ban fa-2x'></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach;} ?>

          </tbody>
        </table>
      </div>
    </div>
    <!--main-container-->
  </main>
</body>

</html>
<script src="<?php echo $base . '/assets/js/script.js'; ?>"></script>
<script src="<?php echo $base . '/assets/js/personalizado.js'; ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>