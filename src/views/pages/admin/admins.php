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
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/admins.css'; ?>">

  <title>PSI | Administradores</title>
</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar'); ?>
  <main>
    <div class="main-container">
      <section class="default">
        <h3 style="text-align:left">Administradores</h3>
        <div class="content-psi">
          <div class="content-psi-header">
            <h4 style="font-weight:500">Todos os Administradores</h4>
            <button>
              <a href="<?php echo $base . '/admins/create'; ?>" style="color:blue;"><i class="fas fa-user-plus"></i></a>
            </button>
          </div>
          <div class="grid-doctors">
            <?php foreach ($administradores as $administrador): ?>
              <div class="doctor-box">
                <img src="<?php echo $base . '/assets/icons/'.$administrador['avatar']; ?>" alt="">
                <div class="doctor-info">
                  <span><?php echo $administrador['nome'];?></span>
                  <span><?php echo $administrador['email']; ?></span>
                </div>
              </div>
              <?php endforeach; ?>
            <!---doctor-box-->
          </div>
          <!---grid-doctors-->
        </div>
        <!---content-psi--->
      </section>
    </div>
    <!--main-container-->
  </main>



</body>

</html>
<script src="<?php echo $base; ?>/assets/js/script.s"></script>
<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>