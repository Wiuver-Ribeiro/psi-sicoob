<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/sidebar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/navbar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/dashboard.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/doctors.css'; ?>">

  <title>PSI | Doctors </title>
</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar'); ?>
  <main>
    <div class="main-container">
      <section class="default">
        <h3 style="text-align:left">Psicólogos</h3>
        <div class="content-psi">
          <div class="content-psi-header">
          <h4 style="font-weight:500">Todos os psicólogos</h4>
          <button>
          <a href="<?php echo $base.'/doctors/create';?>" style="color:blue;"><i class="fas fa-user-plus"></i></a>
          </button>
          </div>
        <div class="grid-doctors">
          <div class="doctor-box">
              <img src="<?php echo $base.'/assets/icons/avatar-lara.jpg'; ?>" alt="" >
              <div class="doctor-info">
                <span>Dra. Lara Kamilly G de Paiva</span>
                <span>Psicologia Geral</span>
              </div>
          </div> <!---doctor-box-->
          <div class="doctor-box">
              <img src="<?php echo $base.'/assets/icons/avatar-fabiano.jpg'; ?>" alt="">
              <div class="doctor-info">
                <span>Dr. Fabiano Porfirio Ribeiro</span>
                <span>Psicanálise</span>
              </div>
          </div> <!---doctor-box-->
          <div class="doctor-box">
              <img src="<?php echo $base.'/assets/icons/avatar-wiuver.jpg'; ?>" alt="">
              <div class="doctor-info">
                <span>Dr. Wiuver Afonso Ribeiro</span>
                <span>Psicologia do Desevolvimento</span>
              </div>
          </div> <!---doctor-box-->
          <div class="doctor-box">
              <img src="<?php echo $base.'/assets/icons/avatar-eduardo.jpeg'; ?>" alt="">
              <div class="doctor-info">
                <span>Dr. Eduardo Nascimento</span>
                <span>Psicologia da Saude</span>
              </div>
          </div> <!---doctor-box-->
        </div> <!---grid-doctors-->
        </div> <!---content-psi--->
      </section>
    </div>
    <!--main-container-->
  </main>



</body>

</html>
<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>