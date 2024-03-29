<?php

use \src\models\USer;

$usuario = new User();
$info = $usuario->logado();
$infoData = $usuario->dadosLogado();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8' />
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />

  
  <title>PSI | Agendamentos</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="<?php echo $base . '/assets/js/script.js'; ?>"></script>

  <link href="<?php echo $base . '/assets/css/lib/main.css'; ?>" rel='stylesheet' />
  <link href="<?php echo $base . '/assets/css/lib/appointments.min.css'; ?>" rel='stylesheet' />

  <script src="<?php echo $base . '/assets/css/lib/main.js'; ?>"></script>
  <script src="<?php echo $base . '/assets/css/lib/pt-br.js'; ?>"></script>
  <script src="<?php echo $base . '/assets/css/lib/locales-all.min.js'; ?>"></script>
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/bootstrap.min.css' ?>">


</head>

<body>
  <?php $render('navbar'); ?>
  <?php $render('sidebar');
  ?>

  <!-- SESSÕES -->
  <?php
  if (isset($_SESSION['sucesso'])) {
    echo $_SESSION['sucesso'];
    unset($_SESSION['sucesso']);
    $_SESSION['sucesso'] = '';
  }
  ?>
  <!-- RENDERIZAÇÃO DA CALENDÁRIO -->

  <!-- 
    Se o tipo de usuário logado for administrador OU paciente, ele consegue marcar/editar uma nova consulta
    caso contrário ele só consegue visualizar os detalhes da consulta.
   -->
  <?php

  if ($infoData['tipo'] == 'paciente') {
  ?>
    <script>
      renderCalendar("paciente");
    </script>
    <div id='calendar'></div>
  <?php
  } else if ($infoData['tipo'] == 'admin' ) {
    echo '<script> renderCalendar("admin");</script>';
    echo " <div id='calendar'></div>";
  } else {
    echo "<script> renderCalendar('user',{$infoData['idusuario']});</script>";
    echo " <div id='calendarUser'></div>";
  }
  ?>




  <!-- Modal Visualizar -->
  <div class="modal fade" id="visualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detalhes da Consulta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="ideditar">
            <dl class="row">

              <dt class="col-sm-3">ID Consulta</dt>
              <dd class="col-sm-9" id="idagenda"></dd>
              <dt class="col-sm-3">Paciente</dt>
              <dd class="col-sm-9 pt-2 pb-2 bg-light bg-gradient" id="pac"></dd>
              <dt class="col-sm-3">Psicólogo</dt>
              <dd class="col-sm-9 pt-2 pb-2 bg-light bg-gradient" id="psi"></dd>

              <div class="mb-3 row">
                <label for="title" class="col-sm-3 col-form-label"><b>Título:</b></label>
                <div class="col-sm-9">
                  <input type="text" id="title" class="form-control" readonly>
                </div>

                <dt class="col-sm-3">Início da Consulta:</dt>
                <dd class="col-sm-9" id="start"></dd>
                <dt class="col-sm-3">Fim da Consulta:</dt>
                <dd class="col-sm-9" id="end"></dd>
                <dt class="col-sm-3">Descrição:</dt>
                <dd class="col-sm-8">
                  <!--  -->
                  <?php
                  if ($infoData['tipo'] == 'admin' ) {
                    echo "<textarea class='form-control' id='description' name='descricao' cols='30' rows='10'>
                </textarea>";
                  } else {
                    echo "<textarea readonly class='form-control' id='description' name='descricao' cols='30' rows='10'>
                </textarea>";
                  }
                  ?>
                </dd>
            </dl>
            <div class=" d-flex column justify-content-between">
              <button type='button' class='btn btn-danger' data-bs-dismiss='modal' id='close-modal'>Fechar</button>

              <!-- 
             Se o tipo for administrador, ele consegue alterar os dados da consulta
            -->
              <?php
              if ($infoData['tipo'] == 'admin') {
                echo "
          <button type='submit' class='btn btn-success'>Salvar Alterações</button>
        </div>";
              } else {
                echo "";
              }
              ?>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- MODAL PARA MARCAR AS CONSULTAS -->
  <div class="modal" id="marcar" tabindex="-1">
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
            <!-- Mostra a escolha dos pacientes somente se o usuário for do tipo administrador -->

            <!--if dando problema acima-->
            <?php if ($infoData['tipo'] == 'paciente') : ?>
              <div class="form-group mb20" style="margin-bottom: 10px;">
                <label for="first-name">Paciente:</label>
                <select readonly class="form-control" name="paciente" id="">
                  <?php foreach ($paciente as $pacientes) :
                    if ($pacientes['nome'] == $infoData['nome']) {
                      echo "<option  selected value='" . $pacientes['idpaciente'] . "'>" . $pacientes['nome'] . "</option>";
                    }
                  ?>
                  <?php endforeach; ?>
                </select>
              </div>
            <?php endif; ?>
            <!--Fim do IF sobre verificar o perfil que está logado -->
            <div class="form-group mb20" style="margin-bottom: 10px;">
              <label for="first-name">Psicólogo:</label>

              <select class="form-control" name="psi" id="">
                <option >Escolha um Psicólogo:</option>
                <?php foreach ($psi as $psicologo) : ?>
                  <option value="<?php echo $psicologo['idpsi']; ?>"><?php echo "{$psicologo['nome']} | <b>{$psicologo['especialidade']}</b>"; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <!-- DATA E HORA INICIAL -->
            <div class="row">
              <label class="col-lg-12 col-form-label" for="first-name">Início da consulta:</label>
              <div class="col-lg-12">
                <div class="input-group mb-3">
                  <input autocomplete="off" aria-describedby="basic-addon1" class="form-control col3" type="text" id="inicio" name="inicio" onkeypress="DataHora(event,this)">
                  <span class="input-group-text" id="basic-addon1">
                    <i class="fa fa-calendar"></i>
                  </span>
                  <span class="input-group-text" id="basic-addon1">
                    <i class="fa fa-clock"></i>
                  </span>
                </div>
              </div>
            </div>
            <!--DATA E HORA FINAL  -->
            <div class="row">
              <label class="col-lg-12 col-form-label" for="first-name">Fim da consulta:</label>
              <div class="col-lg-12">
                <div class="input-group mb-3">
                  <input autocomplete="off" aria-describedby="basic-addon1" class="form-control col3" type="text" id="fim" name="fim" onkeypress="DataHora(event,this)">
                  <span class="input-group-text" id="basic-addon1">
                    <i class="fa fa-calendar"></i>
                  </span>
                  <span class="input-group-text" id="basic-addon1">
                    <i class="fa fa-clock"></i>
                  </span>
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
          <button type="submit" class="btn btn-success">Agendar Consulta</button>
        </div>
        </form> <!--FECHAMENTO DO FORMULÁRIO PARA REALIZAR INCLUSÃO -->
      </div>
    </div>

  </div>

  <script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>

</body>

</html>