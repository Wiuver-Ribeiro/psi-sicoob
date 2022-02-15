
<?php
  // echo "<pre>";

  // print_r($agendamento); die();
  // foreach ($agendamento as $agendamentos) {
  //   echo $agendamentos['inicio'];
  // }
?>

<!DOCTYPE html>
<html lang="en">

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
  <?php $render('sidebar'); ?>
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
            <span class="text-appointments">Marcados</span>
          </div>
          <!--appointment-info-->
        </div>
        <!--appointment-info-->
        <div class="appointment-info" title="Terminados">
          <i class="fas fa-clock fa-6x"></i>
          <div class="appointment-scheduled">
            <span></span>
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
            <input type="text" placeholder="Procure um agendamento">
          </div>
          <thead>
            <tr>

              <td>Paciente</td>
              <td>Psicólogo</td>
              <td>Início</td>
              <td>Fim</td>
              <td>Status</td>
              <td>Confirmar</td>
            </tr>
          </thead>
          <tbody>

  <?php foreach ($agendamento as $agendamentos): ?>
            <tr>
              <td><?php echo ($agendamentos['nome'] && $agendamentos['tipo'] = 'paciente') ? $agendamentos['nome'] : '';?></td>
              <td><?php  echo ($agendamentos['nome'] && $agendamentos['tipo'] = 'psi') ? $agendamentos['nome'] : '';?></td>
              <td><?php echo $agendamentos['inicio'];?></td>
              <td><?php echo $agendamentos['fim'];?></td>
              <td><?php echo $agendamentos['status'];?></td>
              <td>
                <button class="confirm" title='Confirmar'>
                  <i class='fas fa-check-square fa-2x'></i>
                </button>
              </td>
            </tr>
<?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!--main-container-->
  </main>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
<script src="<?php echo $base . '/assets/js/script.js'; ?>"></script>

<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>