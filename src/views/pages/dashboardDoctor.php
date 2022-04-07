<!DOCTYPE html>
<html lang="en">

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
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css'; ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha284-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW2" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/sidebar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/navbar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/dashboardDoctor.css'; ?>">
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
</head>

<body>


  <?php $render('navbar'); ?>
  <?php $render('sidebar');
  ?>
  <main>
    <div class="main-container">
      <!-- SESSÕES -->

      <?php
      if (isset($_SESSION['sucesso'])) {
        echo  $_SESSION['sucesso'];
        $_SESSION['sucesso'] = "";
        unset($_SESSION['sucesso']);
      }

      ?>


      <div class="content-appointment">
        <div class="appointment-info" title="Pendentes">
          <i class="fas fa-calendar-day fa-6x"></i>
          <div class="appointment-scheduled">
            <span><?php echo $pendentes['pendentes']; ?></span>
            <span class="text-appointments">Pendentes</span>
          </div>
          <!--appointment-info-->
        </div>
        <!--appointment-info-->
        <div class="appointment-info" title="Marcados">
          <i class="fas fa-calendar-check fa-6x"></i>
          <div class="appointment-scheduled">
            <span><?php echo $marcados['marcados']; ?></span>
            <span class="text-appointments">Confirmados</span>
          </div>
          <!--appointment-info-->
        </div>
        <!--appointment-info-->
        <div class="appointment-info" title="Terminados">
          <i class="fas fa-clock fa-6x"></i>
          <div class="appointment-scheduled">
            <span><?php echo $cancelados['cancelados']; ?></span>
            <span class="text-appointments">Terminados</span>
          </div>
          <!--appointment-info-->
        </div>
        <!--appointment-info-->
      </div>

      <div class="container">
        <div class="leftside">
          <div class="title">
            <h5>Próximos Atendimentos</h5>
          </div>
          <table width="100%" cellspacing="0">
            <thead>
              <tr>
                <td colspan="2">Paciente</td>
                <td>Data</td>
                <td>Status</td>
                <td>Encerrar</td>
              </tr>
            </thead>
            <tbody>
              <?php


              if (count($consultas) == 0) {
                echo "<span class='consulta-total'>Sem consultas neste momentos</span>";
              } else {
                foreach ($consultas as $consulta) : ?>
                  <tr>

                    <td class="overflow-word ">
                      <img src="<?php echo $base . "/assets/icons/" . $consulta['avatar']; ?>" alt="Avatar">
                      <?php echo $consulta['nome']; ?>
                      <input type="hidden" id="paciente" value="<?php echo $consulta['nome']; ?>">
                    </td>
                    <td><?php echo $consulta['inicio']; ?></td>

                    <?php if ($consulta['status'] == 'pendentes') {

                      echo "<td class='pendente'>
                        <div class='ball' style='text-align: center'></div>
                      </td>";
                    } else if ($consulta['status'] == 'confirmados') {
                      echo "<td class='confirmado'>
                      <div class='ball' style='text-align: center'></div>
                    </td>";
                    }
                    ?>
                    <td class='pendente'>
                      <button id="<?php echo $consulta['idagendamentos']; ?>" class='btn btn-success view_data'>Encerrar</button>
                    </td>
                    <!-- data-bs-toggle='modal' data-bs-target='#encerrar' -->

                  </tr>
              <?php endforeach;
              } ?>


            </tbody>
          </table>
        </div>
        <div class="rightside">
          <div class="title">
            <h5>Últimas Consultas</h5>
          </div>
          <div style="border-left:none;" class="title">
            <h6 style="color: #888">Paciente</h6>
            <?php foreach ($ultimosPacientes as $pacientes) : ?>
              <div class="patient-container">
                <img src="<?php echo $base . '/assets/icons/' . $pacientes['avatar']; ?>" alt="Avatar">
                <h6><?php echo $pacientes['nome']; ?></h6>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
  </main>


  <!-- Button trigger modal -->

  <!-- Modal -->
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