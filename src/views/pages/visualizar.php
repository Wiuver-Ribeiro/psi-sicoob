<?php
require __DIR__ . '../../../../connnect.php';

$resultado = '';

$sql = $pdo->prepare(
  "SELECT 
    a.idagendamentos, 
    u1.nome as 'paciente', 
    u2.nome as 'medico', 
    psi.especialidade,
    a.status,
    a.descricao as 'descricao'
      FROM agendamentos as a 
        INNER JOIN  pacientes as pac ON (a.id_paciente = pac.idpaciente)
        INNER JOIN  usuarios as u1 ON (u1.idusuario = pac.id_usuario)
        INNER JOIN  psi as psi ON(a.id_psi = psi.idpsi)
        INNER JOIN  usuarios as u2 ON (psi.id_usuario = u2.idusuario) WHERE a.idagendamentos = " . $_POST['consulta_id'] . " LIMIT 1"
);
$sql->execute();

$dados = $sql->fetch(PDO::FETCH_ASSOC);

$resultado .= "<div class='col mb-2'>";
$resultado .= "<label for='paciente'>Paciente:</label>";
$resultado .= "<input type='text' class='form-control' name='paciente'  readonly id='pacienteForm' value='".$dados['paciente']."'>";
$resultado .= "</div>";
$resultado .= "<div class='col mb-2'>";
$resultado .= "<label for='psi'>Psicólogo:</label>";
$resultado .= "<input type='text' class='form-control'  name='psi' readonly value='".$dados['medico'] ." | ".$dados['especialidade']."'>";
$resultado .= "</div>";
$resultado .= "<div class='col mb-2'>";
$resultado .= "<label for='descricao'>Descrição do Paciente:</label>";
$resultado .= "<textarea type='text' class='form-control name='descricao' readonly '>".$dados['descricao']."</textarea>";
$resultado .= "</div>";

echo $resultado;
