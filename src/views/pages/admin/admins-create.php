<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/sidebar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/navbar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/admin-create.css'; ?>">

  <title>PSI | Administradores </title>
  <style>
    .container {
      width: calc(100% - 270px);
      margin-left: 270px;
      overflow: hidden;
    }
    label {
      color: #fff;
    }
    /* 
    Cores:
    INPUT: #202024
    
    */
    input {
      background-color: #202024 !important;
      border: none !important;
      color: #fff !important;
    }
  </style>
</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar'); ?>
  <!-- SESSÕES -->

  <main>
    <?php
    if (isset($_SESSION['email'])) {
      echo $_SESSION['email'];
      $_SESSION['email'] = '';
      unset($_SESSION['email']);
    }
    ?>
    <main class="container p-5 bg-dark">
      <h2 class="text-light mb-4">Administradores</h2>
      <div class="container-fluid rounded p-4" style="background: #151419">
        <h3 class="text-light">Novo Administrador</h3>
        <hr class="text-light">

        <div class="column">
          <div class="col d-flex justify-content-center align-items-center">
            <img class="img-fluid bg-primary rounded-circle border border-secondary" src="<?php echo $base . '/assets/icons/default.png'; ?>" alt="Avatar default" style="width:15%">
          </div>
          <form  action="<?php echo $base.'/admins/create';?>" method="POST">
          <div class="row mb-3">
            <label for="avatar">Selecione um Avatar:</label>
            <input type="file" class="form-control " id="avatar" name="avatar" placeholder="">
          </div>
          <div class="row mb-3">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control " id="nome" name="avatar" placeholder="Nome Completo">
          </div>
          <div class="row mb-3">
            <label for="nome">E-mail:</label>
            <input type="email" class="form-control " id="email" name="avatar" placeholder="E-mail">
          </div>
          <div class="row mb-3">
            <label for="nome">Senha:</label>
            <input type="password" class="form-control " id="email" name="avatar" placeholder="Senha">
          </div>
          <div class="row">
            <button class="btn btn-success">Cadastrar</button>
          </div>
          </form>
        </div>

        <!--div-column-->
      </div>
    </main>
    <script src="<?php echo $base; ?>/assets/js/script.s"></script>
    <script src="<?php echo $base . '/assets/js/personalizado.js'; ?>"></script>

    <script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>