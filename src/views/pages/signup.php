<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css' ?>" />
  <title>PSI | Login</title>
</head>
<style>
  body {
    display: grid;
    justify-content: center;
    align-items: center;
    height: 100vh !important;
  }

  .container {
    width: 100% !important;
    max-width: 800px;
    padding: 0 !important;
    margin: 0 auto;
  }

  .background-img {
    background: linear-gradient(-135deg, #1de9b6 0%, #1dc4e9 100%) !important;
  }
</style>

<body>
  <div class="container border rounded row  ">
    <div class="col background-img">
      <img style="max-width:100%" src="<?php echo $base . '/assets/pictures/doctors3.png'; ?>" alt="">
    </div>
    <div class="col row justify-content-center align-items-center" style="background-color:#fff;">
      <form method="POST" action="<?php echo $base . '/signup'; ?>">

        <h1 class="text-center h2 mt-3">Registre-se</h1>

        <?php
        if (isset($_SESSION['erro'])) {
          echo $_SESSION['erro'];
          unset($_SESSION['erro']);
        }
        if (isset($_SESSION['restrita'])) {
          echo $_SESSION['restrita'];
          $_SESSION['restrita'] = '';
          unset($_SESSION['restrita']);
        }
        ?>


        <div class="form-floating mb-3">
          <input style="height:50px;" type="file" class="form-control form-control-sm" id="floatingInput" name="avatar" autocomplete="off" placeholder="name@example.com">
          <label for="floatingInput">Avatar</label>
        </div>
        <div class="form-floating  mb-3">
          <input style="height:50px;" type="text" class="form-control form-control-sm" id="floatingInput" name="nome" autocomplete="off" placeholder="name@example.com">
          <label for="floatingInput">Nome Completo</label>
        </div>
        <div class="form-floating mb-3">
          <input style="height:50px;" type="email" class="form-control form-control-sm" id="floatingInput" name="email" autocomplete="off" placeholder="name@example.com">
          <label for="floatingInput">E-mail</label>
        </div>
        <div class="form-floating mb-3">
          <input style="height:50px;" type="password" class="form-control form-control-sm" id="floatingInput" name="senha" autocomplete="off" placeholder="name@example.com">
          <label for="floatingInput">Senha</label>
        </div>

        <button type="submit" class="btn btn-success form-control ">Registrar</button>
        <div class="row text-center mt-3 mb-3">
          <span>Já tem uma conta? Faça <a href="<?php echo $base . '/signin'; ?>" class="text-dark"><strong>Login</strong></a> </span>
        </div>
      </form>
    </div>

  </div>
</body>

</html>