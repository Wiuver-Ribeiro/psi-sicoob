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
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/doctor-create.css'; ?>">

  <title>PSI | Doctors </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar'); ?>
  <main>

  <!-- SESSÕES -->
    <div class="main-container">
      <section class="default">
        <h3 style="text-align:left">Psicólogos</h3>
        <div class="content-psi">
          <div class="content-psi-header">
          <h4 style="font-weight:500">Editar  Psicólogo</h4>
          </div>
        <div class="grid-doctors _create">  
            <!-- <div class="box-doctor"> -->
              <!-- </div> -->
              <img src="<?php echo $base.'/assets/icons/'.$psicologo['avatar']; ?>"  alt="" width="190px" height="190px" style="border-radius:50%">
              <form action="<?php echo $base.'/doctors/edit/'.$psicologo['idpsi']; ?>" method="POST">
 
             <div class="field-input">
             <input  class="form-control" type="file" name="avatar" >
             </div>
              <div class="field-input">
                <input type="text" placeholder="Nome" autocomplete="off" name="nome" value="<?php echo $psicologo['nome'] ?>">
              </div>
              <div class="field-input">
                <input type="email" placeholder="E-mail" autocomplete="off" name="email" value="<?php echo $psicologo['email'] ?>">
              </div>
              <div class="field-input">
                <input type="text" onkeypress="$(this).mask('00/000.000')" placeholder="CRP: " autocomplete="off" name="crp" value="<?php echo $psicologo['crp'] ?>">
              </div>
              <div class="field-input">
                <input type="text" placeholder="Especialização" autocomplete="off" name="especialidade" value="<?php echo $psicologo['especialidade'] ?>"> 
              </div>
              <div class="field-input action">
                <a class="btn btn-danger" href="<?php echo $base.'/doctos/edit/'.$psicologo['idusuario']; ?>" id="deletar">Excluir psicólogo</a>
                <button id="editar" type="submit">Editar Psicólogo</button>
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
<script src="<?php echo $base . '/assets/js/personalizado.js'; ?>"></script>

<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>   

<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>