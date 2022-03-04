<?php
 require __DIR__.'../../../../../connnect.php';

// $date = new DateTime();
// echo $date->format('d-m-Y H:i:s');
// die();

// $sql = $pdo->prepare("SELECT id, title, start, end, color, status FROM consultas");
// $sql->execute();


// $eventos = array();

// while($dados  = $sql->fetch(\PDO::FETCH_ASSOC)) {
//   $id = $dados['id'];
//   $title = $dados['title'];
//   $start = $dados['start'];
//   $end = $dados['end'];
//   $color = $dados['color'];
//   $status = $dados['status'];

//   $eventos[] = [
//     'id' => $id,
//     'title' => $title,
//     'start' => $start,
//     'end' => $end,
//     'color' => $color,
//     'status' => $status,
//   ];

// }

$sql = $pdo->prepare(
  "SELECT 
    a.idagendamentos, 
    a.title,
    u1.nome as 'paciente', 
    u2.nome as 'medico', 
    a.inicio, 
    a.fim, 
    a.status,
    a.descricao
      FROM agendamentos as a 
        INNER JOIN  pacientes as pac ON (a.id_paciente = pac.idpaciente)
        INNER JOIN  usuarios as u1 ON (u1.idusuario = pac.id_usuario)
        INNER JOIN  psi as psi ON(a.id_psi = psi.idpsi)
        INNER JOIN  usuarios as u2 ON (psi.id_usuario = u2.idusuario)"
);
$sql->execute();


$eventos = array();

while($dados  = $sql->fetch(\PDO::FETCH_ASSOC)) {
  $id = $dados['idagendamentos'];
  $title = $dados['title'];
  $psi = $dados['medico'];
  $paciente = $dados['paciente'];
  $start = $dados['inicio'];
  $end = $dados['fim'];
  $status = $dados['status'];
  $description = $dados['descricao'];

  $eventos[] = [
    'id' => $id,
    'title' => $title,
    'psicologo' => $psi,
    'paciente' => $paciente,
    'start' => $start,
    'end' => $end,
    'status' => $status,
    'descricao' => $description
  ];

}


echo json_encode($eventos);