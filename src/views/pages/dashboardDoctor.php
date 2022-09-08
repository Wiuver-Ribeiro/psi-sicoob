<!DOCTYPE html>
<html lang="pt-br">

<?php

use \src\models\USer;
use \src\models\Appointment;

$usuario = new User();
$info = $usuario->dadosLogado();
$agendamento = new Appointment();
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha284-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW2" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/sidebar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/navbar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/alertas.css'; ?>">


  <title>PSI | Dashboard Doutor</title>


  <script>
  
    // Função para setar a URL do formulário
    //Pega o valor do campo paciente da tabela
    //Seta a url do form, passando o id do agendamento a ser finalizado.
    $(document).ready(function() {
      $(document).on('click', '.view_data', function() {
        const actionForm = document.querySelector('#formEncerrar');
        const consultaId = $(this).attr("id");


        actionForm.action = "http://localhost/psi-sicoob/public/appointments/finish/" + consultaId

        var consulta_id = $(this).attr("id");
        if (consulta_id !== "") {
          var dados = {
            consulta_id: consulta_id,
          };
          $.post('http://localhost/psi-sicoob/src/views/pages/visualizar.php', dados, function(retorna) {
            $('#visu_consulta').html(retorna);
            $('#encerrar').modal('show');

          });
        }
      })
    })
  </script>
  <style>
    .container {
      /* height: 100vh; */
      width: calc(100% - 270px);
      margin-left: 270px;
      overflow: hidden;
    }
  </style>
</head>

<body>

  <?php $render('navbar'); ?>
  <?php $render('sidebar');
  ?>

  <div class="container">
    <?php
    if (isset($_SESSION['sucesso'])) {
      echo $_SESSION['sucesso'];
      $_SESSION['sucesso'] = '';
    }
    ?>
    <div class="row justify-content-evenly align-items-center mt-5">

      <div class="col-sm-3 col-md col-lg-3 bg-secondary rounded p-4">
        <div class="row justify-content-between">
          <div class="col">
            <img class="img-fluid" style="max-width: 60%" src="<?php echo $base . '/assets/icons/calendar-day-solid.svg'; ?>" alt="">

          </div>
          <div class="row col text-right">
            <span class="text-light fs-2"><?php echo $pendentes['pendentes']; ?></span>
            <span class="text-light fs-4">Próximos</span>
          </div>
        </div>
      </div>
      <!--coluna 01 -->
      <div class="col-sm-3 col-md col-lg-3 bg-success rounded p-4">
        <div class="row justify-content-between">
          <div class="col">
            <img class="img-fluid " style="max-width: 70%;" src="<?php echo $base . '/assets/icons/calendar-check-solid.svg'; ?>" alt="">
          </div>
          <div class="row col ">
            <span class="text-light fs-2"><?php echo $marcados['marcados']; ?></span>
            <span class="text-light fs-4">Confirmados</span>
          </div>
        </div>
      </div>
      <!--coluna 01 -->
      <div class="col-sm-3 col-md col-lg-3 bg-danger rounded p-4">
        <div class="row justify-content-between">
          <div class="col">
            <img class="img-fluid" style="max-width: 70%" src="<?php echo $base . '/assets/icons/clock-solid.svg'; ?>" alt="">
          </div>
          <div class="row col text-right">
            <span class="text-light fs-2"><?php echo $cancelados['cancelados']; ?></span>
            <span class="text-light fs-4">Terminados</span>
          </div>
        </div>
      </div>
      <!--coluna 01 -->

      <div class="row mt-5 justify-content-evenly ">
        <div class="col-md col-lg-7 bg-dark pt-2 pb-2 rounded">
          <h1 class="h5 text-light">Próximos Atendimentos</h1>
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover bg-light">
              <thead class="rounded thead-dark">
                <th>Paciente</th>
                <th>Data</th>
                <th>Status</th>
                <th>Encerrar</th>
              </thead>
              <tbody class="text-light">
                <?php
                if ($consultas == 0) {
                  echo "<div class='alert alert-success'>SEM CONSULTAS PENDENTES NO MOMENTO.</div>";
                } else {
                  foreach ($consultas as $consulta) :  ?>
                    <tr class="text-dark">
                      <td><img style="width:45px; height:45px; object-fit:cover" src="<?php echo $base . "/assets/icons/" . $consulta['avatar']; ?>" alt="Avatar" class="img-fluid rounded-circle" style="width:50px"></td>
                      <td><?php echo $consulta['nome']; ?></td>
                      <?php
                      if ($consulta['status'] == 'pendente') {
                        echo "<td class='pendente'>
                          <div class='ball' style='text-align: center'></div>
                        </td>";
                      } else if ($consulta['status'] == 'confirmado') {
                        echo "<td class='confirmado'>
                        <div class='ball' style='text-align: center'></div>
                      </td>";
                      }
                      ?>
                      <td>
                        <button id="<?php echo $consulta['idagendamentos']; ?>" class='btn btn-success view_data'>Encerrar</button>

                      </td>
                    </tr>
                <?php endforeach;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md col-lg-3 bg-dark pt-2 pb-2 rounded">
          <h1 class="h5 text-light  p-2">Úlitmas consultas</h1>
          <?php foreach ($ultimosPacientes as $pacientes) : ?>

            <div class="row mb-2">
              <div class="col">
                <img class="img-fluid rounded-circle" style="width:45px; height:45px; object-fit:cover" src="<?php echo $base . '/assets/icons/' . $pacientes['avatar']; ?>" alt="Avatar">
                <span class="text-light text-right"><?php echo $pacientes['nome']; ?></span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div> <!-- div principal-->



    <div class="modal fade" id="encerrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Parecer da consulta:</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-2" id="#change_detail">
            <form id="formEncerrar" method="POST">
              <div class="column">
                <span id="visu_consulta"></span>
                <div class="col mb-2">
                  <label for="descricao">Aparecer do Psicólogo:</label>
                  <textarea type="text" class="form-control" name="parecer" rows="4" cols="50" placeholder="Descreva um parecer sobre a consulta..."></textarea>
                </div>
                <div class="col mb-2">
                  <label for="descricao">Status da Consulta:</label>
                  <select name="status" id="status" class="form-control">
                    <option value="finalizada">Finalizar</option>
                    <option value="remarcar">Remarcar</option>
                  </select>
                </div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
            <button href="<?php echo $base . '/appointments/finish/15'; ?>" type="submit" class="btn btn-success">Encerrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</body>

</html>
<script src="<?php echo $base . '/assets/js/script.js'; ?>"></script>
<script src="<?php echo $base . '/assets/js/personalizado.js'; ?>"></script>


<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>