<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link href='<?php echo $base . '/assets/fullcalendar/packages/core/main.css'; ?>' rel='stylesheet' />
  <link href='<?php echo $base . '/assets/fullcalendar/packages/daygrid/main.css'; ?>' rel='stylesheet' />

  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/sidebar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/navbar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/dashboard.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/admins.css'; ?>">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<? echo $base . '/assets/css_bootstrap/bootstrap.min.css'; ?>">

  <!-- Style -->
  <link rel="stylesheet" href="<?php echo $base . '/assets/css_bootstrap/style.css'; ?>">

  <title>PSI | Appointments</title>
</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar'); ?>

  <div class="content">
    <div id='calendar'></div>
  </div>



  <script src="<?php echo $base . '/assets/js/jquery-3.3.1.min.js'; ?>"></script>
  <script src="<?php echo $base . '/assets/js/popper.min.js' ?>"></script>
  <script src="<?php echo $base . '/assets/js/bootstrap.min.js' ?>"></script>

  <script src="<?php echo $base . '/assets/fullcalendar/packages/core/main.js'; ?>"> </script>
  <script src="<?php echo $base . '/assets/fullcalendar/packages/core/locales/pt-br.js'; ?>"> </script>
  <script src="<?php echo $base . '/asssets/fullcalendar/packages/interaction/main.js'; ?>"> </script>
  <script src="<?php echo $base . '/assets/fullcalendar/packages/daygrid/main.js'; ?>"> </script>


  <script src="<?php echo $base . '/assets/js/script.js' ?>"></script>
  <script src="<?php echo $base . '/assets/js/main.js' ?>"></script>
<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>

</body>

</html>