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
        if (user_id !== "") {
          var dados = {
            user_id: user_id,
          };
          $.post('http://localhost/psi-sicoob/src/views/pages/admin/visualizar.php', dados, function(retorna) {
            $('#view_user').html(retorna);
            $('#encerrar').modal('show');
            actionForm.action = "http://localhost/psi-sicoob/public/users/edit/" + user_id
          });
        }
      })
    })

    //Pesquisa em tempo real
    $(function() {
      $('#pesquisa').keyup(function() {
        var pesquisa = $(this).val();
        if (pesquisa !== "") {
          var dados = {
            palavra: pesquisa,
          }
          $.post('http://localhost/psi-sicoob/src/views/pages/admin/pesquisa_user.php', dados, function(retorna) {
            $('.table2').html(retorna);
          });
        };
      });
    });

    $(document).ready(function() {
      $(document).on('click', '.delete_user', function() {
        const actionForm = document.querySelector('#formDeletar');

        var user_id = $(this).attr("id");
        if (user_id !== "") {
          var dados = {
            user_id: user_id,
          };
          $.post('http://localhost/psi-sicoob/src/views/pages/admin/visualizar.php', dados, function(retorna) {
            $('#view_user').html(retorna);
            $('#confirm-delete').modal('show');
            actionForm.action = "http://localhost/psi-sicoob/public/users/delete/" + user_id
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
    <?php if (isset($_SESSION['sucesso'])) {
      echo $_SESSION['sucesso'];
      $_SESSION['sucesso'] = '';
    } ?>
    <!-- <div class="main-container"> -->
    <div class="container-psi">
      <div class="container-psi-header">
        <h2>Todos os Usuários</h2>
      </div>
      <!--container-psi-header-->
      <div class="box-container-search">
      </div>

      <div class="table-responsive  row">

        <input id="pesquisa" class="form-control mb-3" type="search" placeholder="Busque algum usuário">

        <table class="table table-hover table-striped table-bordered rounded table-dark  justify-content-center align-items-center">
          <thead class="thead-dark">
            <tr>
              <th>Avatar</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Tipo</th>
              <th>Editar</th>
              <th>Excluir</th>

            </tr>
          </thead>

          <tbody class="table2">
            <?php foreach ($usuario as $usuarios) : ?>
              <tr>
                <td>
                  <img class="img-fluid" style="width:50px; height:50px; border-radius:50%; object-fit:cover" src="<?php echo $base . '/assets/icons/' . $usuarios['avatar']; ?>" alt="">
                </td>
                <td><?php echo $usuarios['nome']; ?></td>
                <td><?php echo $usuarios['email']; ?></td>
                <td><?php echo $usuarios['tipo']; ?></td>
                <td><button id="<?php echo $usuarios['idusuario']; ?>" class="btn btn-warning view_data"><i class="fas fa-user-edit text-light"></i></button></td>
                <td><button  data-bs-toggle="modal" data-bs-target="#confirm-delete" id="<?php echo $usuarios['idusuario']; ?>" class="btn btn-danger delete_user"><i class="fas fa-user-slash text-light"></i></button></td>
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
          <button type="submit" class="btn btn-success">Alterar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="" id="formDeletar" method="POST">
        <div class="modal-content">
          <div class="modal-header bg-danger">
            <h5 class="modal-title text-light" id="exampleModalLabel">Excluir Usuário</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h6><strong>Tem Certeza que deseja excluir este usuário ?</strong></h6>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-outline-danger">Deletar</button>
          </div>
        </div>
      </form>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="<?php echo $base . '/assets/js/personalizado.js'; ?>"></script>

  <script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>

</html>