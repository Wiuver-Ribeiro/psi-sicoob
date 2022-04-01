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
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/sidebar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/navbar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/doctors.css'; ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="<?php echo $base . '/assets/js/script.js'; ?>"></script>

  <title>PSI | Psicólogos </title>
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

            <?php echo ($info['tipo'] == "admin") ? "<button>
              <a href='" . $base . "/doctors/create' style='color:blue;'><i class='fas fa-user-plus'></i></a>
            </button>" : "" ?>
          </div>
          <div class="grid-doctors">
          <!-- onclick="location.href='http://localhost/psi-sicoob/public/doctors/edit/ -->
            <?php foreach ($psicologo as $psicologos) : ?>
              <div class="doctor-box" onclick="location.href='http://localhost/psi-sicoob/public/doctors/edit/<?php echo $psicologos['idpsi']; ?>'">
                <img src="<?php echo $base . '/assets/icons/' . $psicologos['avatar']  ?>" alt="Avatar">
                <div class="doctor-info">
                  <span> <?php echo $psicologos['nome']; ?></span>
                  <span style="color:#888;">CRP: <?php echo $psicologos['crp']; ?></span>
                  <span><?php echo $psicologos['especialidade']; ?></span>
                </div>
              </div>
              <!---doctor-box-->
            <?php endforeach; ?>
            <!--endforeach-->
          </div>
          <!---grid-doctors-->
        </div>
        <!---content-psi--->
      </section>
    </div>
    <!--main-container-->
  </main>



  <script src="<?php echo $base . '/assets/js/personalizado.js'; ?>"></script>

  <script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>
</body>

</html>