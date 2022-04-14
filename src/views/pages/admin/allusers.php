<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/sidebar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/navbar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/patients.css'; ?>">

  <title>PSI | Paciente</title>
</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar'); ?>

  <?php
  // SESSÕES

  if (isset($_SESSION['email'])) {
    echo $_SESSION['email'];
    unset($_SESSION['email']);
    $_SESSION['email'] = '';
  }
  ?>

  <main class="main-container">
    <!-- <div class="main-container"> -->
    <div class="container-psi">
      <div class="container-psi-header">
        <h2>Todos os Pacientes</h2>
        <a href="<?php echo $base . '/patients/create'; ?>" title="Adicionar novo Paciente">
          <i class="fas fa-user-plus"></i>
        </a>
      </div>
      <!--container-psi-header-->
      <div class="box-container-search">
        </div>
        
        <div class="table-responsive  row">

        <input class="form-control mb-3" type="search" placeholder="Busque algum paciente">

        <table class="table table-hover table-striped table-bordered rounded table-dark  justify-content-center align-items-center">
          <thead class="thead-dark">
            <tr>
              <th>Avatar</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Editar</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($todosPacientes as $paciente) : ?>
              <tr>
                <td>
                  <img class="img-fluid" style="width:50px; height:50px; border-radius:50%; object-fit:cover" src="<?php echo $base . '/assets/icons/' . $paciente['avatar']; ?>" alt="">
                </td>
                <td><?php echo $paciente['nome']; ?></td>
                <td><?php echo $paciente['email']; ?></td>
                <td><a class="btn btn-warning" href='<?php echo $base . "/patients/edit/" . $paciente['idpaciente']; ?>'><i class="fas fa-user-edit text-light"></i></a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- INCLUSÃO DO CODIGO AQUI -->

    </div>
    <!--content-psi-->
    </div>
    <!--main-container -- -->
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="<?php echo $base . '/assets/js/personalizado.js'; ?>"></script>

  <script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>

</html>