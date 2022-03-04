<?php

use \src\models\USer;

$usuario = new User();
$info = $usuario->logado();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8' />
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>PSI | Agendamentos</title>
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/sidebar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/navbar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/dashboard.css'; ?>">
  <link href="<?php echo $base . '/assets/css/lib/main.css'; ?>" rel='stylesheet' />
  <link href="<?php echo $base . '/assets/css/lib/appointments.min.css'; ?>" rel='stylesheet' />

  <script src="<?php echo $base . '/assets/css/lib/main.js'; ?>"></script>
  <script src="<?php echo $base . '/assets/css/lib/pt-br.js'; ?>"></script>
  <script src="<?php echo $base . '/assets/css/lib/locales-all.min.js'; ?>"></script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/combine/npm/fullcalendar@5.10.1/locales-all.min.js,npm/fullcalendar@5.10.2/main.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {

        locale: 'pt-br',
        initialView: 'dayGridMonth',
        editable: true,
        selectable: true,
        dayMaxEvents: true,
        buttonText: {
          prev: 'Anterior',
          next: 'Próximo',
          today: 'Hoje',
          month: 'Mês',
          week: 'Semana',
          day: 'Dia',
          list: 'Lista',
        },

        //Buscando dados do banco de dados
        events: {
          url: 'http://localhost/psi-sicoob/src/views/pages/admin/eventos.php',
          method: 'POST',
        },

        select: function(start) {
          $('#cadastrar').modal('show');
          $('#marcar_consulta #inicio').val(start);
        },

        eventClick: function(info) {
          info.jsEvent.preventDefault();
          $('#visualizar #idagenda').text(info.event.id);
          $('#visualizar #paciente').text(info.event.paciente);
          $('#visualizar #psicologo').text(info.event.psicologo);
          $('#visualizar #title').text(info.event.title);
          $('#visualizar #start').text(info.event.start.toLocaleString());
          $('#visualizar #end').text(info.event.end.toLocaleString());
          $('#visualizar #status').text(info.event.status);
          $('#visualizar #description').text(info.event.description);
          $('#visualizar').modal('show');
        },



      });

      calendar.render();
      calendar.updateSize()
    });
  </script>

</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar');
  ?>
  <!-- SESSÕES -->

  <div id='calendar'></div>

  <!-- Modal Visualizar -->
  <div class="modal fade" id="visualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detalhes da Consulta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <dl class="row">

            <dt class="col-sm-3">ID Consulta</dt>
            <dd class="col-sm-9" id="idagenda"></dd>
            <dt class="col-sm-3">Paciente</dt>
            <dd class="col-sm-9" id="paciente"></dd>
            <dt class="col-sm-3">Psicólogo</dt>
            <dd class="col-sm-9" id="psicologo"></dd>
            <dt class="col-sm-3">Consulta:</dt>
            <dd class="col-sm-9" id="title"></dd>
            <dt class="col-sm-3">Início da Consulta:</dt>
            <dd class="col-sm-9" id="start"></dd>
            <dt class="col-sm-3">Fim da Consulta:</dt>
            <dd class="col-sm-9" id="end"></dd>
            <dt class="col-sm-3">Status da Consulta:</dt>
            <dd class="col-sm-9" id="status"></dd>
            <dt class="col-sm-3">Descrição:</dt>
            <dd class="col-sm-8" id="description">
              <textarea readonly class="form-control" name="descricao" cols="30" rows="10">
              </textarea>
            </dd>
          </dl>
          <div class=" d-flex column justify-content-between">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="close-modal">Fechar</button>
            <button class="btn btn-success">Salvar Alterações</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--VISUALIZAR-->


  <!-- Modal Cadastrar -->
  <div class="modal fade bd-example-modal-lg" id="cadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="text-align:center;" id="exampleModalLabel">Psicólogos Disponíveis</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="#">
            <div class="grid-doctors mb10">
              <?php foreach ($psi as $psicologo) : ?>
                <div class="doctor-box" id="doctor-btn" onclick="$('#agendar').modal('show', $('#cadastrar').modal('hide'))">
                  <input type="hidden" value="<?php echo $psicologo['idusuario']; ?>">
                  <img src="<?php echo $base . '/assets/icons/' . $psicologo['avatar'] ?>" alt="Avatar do Psicólogo">
                  <div class="doctor-info">
                    <span><?php echo $psicologo['nome']; ?></span>
                    <span style="color:#888;"><?php echo $psicologo['crp']; ?></span>
                    <span><?php echo $psicologo['especialidade']; ?></span>
                  </div>
                </div> <!-- doctor-box-->
              <?php endforeach; ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- MODAL DE  USUÁRIOS-->
  <div class="modal fade" id="agendar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pacientes Disponíveis</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Avatar</th>
                <th scope="col">Nome</th>
                <th colspan="2" scope="col">Agendar</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($paciente as $pacientes) : ?>
                <tr>
                  <th scope="row">
                    <img style="width:50px; height:50px; border-radius:50%; object-fit:cover;" class="avatar-img" src="<?php echo $base . '/assets/icons/' . $pacientes['avatar'] ?>" alt="Avatar do Paciente">
                  </th>
                  <td colspan="2" style="line-height:45px;"><?php echo $pacientes['nome'] ?></td>
                  <td><button onclick="$('#marcar_consulta').modal('show', $('#agendar').modal('hide'))" class="btn btn-success"><i class="fas fa-check"></i></button></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <div class=" d-flex column justify-content-between">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="close-modal">Fechar</button>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!--MODAL DE USUÁRIOS-->

  <!-- MODAL PARA MARCAR AS CONSULTAS -->
  <div class="modal" id="marcar_consulta" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detalhamento da Consulta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb20">
            <label for="first-name">Paciente</label>
            <input class="form-control" type="text" value="Wiuver Afonso Ribeiro">
          </div>
          <div class="form-group mb20">
            <label for="first-name">Psicólogo</label>
            <input class="form-control" type="text" value="Dra Lara Kamilly Garcia de Paiva | Clinica Geral">
          </div>
          

          <div class="form-group mb20">
            <label for="first-name">Início:</label>
            <input class="form-control" type="datetime-local" id="inicio">
          </div>
          <div class="form-group mb20">
            <label for="first-name">Fim:</label>
            <input class="form-control" type="datetime-local" id="fim"> 
          </div>

          <div class="form-group mb20">
            <label for="first-name">Detalhes:</label>
            <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="5"></textarea>
          </div>
          



          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-success">Agendar Consulta</button>
        </div>
      </div>
    </div>
  </div>



  <script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>

</body>

</html>