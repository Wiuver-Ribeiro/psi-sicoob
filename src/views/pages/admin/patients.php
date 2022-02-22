<!DOCTYPE html>
<html lang="pt-br">
<?php
  // print_r($todosPacientes); die();
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/sidebar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/navbar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/patients.css'; ?>">

  <title>PSI | Paciente</title>
</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar'); ?>
  <main class="main-container">
    <!-- <div class="main-container"> -->
      <div class="container-psi">
        <div class="container-psi-header">
          <h2>Todos os Pacientes</h2>
          <a href="<?php echo $base.'/patients/create';?>" title="Adicionar novo Paciente">
          <i class="fas fa-user-plus"></i>
          </a>
        </div> <!--container-psi-header-->
        <div class="box-container-search">
          <input type="search" placeholder="Busque algum paciente">
        </div>
          <div class="table-content">
            <table width="100%">
              <thead>
                <tr>
                  <td>Avatar</td>
                  <td>Nome</td>
                  <td>E-mail</td>
                  <td>Editar</td>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($todosPacientes as $paciente): ?>
                <tr>
                  <td>
                    <img src="<?php echo $base.'/assets/icons/'.$paciente['avatar'];?>" alt="">
                  </td>
                  <td><?php echo $paciente['nome']; ?></td>
                  <td><?php echo $paciente['email']; ?></td>
                  <td><a href='<?php echo $base."/patients/edit/".$paciente['idusuario'];?>'><i class="fas fa-user-edit"></i></a></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
      </div> <!--content-psi-->
    </div> <!--main-container -- -->
  </main>
  <script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>

</html>