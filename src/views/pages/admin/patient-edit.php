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
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/admin-create.css'; ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>PSI | Paciente </title>
</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar'); ?>
  <!-- SESSÕES -->

  <main>
  <?php 
    // if (isset($_SESSION['email'])) { 
    //     echo $_SESSION['email'];
    //     $_SESSION['email'] = '';
    //     unset($_SESSION['email']);
    // }

  ?>
    <div class="main-container">
      <section class="default">
        <h3 style="text-align:left">Paciente</h3>
        <div class="content-psi">
          <div class="content-psi-header">
          <h4 style="font-weight:500">Editar Paciente</h4>
          </div>
        <div class="grid-doctors _create">  
            <!-- <div class="box-doctor"> -->
              <img src="<?php echo $base.'/assets/icons/'.$paciente['avatar'];?>" alt="" width="190px" height="190px" style="border-radius:50%">
            <!-- </div> -->
            <form action="<?php echo $base.'/patients/edit/'.$paciente['idusuario'];?>" method="POST">
              <div class="field-input">
                <label for="#avatar" style="color:#ccc;">Selecione um Avatar</label>
                <input type="file" id="avatar"  name="avatar" accept="image/png, image/jpeg, image/jpg"   multiple>
              </div>
              <div class="field-input">
                <input type="text" name="nome" placeholder="Nome"  value="<?php echo $paciente['nome'];?>" autocomplete="off">
              </div>
              <div class="field-input">
                <input type="email" name="email" placeholder="E-mail"  value="<?php echo $paciente['email'];?>" autocomplete="off">
              </div>
              <div class="field-input _action">
                <a href="<?php echo $base;?>" id="deletar">Excluir Paciente</a>
                <button type="submit" id="editar" >Editar Paciente</button>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>