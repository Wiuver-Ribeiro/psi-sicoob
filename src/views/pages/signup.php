<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css' ?>" />
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/signup.css' ?>" />
  <title>PSI | Registrar</title>
</head>

<body>
  <main>
    <div class="container">

      <div class="box-image">
        <img src="<?php echo $base . '/assets/pictures/doctors3.png'; ?>" alt="" width="400px" height="400px">
      </div>
      <div class="box-form">
        <h1>Registrar</h1>
        <!-- SESSÕES -->
        <form method="POST" action="<?php echo $base.'/signup';?>">
          <div class="form-group">
            <input type="text" name="name" placeholder="Nome" autocomplete="off">
          </div>
          <div class="form-group">
            <input type="text" name="email" placeholder="E-mail" autocomplete="off">
          </div>
          <div class="form-group">
            <input type="password" name="password" placeholder="Senha" autocomplete="off">
          </div>
          <div class="form-group">
            <input type="password" name="confirm_password" placeholder="Confirmar senha" autocomplete="off">
          </div>

            <div class="form-group">
            <button type="submit">Registrar</button>
          </div>
          <div class="form-group">
            <span>
              já tem uma conta? Faça
              <a href="<?php echo $base.'/signin';?>">Login</a>
            </span>
          </div>
        </form>
      </div>
    </div>
  </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>