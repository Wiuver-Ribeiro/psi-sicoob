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
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/patients.css'; ?>">

  <title>PSI | Patients</title>
</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar'); ?>
  <main>
    <div class="main-container">
      <section class="default">
        <h3 style="text-align:left">Pacientes</h3>
        <div class="content-psi">
          <div class="content-psi-header">
          <h4 style="font-weight:500">Todos os Pacientes</h4>
          <button>
          <i class="fas fa-user-plus"></i>
          </button>
          </div>
        <!-- <div class="grid-doctors"> -->
        <div class="table-content">
          <table width="100%">
            <div class="box-search">
              <span>Pacientes Cadastrados</span>
              <input type="text" placeholder="Pesquise...">
            </div>
            <thead>
              <tr>
                <td>Avatar</td>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Editar</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <img class="avatar" src="<?php echo $base.'/assets/icons/avatar-wiuver.jpg';?>" alt="">
                </td>
                <td>Wiuver Afonso Ribeiro</td>
                <td>wiuver.ribeiro@gmail.com</td>
                <td>
                  <button title="Editar">
                  <a href="#"><i class="fas fa-edit fa-2x"></i></a>

                  </button>
                </td>
              </tr>
              <tr>
                <td>
                <img class="avatar" src="<?php echo $base.'/assets/icons/avatar-lara.jpg';?>" alt="">

                </td>
                <td>Lara Kamilly G de Paiva</td>
                <td>lara.kamy@gmail.com</td>
                <td>
                  <button title="Editar">
                  <a href="#"><i class="fas fa-edit fa-2x"></i></a>
                  </button>
                </td>
              </tr>
              <tr>
                <td>
                <img class="avatar" src="<?php echo $base.'/assets/icons/avatar-fabiano.jpg';?>" alt="">
                  
                </td>
                <td>Fabiano Porfirio Ribeiro</td>
                <td>fabianofpr@gmail.com</td>
                <td>
                  <button title="Editar">
                  <a href="#"><i class="fas fa-edit fa-2x"></i></a>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
      </div>
      </section>
    </div>
    <!--main-container-->
  </main>



</body>

</html>
<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>