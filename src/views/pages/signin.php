<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css' ?>" />
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/signin.css' ?>" />
  <title>PSI | Login</title>
</head>

<body>
  <main>


    <div class="container">

      <div class="box-image">
        <img src="<?php echo $base . '/assets/pictures/calendar.png'; ?>" alt="" width="400px" height="400px">
      </div>
      <div class="box-form">
         
                       <!-- SESSÕES -->
        <?php 
          if(isset($_SESSION['erro'])) {
            echo $_SESSION['erro'];
            unset($_SESSION['erro']);
          }
          // $_SESSION['erro']
        ?>

        <h1>Login</h1>


        <form method="POST" action="<?php echo $base.'/signin';?>">
          <div class="form-group">
            <input type="email" placeholder="E-mail" name="email" autocomplete="off">
          </div>
          <div class="form-group">
            <input type="password" placeholder="Senha" name="senha" autocomplete="off">
          </div>
          <div class="form-group">
            <button type="submit">Login</button>
          </div>
          <div class="form-group">
            <span>
              Não tem conta?
              <a href="<?php echo $base.'/signup';?>">Registre-se</a>
            </span> 
          </div>
        </form>


      </div>
    </div>
  </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>