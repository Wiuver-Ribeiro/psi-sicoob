<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
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
        <form action="#">
          <div class="form-group">
            <input type="text" placeholder="Nome">
          </div>
          <div class="form-group">
            <input type="text" placeholder="E-mail">
          </div>
          <div class="form-group">
            <input type="password" placeholder="Senha">
          </div>
          <div class="form-group">
            <input type="password" placeholder="Confirmar senha">
          </div>

            <div class="form-group">
            <button type="button">Registrar</button>
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
</body>

</html>