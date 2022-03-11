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

  <script src="<?php echo $base . '/assets/js/script.js'; ?>"></script>
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
  <!-- <script>

  </script> -->

</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar');
  ?>

  <!-- SESSÕES -->
  <?php
    if(isset($_SESSION['sucesso'])) {
      echo $_SESSION['sucesso'];
      unset($_SESSION['sucesso']);
      $_SESSION['sucesso'] = '';
    }
  ?>

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
            <dd class="col-sm-9 pt-2 pb-2 bg-light bg-gradient" id="pac"></dd>
            <dt class="col-sm-3">Psicólogo</dt>
            <dd class="col-sm-9 pt-2 pb-2 bg-light bg-gradient" id="psi"></dd>
            <dt class="col-sm-3">Consulta:</dt>
            <dd class="col-sm-9" id="title"></dd>
            <dt class="col-sm-3">Início da Consulta:</dt>
            <dd class="col-sm-9" id="start"></dd>
            <dt class="col-sm-3">Fim da Consulta:</dt>
            <dd class="col-sm-9" id="end"></dd>
            <dt class="col-sm-3">Status da Consulta:</dt>
            <!-- <dd class="col-sm-9" id="status"></dd> -->
            <select name="status" id="status">
              <option></option>
            </select>
            <dt class="col-sm-3">Descrição:</dt>
            <dd class="col-sm-8" >
              <textarea readonly class="form-control" id="description" name="descricao" cols="30" rows="10">
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


  <!-- MODAL PARA MARCAR AS CONSULTAS -->
  <div class="modal" id="marcar_consulta" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Marcar Consulta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo $base . '/appointments/register'; ?>" method="POST">
            <div class="form-group" style="margin-bottom:10px">
              <label for="fisrt-name">Assunto:</label>
              <input class="form-control" type="text" name="titulo" autocomplete="off">
            </div>

            <div class="form-group mb20" style="margin-bottom: 10px;">
              <label for="first-name">Paciente:</label>
              <select class="form-control" name="paciente" id="">
                <option selected>Escolha um Paciente:</option>
                <?php foreach ($paciente as $pacientes) : ?>
                  <option value="<?php echo $pacientes['idpaciente']; ?>"><?php echo $pacientes['nome']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group mb20" style="margin-bottom: 10px;">
              <label for="first-name">Psicólogo:</label>

              <select class="form-control" name="psi" id="">
                <option selected>Escolha um Psicólogo:</option>
                <?php foreach ($psi as $psicologo) : ?>
                  <option value="<?php echo $psicologo['idpsi']; ?>"><?php echo "{$psicologo['nome']} | <b>{$psicologo['especialidade']}</b>"; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group mb20" style="margin-bottom: 10px;">
              <div class="row">
                <div class="col">
                  <label for="first-name">Início da consulta:</label>
                  <input class="form-control col3" type="text" id="inicio" name="inicio" onkeypress="DataHora(event,this)">
                </div>

                <div class="col">
                  <label for="first-name">Fim da consulta:</label>
                  <input class="form-control col3" type="text" id="fim" name="final" onkeypress="DataHora(event,this)">
                </div>

              </div>
            </div>

            <div class="form-group mb20">
              <label for="first-name">Detalhamento da consulta:</label>
              <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="5"></textarea>
            </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="submi" class="btn btn-success">Agendar Consulta</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>

</body>

</html>