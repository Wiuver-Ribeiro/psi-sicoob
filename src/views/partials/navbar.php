<!-- NAVBAR -->
<?php

use \src\models\USer;

$usuario = new User();
$info = $usuario->dadosLogado();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/navbar.css' ?>">
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
</head>

<body>

  <nav class="d-flex navbar navbar-expand-lg navbar-light">
    <div class="d-flex container-fluid">
      <div class=" collapse navbar-collapse" id="navbarSupportedContent">
        <div class="col-10"></div>
        <div class="col">
          <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-cog "></i>
            </button>
            <ul class="dropdown-menu text-light" aria-labelledby="dropdownMenu2">
              <div class="row">
                <div class="col-4">
                  <img class="img-fluid rounded-circle" src="<?php echo $base . '/assets/icons/' . $info['avatar']; ?>" alt=""  style="width:45px; height:45px; object-fit:cover">
                </div>
                <div class="col-8"><span class="text-dark"><?php echo $info['nome']; ?></span></div>
              </div>
              <li><a href="<?php echo $base . '/appointments'; ?>" class="dropdown-item">
                  <i style="padding-right:8px" class="fas fa-calendar fa-sm"></i>
                  Agendamentos</a></li>
              <li><a href="<?php echo $base . '/config'; ?>" class="dropdown-item">
                  <i style="padding-right:8px" class="fas fa-cog fa-sm"></i>
                  Configurações</a></li>
              <li><a href="<?php echo $base . '/logout'; ?>" class="dropdown-item">
                  <i style="padding-right:8px" class="fas fa-sign-out-alt fa-sm"></i>
                  Sair</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
</body>

</html>