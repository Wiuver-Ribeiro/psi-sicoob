<!DOCTYPE html>
<html lang="en">

<?php

use \src\models\USer;
use \src\models\Appointment;

$usuario = new User();
$info = $usuario->dadosLogado();
$agendamento = new Appointment();
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
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/dashboardDoctor.css'; ?>">

  <title>PSI | Dashboard Doutor</title>
</head>

<body>


  <?php $render('navbar'); ?>
  <?php $render('sidebar');

  ?>
  <main>
    <div class="main-container">
      <!-- SESSÕES -->


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

      <div class="container">
        <div class="leftside">
          <div class="title">
            <h5>Próximos Atendimentos</h5>
          </div>
          <table width="100%" cellspacing="0">
            <thead>
              <tr>
                <td colspan="2">Paciente</td>
                <td>Data</td>
                <td>Status</td>
                <td>Cor</td>
              </tr>
            </thead>
            <tbody>
  <?php

  if(count($consultas) == 0) {
     echo "<span class='consulta-total'>Sem consultas neste momentos</span>";
  } else {

  
   foreach ($consultas as $consulta) : ?>
    <tr onclick="location.href=''">
      <td class="overflow-word ">
        <img src="<?php echo $base . "/assets/icons/" . $consulta['avatar']; ?>" alt="Avatar">
        <?php echo $consulta['nome']; ?>
      </td>
      <td><?php echo $consulta['inicio']; ?></td>
      <?php
      if ($consulta['status'] == 'pendentes') {
        echo "<td class='pendente'>" . $consulta['status'] . "</td>
      <td class='pendente'><div class='ball'></div></td>
      ";
      } else if ($consulta['status'] == 'confirmados') {
        echo "<td class='confirmado'>" . $consulta['status'] . "</td>
      <td class='confirmado'><div class='ball'></div></td>
      ";
      }
      ?>
    </tr>
  <?php endforeach;} ?>
  

            </tbody>
          </table>
        </div>
        <div class="rightside">
          <div class="title">
            <h5>Últimas Consultas</h5>
          </div>
          <div style="border-left:none;" class="title">
            <h6 style="color: #888">Paciente</h6>
            <?php foreach ($ultimosPacientes as $pacientes) : ?>
              <div class="patient-container">
                <img src="<?php echo $base . '/assets/icons/' . $pacientes['avatar']; ?>" alt="Avatar">
                <h6><?php echo $pacientes['nome']; ?></h6>
              </div>
            <?php endforeach; ?>
          </div>
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