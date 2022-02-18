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
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/config.css'; ?>">

  

  <title>PSI | Administradores </title>
</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar'); ?>
  <main>
    <div class="main-container">
      <section class="default">
        <h3 style="text-align:left">Configuração</h3>
        <div class="content-psi">
          <div class="content-psi-header">
          <h4 style="font-weight:500"><?php echo $usuarioLogado['nome']; ?></h4>
          </div>
        <div class="grid-doctors _create">  
            <!-- <div class="box-doctor"> -->
              <img src="<?php echo $base.'/assets/icons/'.$usuarioLogado['avatar']; ?>" alt="" width="190px" height="190px" style="border-radius:50%">
            <!-- </div> -->
            <form action="#" method="POST">
              <div class="field-input">
                <input type="text" placeholder="Nome" value="<?php echo $usuarioLogado['nome']; ?>">
              </div>
              <div class="field-input">
                <input type="text" placeholder="Email" value="<?php echo $usuarioLogado['email']; ?>">
              </div>
              <div class="field-input">
                <input type="password" placeholder="Senha" value="<?php echo $usuarioLogado['senha']; ?>">
              </div>
              <div class="field-input">
                <button type="submit">Enviar</button>
              </div>
            </form>
        </div> <!---grid-doctors-->
        </div> <!---content-psi--->
      </section>
    </div>
    <!--main-container-->
  </main>



</body>

</html>
<script src="<?php echo $base;?>/assets/js/script.s"></script>
<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>