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
      <img style="max-width:100%" src="<?php echo $base . '/assets/pictures/calendar.png'; ?>" alt="">
    </div>
    <div class="col row justify-content-center align-items-center" style="background-color:#fff;">
      <form action="">

        <h1 class="text-center ">Login</h1>

        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">E-mail</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Senha</label>
        </div>

        <button class="btn btn-success ">Login</button>
          <div class="row text-center mt-3">
          <span>Não possui conta ? <a href="" class="text-dark"><strong>Registre-se</strong></a> </span> 
          </div>
      </form>
    </div>

  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>