<?php

use \src\models\Doctor;

$psicologo = new Doctor();
$data = $psicologo->todosPsicologos();
// echo "<pre>";
// print_r($data); die();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/bootstrap.min.css' ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/media.css' ?>">

  <title>PSI- Sicoob Centro-sul</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>

  <nav class="col-sm navbar navbar-expand-lg navbar-light bg-light" style="position:fixed; top:0; left: 0; right: 0">
    <div class="container-fluid">
      <div class="col-lg-5 col-sm" id="home">
        <a class="navbar-brand" href="#">
          <img class="img-fluid" style="width:45px; max-width:100%; object-fit:cover" src="<?php echo $base . '/assets/icons/logo-sicoob.png' ?>" alt="Logo PSI Sicoob Centro-Sul">
          <span id="hidden-logo">PSI-Sicoob Centro-sul</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="col col-sm" id="home">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sobre">Sobre</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#servicos">Serviços</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#psicologo">Psicólogos</a>
            </li>

          </ul>

        </div>
      </div>
      <div class="col-2 col-sm" id="menu_button">
        <a class="btn btn-primary btn-lg" href="<?php echo $base . '/signin'; ?>">Entrar</a>
        <a class="btn btn-outline-secondary" href="<?php echo $base . '/signup'; ?>">Registrar</a>
      </div>
    </div>
  </nav>
  <div class="container" id="home">
    <div class="row mt-5 align-items-center" id="primeira_parte">
      <div class="col" id="centro_primeira">
        <h3>Estamos aqui pra você!</h3>
        <h1>Melhores Psicólogos</h1>
        <p>Aqui na PSI- Sicoob Centro-sul você encontra os melhores. Psicólogos da região, com uma atendimento diferenciado e um agendamento muito fácil</p>
        <a class="btn btn-primary btn-lg" href="<?php echo $base; ?>/signin">Agendar sua consulta</a>
      </div>
      <div class="col" id="segunda_div">
        <img class="img-fluid" style="max-width:100%; object-fit:cover" src="<?php echo $base . '/assets/pictures/doctors1.png'; ?>" alt="Grupo de Psicólogo">
      </div>
    </div>

    <div class="row mt-5 align-items-center" id="sobre" class="sobre_nos">
      <div class="col-lg-6 col-md-6">
        <img class="img-fluid" src="<?php echo $base . '/assets/pictures/calendar.png' ?>" alt="" style="max-width:100%;">

      </div>
      <div class="col col-md-6">
        <h1>Sobre nós</h1>
        <p>Nosso principal objetivo é que nossos pacientes encontrem o psicólogo perfeito e agende uma consulta do modo mais fácil possível. Essa jornada precisa ser agradável, por isso sempre estamos dispostos a ajudar.</p>
        <div class="row mt-5 justify-content-center align-items-center img-icone">
          <div class="col column-sl">
            <img class="img-fluid " style="width:74px;max-width:100%;" src="<?php echo $base . '/assets/icons/banner_1.svg'; ?>" alt="Icone Psicologos"> <br>
            <span class="text-center">Psicologos</span>
          </div>
          <div class="col column-sl">
            <img class="img-fluid " style="width:74px;" src="<?php echo $base . '/assets/icons/banner_2.svg'; ?>" alt="Icone Psicologos"> <br>
            <span class="text-center">Agendamento</span>
          </div>
          <div class="col column-sl">
            <img class="img-fluid " style="width:74px;" src="<?php echo $base . '/assets/icons/banner_3.svg'; ?>" alt="Icone Psicologos"> <br>
            <span class="text-center">Qualificados</span>
          </div>
        </div>
      </div>
    </div>



    <section class="feature_part mb-5" id="servicos">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8">
            <div class="section_tittle text-center">
              <h2 class="mt-3 mb-3">Nossos Serviços</h2>
            </div>
          </div>
        </div>
        <div class="row justify-content-between align-items-center" id="centralizado">
          <div class="col-lg-3  col-sm-12">
            <div class="single_feature">
              <div class="single_feature_part">
                <span class="single_feature_icon">
                  <img style="width:100%;max-width:45px; object-fit:cover;" class="img-fluid" src="<?php echo $base . '/assets/pictures/children.png'; ?>" alt=""></span>
                <h4>Pediatria</h4>
                <p>Nossa missão é oferecer suporte preventivo,
                  para que crianças e adolescentes
                  cresçam saudáveis e felizes.</p>
              </div>
            </div>
            <div class="single_feature">
              <div class="single_feature_part">
                <span class="single_feature_icon">
                  <img style="width:100%;max-width:45px; object-fit:cover;" class="img-fluid" src="<?php echo $base . '/assets/pictures/heart.png'; ?>" alt=""></span>
                <h4>Cardiologia</h4>
                <p>Nossos médicos cardiologistas são altamente qualificados
                  para identificação das doenças de um dos principais
                  orgãos do corpo humano.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="single_feature_img">
              <img class="img-fluid" style="max-width:100%;" src="<?php echo $base . '/assets/pictures/doctors2.png'; ?>" alt="">
            </div>
          </div>
          <div class="col-lg-3 col-sm-12">
            <div class="single_feature">
              <div class="single_feature_part">
                <span class="single_feature_icon">
                  <img style="width:100%;max-width:45px; object-fit:cover;" class="img-fluid" src="<?php echo $base . '/assets/pictures/eye.png'; ?>" alt=""></span>
                <h4>Oftalmologia</h4>
                <p>O cuidado com as doenças que acometem os olhos e a
                  visão são conduzidos pelos nosso médicos oftalmologistas.</p>
              </div>
            </div>
            <div class="single_feature">
              <div class="single_feature_part">
                <span class="single_feature_icon">
                  <img style="width:100%;max-width:45px; object-fit:cover;" class="img-fluid" src="<?php echo $base . '/assets/pictures/bone.png'; ?>" alt=""></span>
                <h4>Ortopedia</h4>
                <p>Nossos ortopedistas cuidaram dos seus ossos, músculos, articulações,
                  ligamentos e outros componentes do seu sistema.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="container-fluid bg-light rounded" id="psicologo">
      <div class="row text-center mb-5">
        <h1 class="text-center mb-5 mt-5">Conheça nosso Time</h1>
        <?php foreach ($data as $psicologos) : ?>
          <div class="col">
            <img style="width:150px; height:150px; object-fit:cover" class="img-fluid rounded" src="<?php echo $base . '/assets/icons/'.$psicologos['avatar']; ?> " alt=""> <br>
            <p class="text-center"><?php echo $psicologos['nome']; ?></p>
          </div>
        <?php endforeach; ?>

      </div>
      <!---->
    </div>
    <!-- feature_part start-->
    <footer class="bg-secondary mt-4 p-3 text-light">
      <div class="row">
        <div class="col-10">
          &copy;2022 | Todos direitos reservados.
        </div>
        <div class="col">
          <a title="Sicoob Centro-Sul" href="https://www.sicoob.com.br/web/sicoobcentrosul" class="text-light">Sicoob Centro-sul</a>
        </div>
      </div>
    </footer>
  </div>
  <!--Container-->
</body>

</html>