<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/sidebar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/navbar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/patients.css'; ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


  <title>PSI | Usuários</title>
  <script>
    $(document).ready(function() {
      $(document).on('click', '.view_data', function() {
        const actionForm = document.querySelector('#formEncerrar');

        var user_id = $(this).attr("id");



        actionForm.action = "http://localhost/psi-sicoob/public/users/" + user_id


        if (user_id !== "") {
          var dados = {
            user_id: user_id,
          };
          $.post('http://localhost/psi-sicoob/src/views/pages/admin/visualizar.php', dados, function(retorna) {
            $('#view_user').html(retorna);
            $('#encerrar').modal('show');

          });
        }
      })
    })
  </script>
</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar');

  ?>
  <main class="main-container">
    <!-- <div class="main-container"> -->
    <div class="container-psi">
      <div class="container-psi-header">
        <h2>Todos os Usuários</h2>
      </div>
      <!--container-psi-header-->
      <div class="box-container-search">
      </div>

      <div class="table-responsive  row">

        <input class="form-control mb-3" type="search" placeholder="Busque algum usuário">

        <table class="table table-hover table-striped table-bordered rounded table-dark  justify-content-center align-items-center">
          <thead class="thead-dark">
            <tr>
              <th>Avatar</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Editar</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($usuario as $usuarios) : ?>
              <tr>
                <td>
                  <img class="img-fluid" style="width:50px; height:50px; border-radius:50%; object-fit:cover" src="<?php echo $base . '/assets/icons/' . $usuarios['avatar']; ?>" alt="">
                </td>
                <td><?php echo $usuarios['nome']; ?></td>
                <td><?php echo $usuarios['email']; ?></td>
                <td><button id="<?php echo $usuarios['idusuario']; ?>" class="btn btn-warning view_data"><i class="fas fa-user-edit text-light"></i></button></td>
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


  <div class="modal fade" id="encerrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar usuário:</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-2" id="#change_detail">
          <form id="formEncerrar" method="POST">
            <div class="column">
              <span id="view_user"></span>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
          <button  type="submit" class="btn btn-success">Alterar</button>
        </div>
        </form>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="<?php echo $base . '/assets/js/personalizado.js'; ?>"></script>

  <script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>

</html>