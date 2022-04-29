<!DOCTYPE html>
<html lang="pt-br">
<?php echo $base; ?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/bootstrap.min.css' ?>">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


  <title>PSI | Paciente</title>

  <script>
    $(function() {
      $('#pesquisa').keyup(function() {
        var pesquisa = $(this).val();
        if (pesquisa !== "") {
          var dados = {
            palavra: pesquisa,
          }
          $.post('http://localhost/psi-sicoob/src/views/pages/admin/pesquisa.php', dados, function(retorna) {
            $('.table2').html(retorna);
          });
        };
      });
    });
  </script>
  <style>
    .container {
      width: calc(100vw - 300px);
      height: 100vh;
      margin-left: 260px;
    }
  </style>
</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar'); ?>

  <?php
  // SESSÕES

  if (isset($_SESSION['email'])) {
    echo $_SESSION['email'];
    unset($_SESSION['email']);
    $_SESSION['email'] = '';
  }
  ?>

  <div class="container pt-5">
    <div class="row">
      <div class="col-11">
        <h2 class="text-light">Todos os Pacientes</h2>
      </div>
      <div class="col">

        <a class="btn btn-primary" href="<?php echo $base . '/patients/create'; ?>" title="Adicionar novo Paciente">
          <i class="fas fa-user-plus"></i>
        </a>
      </div>
    </div>
    <div class="table-responsive  row">

      <input class="form-control mb-3" id="pesquisa" placeholder="Busque algum paciente" autocomplete="off">

      <table class="table table-hover table-striped table-bordered rounded table-dark  justify-content-center align-items-center">
        <thead class="thead-dark">
          <tr>
            <th>Avatar</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Editar</th>
          </tr>
        </thead>

        <tbody class="table2">
          <?php foreach ($todosPacientes as $paciente) : ?>
            <tr>
              <td>
                <img class="img-fluid" style="width:50px; height:50px; border-radius:50%; object-fit:cover" src="<?php echo $base . '/assets/icons/' . $paciente['avatar']; ?>" alt="">
              </td>
              <td><?php echo $paciente['nome']; ?></td>
              <td><?php echo $paciente['email']; ?></td>
              <td><a class="btn btn-warning" href='<?php echo $base . "/patients/edit/" . $paciente['idpaciente']; ?>'><i class="fas fa-pencil-edit text-light"></i></a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- INCLUSÃO DO CODIGO AQUI -->

  </div>
  <!--content-psi-->
  </div>
  <!--main-container -- -->
  </main>
</body>
<script src="<?php echo $base . '/assets/js/personalizado.js'; ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>


</html>