<!DOCTYPE html>
<html lang="pt-br">

<?php

use \src\models\USer;
use \src\models\Appointment;
$date = new \DateTime();
// print_r($date->format('Y-m-d'));
// die();
$usuario = new User();
$info = $usuario->dadosLogado();
$agendamento = new Appointment();
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css'; ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha284-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW2" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/sidebar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/navbar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/alertas.css'; ?>">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
    }
  </style>
</head>

<body>

  <?php $render('navbar'); ?>
  <?php $render('sidebar');

  // print_r($ultimosPsicologos);
  // die();
  ?>

  <div class="container">
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
                <th>Psicólogo</th>
                <th>Data</th>
                <th>Status</th>
                <th>Cancelar</th>
              </thead>
              <tbody class="text-dark">
                <?php foreach ($ultimosPsicologos as $psicologo) : 
                  print_r($psicologo);?>
                  
                  <tr>
                    <td><?php echo $psicologo['nome']; ?></td>
                    <td><?php echo $psicologo['inicio']; ?></td>
                    <td><?php echo $psicologo['status']; ?></td>
                  </tr>
                <?php endforeach; ?> 
            </table>
          </div>
        </div>
        <div class="col-md col-lg-3 bg-dark pt-2 pb-2 rounded">
          <h1 class="h5 text-light  p-2">Úlitmas consultas</h1>
          <?php foreach ($ultimosPsicologos as $psicologo) : ?>

            <div class="row mb-2">
              <h6 class="text-light">Psicólogo</h6>
              <div class="col">
                <img class="img-fluid rounded-circle" style="width:45px; height:45px; object-fit:cover" src="<?php echo $base . '/assets/icons/' . $psicologo['avatar']; ?>" alt="Avatar">
                <span class="text-light text-right"><?php echo $psicologo['nome']; ?></span>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha284-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>