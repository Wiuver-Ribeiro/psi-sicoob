<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/bootstrap.min.css' ?>">
  
  <title>PSI | Configuração </title>
  <style>
    .container {
      width: calc(100vw - 300px);
      margin-left: 250px;
    }
  
    input {
      background-color: #202024 !important;
      border: none !important;
      color: #fff !important;
    }
  </style>
</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar'); 
  
  ?>



  <div class="container pt-5 bg-dark">
  <?php if (isset($_SESSION['sucesso'])) {
    echo $_SESSION['sucesso'];
    $_SESSION['sucesso'] = '';
  } ?>
    <h2 class="text-light mb-4">Configuração</h2>
    <div class="container-fluid rounded p-4" style="background: #151419">
      <h3 class="text-light"><?php echo $usuarioLogado['nome']; ?></h3>
      <hr class="text-light">

      <div class="column">
        <div class="col d-flex justify-content-center align-items-center">
          <img style="width:160px; height:160px; object-fit:cover" class="img-fluid bg-primary rounded-circle border border-secondary" src="<?php echo $base . '/assets/icons/' . $usuarioLogado['avatar']; ?>" alt="Avatar default" style="width:15%">
        </div>
        <form action="<?php echo $base . '/users/edit/'.$usuarioLogado['idusuario']; ?>" method="POST">
          <div class="row mb-3">
            <label class="text-light" for="avatar">Selecione um Avatar:</label>
            <input type="file" class="form-control " id="avatar" name="avatar" placeholder="">
          </div>
          <div class="row mb-3">
            <label class="text-light" for="nome">Nome:</label>
            <input type="text" class="form-control " id="nome" name="nome" placeholder="Nome Completo" value="<?php echo $usuarioLogado['nome']; ?>">
          </div>
          <div class="row mb-3">
            <label class="text-light" for="email">E-mail:</label>
            <input type="email" class="form-control " id="email" name="email" placeholder="E-mail" value="<?php echo $usuarioLogado['email']; ?>">
          </div>
          <div class="row mb-3">
            <label class="text-light" for="senha">Senha:</label>
            <input type="password" class="form-control " id="senha" name="senha" placeholder="Senha" value="<?php echo $usuarioLogado['senha']; ?>">
          </div>
          <div class="row">
            <button class="btn btn-success">Atualizar</button>
          </div>
        </form>
      </div>

      <!--div-column-->
    </div>
  </d>
</body>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

<script src="<?php echo $base; ?>/assets/js/script.s"></script>
<script src="<?php echo $base . '/assets/js/personalizado.js'; ?>"></script>

<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>

</html>