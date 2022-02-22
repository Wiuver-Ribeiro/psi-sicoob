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
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/patient-create.css'; ?>">
  

  <title>PSI | Patients </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar'); ?>
  <main>
    <?php
      if(isset($_SESSION['email'])) {
        echo $_SESSION['email'];
        $_SESSION['email'] = '';
        unset($_SESSION['email']);
      }
    ?>
    <div class="main-container">
      <section class="default">
        <h3 style="text-align:left">Paciente</h3>
        <div class="content-psi">
          <div class="content-psi-header">
          <h4 style="font-weight:500">Novo  Paciente</h4>
          </div>
        <div class="grid-doctors _create">  
            <!-- <div class="box-doctor"> -->
              <img src="<?php echo $base.'/assets/icons/default.png'; ?>" alt="" width="190px" height="190px" style="border-radius:50%">
            <!-- </div> -->
            <form action="<?php echo $base.'/patients/create';?>" method="POST">
              <div class="field-input">
                <input type="file" name="avatar" accept="image/png image/jpg image/jpeg" >
              </div>
              <div class="field-input">
                <input type="text" placeholder="Nome" autocomplete="off" name="nome">
              </div>
              <div class="field-input">
                <input type="email" placeholder="E-mail" autocomplete="off" name="email">
              </div>
              <div class="field-input">
                <input type="password" placeholder="Senha" autocomplete="off" name="senha">
              </div>
              <div class="field-input">
                <input type="text"  onkeypress="$(this).mask('(00) 0 0000-0000')" id="telefone" placeholder="(**) * ****-****" autocomplete="off" name="telefone">
              </div>
              <div class="field-input">
                <button type="submit">Cadastrar</button>
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
<script src="<?php echo $base;?>/assets/js/script.js"></script>
<script src="<?php echo $base . '/assets/js/personalizado.js'; ?>"></script>

<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>   
<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>