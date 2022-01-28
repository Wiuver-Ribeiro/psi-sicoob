<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css'; ?>">
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
      <div class="content-appointment">
        <div class="appointment-info">
        <i class="fas fa-calendar-day fa-6x"></i>
          <div class="appointment-scheduled">
            <span>2</span>
            <span class="text-appointments">Pendentes</span>
          </div> <!--appointment-info-->
        </div> <!--appointment-info-->
        <div class="appointment-info">
        <i class="fas fa-calendar-check fa-6x"></i>
          <div class="appointment-scheduled">
            <span>10</span>
            <span class="text-appointments">Marcados</span>
          </div> <!--appointment-info-->
        </div> <!--appointment-info-->
        <div class="appointment-info">
        <i class="fas fa-clock fa-6x"></i>
          <div class="appointment-scheduled">
            <span>5</span>
            <span class="text-appointments">Terminados</span>
          </div> <!--appointment-info-->
        </div> <!--appointment-info-->
      </div> <!--content-appointment-->

      <div class="table-content">
          <table width="100%">
            <div class="box-search">
              <span>Agendamentos Pendentes</span>
              <input type="text" placeholder="Pesquise...">
            </div>
            <thead>
              <tr>
                <td>Paciente</td>
                <td>Psicologos</td>
                <td>Início</td>
                <td>Término</td>
                <td>Confirmar</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Wiuver Afonso Ribeiro</td>
                <td>Dra Lara Kamilly G de Paiva</td>
                <td>14:30</td>
                <td>15:30</td>
                <td>
                  <button title="Confirmar">
                  <i class="fas fa-check-square fa-2x"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td>Cleiton Antonio Gonçalves</td>
                <td>Dr Vlastemuller O de Paiva</td>
                <td>08:30</td>
                <td>10:30</td>
                <td>
                  <button title="Confirmar">
                  <i class="fas fa-check-square fa-2x"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td>Ana Julia Ribeiro</td>
                <td>Dra Lara Kamilly G de Paiva</td>
                <td>12:00</td>
                <td>13:00</td>
                <td>
                  <button title="Confirmar">
                  <i class="fas fa-check-square fa-2x"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
      </div>

    </div>  <!--main-container-->
  </main>



</body>

</html>
<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>