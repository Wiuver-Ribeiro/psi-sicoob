<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSI | Doctors </title>
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/bootstrap.min.css' ?>">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
  <style>
    .container {
      width: calc(100% - 270px);
      margin-left: 270px;
 
    }

    label {
      color: #fff;
    }

    /* 
    Cores:
    INPUT: #202024
    
    */
    input {
      background-color: #202024 !important;
      border: none !important;
      color: #fff !important;
    }
  </style>
  </head>

  <body>
    <?php $render('navbar'); ?>
    <?php $render('sidebar'); ?>


    <!-- SESSÕES -->

    <div class="container p-5 bg-dark">

      <h2 class="text-light mb-4">Psicólogo</h2>
      <div class="container-fluid rounded p-4" style="background: #151419">
        <h3 class="text-light">Editar Psicólogo:</h3>
        <hr class="text-light">

        <div class="column">
          <div class="col d-flex justify-content-center align-items-center">
            <img  style="width:80px; height:80px; object-fit:cover;" class="img-fluid bg-primary rounded-circle border border-secondary" src="<?php echo $base . '/assets/icons/' . $psicologo['avatar']; ?>" alt="Avatar default" >
          </div>
          <form action="<?php echo $base . '/doctors/edit/' . $psicologo['idpsi']; ?>" method="POST">
            <div class="row mb-3">
              <label for="avatar">Selecione um Avatar:</label>
              <input type="file" class="form-control " id="avatar" name="avatar" placeholder="">
            </div>
            <div class="row mb-3">
              <label for="nome">Nome:</label>
              <input type="text" class="form-control " id="nome" name="nome" placeholder="Nome Completo" autocomplete="off" value="<?php echo $psicologo['nome'] ?>">
            </div>
            <div class="row mb-3">
              <label for="email">E-mail:</label>
              <input type="email" class="form-control " id="email" name="email" placeholder="E-mail" autocomplete="off" value="<?php echo $psicologo['email'] ?>">
            </div>
            <div class="row mb-3">
              <label for="celulara">CRP:</label>
              <input type="text" class="form-control " id="celular" onkeypress="$(this).mask('00/000.000')" name="crp" placeholder="CRP:" autocomplete="off" value="<?php echo $psicologo['crp'] ?>">
            </div>
            <div class="row mb-3">
              <label for="celulara">Especialização:</label>
              <input class="form-control" type="text" placeholder="Especialização" autocomplete="off" name="especialidade" value="<?php echo $psicologo['especialidade'] ?>">

            </div>
            <div class="column">
              <a class="btn btn-danger" href="<?php echo $base . '/doctor/delete/' . $psicologo['idusuario']; ?>">Excluir</a>
              <button class="btn btn-success">Atualizar</button>
            </div>
          </form>
        </div>
      </div>
    </div>


  </body>

</html>
<script src="<?php echo $base; ?>/assets/js/script.s"></script>
<script src="<?php echo $base . '/assets/js/personalizado.js'; ?>"></script>

<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>