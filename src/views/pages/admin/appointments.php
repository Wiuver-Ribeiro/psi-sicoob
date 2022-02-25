<?php

use \src\models\USer;
// use \src\models\Appointment;


$usuario = new User();
// $agendamento = new Appointment();
$info = $usuario->logado();


require __DIR__ . '../../../../../connnect.php';



$sql = $pdo->prepare("SELECT idagendamentos, id_paciente, id_psi, inicio, fim FROM agendamentos");
$sql->execute();


$eventos = array();


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8' />
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />

  <title>PSI | Agendamentos</title>
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/sidebar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/navbar.css'; ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/dashboard.css'; ?>">
  <link href="<?php echo $base . '/assets/css/lib/main.css'; ?>" rel='stylesheet' />
  <link href="<?php echo $base . '/assets/css/lib/appointments.min.css'; ?>" rel='stylesheet' />

  <script src="<?php echo $base . '/assets/css/lib/main.js'; ?>"></script>
  <script src="<?php echo $base . '/assets/css/lib/locales-all.min.js'; ?>"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar');

  ?>
  <!-- SESSÕES -->

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        editable: true,
        selectable: true,
        businessHours: true,
        dayMaxEvents: true,

        //   events: [
        //   {
        //     id: 1,
        //     title: 'Boleto ',
        //     start: '2022-02-20 09:00',
        //     end: '2022-02-10 12:00'
        //   },
        //  ],


        //  Busca dos agendamentos do banco de dados
        // events: '../../../src/eventos.php',
        events: [
          <?php
              while ($row_events  = $sql->fetchAll(\PDO::FETCH_ASSOC)) 
              { ?>
                {
                  id: <?php echo $row_events['idagendamentos'];?>,
                  paciente: <?php echo $row_events['id_paciente'];?>,
                  psi: <?php echo $row_events['id_psi'];?>,
                  inicio: <?php echo $row_events['inicio'];?>,
                  fim: <?php echo $row_events['fim'];?>,
              
                },
                <?php } ?> 
        

        ],

        extraParams: function() {
          return {
            cachebuster: new Date().valueOf()
          };

        },

        eventClick: function(info) {
          info.jsEvent.preventDefault();
          $('#visualizar #id').text(info.event.id);
          $('#visualizar #paciente').text(info.event.paciente);
          $('#visualizar #psi').text(info.event.psi);
          $('#visualizar #inicio').text(info.event.inicio.toLocaleString());
          $('#visualizar #fim').text(info.event.fim.toLocaleString());
          $('#visualizar').modal('show');
        },

        select: function(info) {
          $('#cadastrar #title').val(info.title);
          $('#cadastrar #start').val(info.start.toLocaleString());
          $('#cadastrar #end').val(info.end.toLocaleString());
          $('#cadastrar').modal('show');


        }
      }, );
      calendar.render();
    });
  </script>






  <div id='calendar' data-route-load-events="<?php echo "{{route('loadAppointments')}}";
                                              ?>"></div>
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
            <dt class="col-sm-3">ID da Consulta:</dt>
            <dd class="col-sm-9" id="id"></dd>
            <dt class="col-sm-3">Nome do Paciente:</dt>
            <dd class="col-sm-9" id="paciente"></dd>
            <dt class="col-sm-3">Nome do Doutor:</dt>
            <dd class="col-sm-9" id="psi"></dd>
            <dt class="col-sm-3">Início da Consulta:</dt>
            <dd class="col-sm-9" id="inicio"></dd>
            <dt class="col-sm-3">Fim da Consulta:</dt>
            <dd class="col-sm-9" id="fim"></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>
  <!--VISUALIZAR-->


  <!-- Modal Cadastrar -->
  <div class="modal fade" id="cadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agendar Consulta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="#">
            <div class="row mb-3">
              <label for="title" class="col-sm-2 col-form-label">Nome do Doutor:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title">
              </div>
            </div>
            <div class="row mb-3">
              <label for="start" class="col-sm-2 col-form-label">Início da Consulta:</label>
              <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="start" name="start" onkeypress="DataHora(event, this)">
              </div>
            </div>
            <div class="row mb-3">
              <label for="end" class="col-sm-2 col-form-label">Fim do Consulta:</label>
              <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="end" name="end" onkeypress="DataHora(event, this)">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-success">Agendar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--VISUALIZAR-->


  <script src="<?php echo $base . '/assets/js/personalizado.js'; ?>"></script>

  <script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>

</body>

</html>