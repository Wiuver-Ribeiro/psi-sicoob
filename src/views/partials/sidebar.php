<!-- NAVBAR -->
<?php

use \src\models\USer;

$usuario = new User();
$info = $usuario->dadosLogado();

?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Sidebars · Bootstrap v5.1</title>
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/sidebar_boot.css' ?>">

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/sidebar_boot.css">



  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    main {
      max-width: 250px;
      width: 100%;
      position: fixed;
      left: 0;
      top: 0;
      height: 100vh;
    }
  </style>

  <script src="<?php echo $base . '/assets/js/sidebar_boot.js'; ?>"></script>
</head>

<body>


  <main>
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark row" style="width: 100%; height:100vh;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="<?php echo $base . '/assets/icons/icon_app.png'; ?>" class="img-fluid" style="width:50px; padding-right:10px; object-fit:cover;" alt="Logo">
        <span class="fs-6">Sicoob Centro-sul</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li>
          <a href="<?php echo $base . '/dashboard'; ?>" class='nav-link text-white'>
            <i class='fas fa-home' style='color: #FFCBCD;'></i>
            Dashboard
          </a>
        </li>

        <li>
          <a href="<?php echo $base . '/appointments'; ?>" class="nav-link text-white">
            <i class="fas fa-calendar" style="color:#01A9AC; "></i>
            Agendamentos
          </a>
        </li>
        <?php echo ($info['tipo'] == 'admin' || $info['tipo'] == "paciente") ?
          "<li>
          <a href='" . $base . "/doctors' class='nav-link text-white'>
          <i class='fas fa-user-friends' style='color:#9595DF; '></i>
            Psicólogos
          </a>
        </li>" : "" ?>

        <?php echo ($info['tipo'] == 'admin' || $info['tipo'] == "paciente") ?
          "<li>
          <a href='" . $base . "/patients' class='nav-link text-white'>
          <i class='fas fa-user-alt' style='color:#8DC9E8; '></i>
          
            Pacientes
          </a>
        </li>" : "" ?>

        <?php echo ($info['tipo'] == 'admin' || $info['tipo'] == "paciente") ?
          "<li>
          <a href='" . $base . "/users' class='nav-link text-white'>
          <i class='fas fa-user-friends' style='color:#4863f7; '></i>
          
            Todos os Usuários
          </a>
        </li>" : "" ?>

<?php echo ($info['tipo'] == 'admin' || $info['tipo'] == "paciente") ?
          "<li>
          <a href='" . $base . "/admins' class='nav-link text-white'>
          <i class='fas fa-lock' style='color:#F4C22B;'></i>
          
          
           Administradores
          </a>
        </li>" : "" ?>
        <li>
          <a href="<?php echo $base.'/config';?>" class="nav-link text-white">
            <i class="fas fa-cog" style="color:#4DC6FA; " style="color:#1CA9F5; "></i>
            Configuração
          </a>
        </li>
        <li>
          <a href="<?php echo $base.'/logout';?>" class="nav-link text-white">
            <i class="fas fa-power-off" style="color:#FF6D8F; "></i>
            Logout
          </a>
        </li>
      </ul>
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="<?php echo $base . '/assets/icons/' . $info['avatar']; ?>" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong><?php echo $info['nome']; ?></strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
          <li><a class="dropdown-item" href="<?php echo $base . '/appointments'; ?>">
              <i class="fas fa-calendar fa-sm"></i>
              Agendamentos</a></li>
          <li><a class="dropdown-item" href="<?php echo $base . '/config'; ?>">
              <i class="fas fa-cog fa-sm"></i>
              Configurações</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="<?php echo $base . '/logout'; ?>">
              <i class="fas fa-sign-out-alt fa-sm"></i>
              Logout
            </a></li>
        </ul>
      </div>
    </div>

    <!-- <div class="b-example-divider"></div> -->
  </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="<?php echo $base . '/assets/js/bootstrap.min.js'; ?>"></script>
  <script src="<?php echo $base . '/assets/js/sidebar_boot.js'; ?>"></script>
</body>

</html>