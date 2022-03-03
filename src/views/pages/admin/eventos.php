<?php
 require __DIR__.'../../../../../connnect.php';



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

$sql = $pdo->prepare("SELECT idagendamentos, title, id_psi, id_paciente, inicio, fim, color, status, descricao FROM agendamentos");
$sql->execute();


$eventos = array();

while($dados  = $sql->fetch(\PDO::FETCH_ASSOC)) {
  $id = $dados['idagendamentos'];
  $title = $dados['title'];
  $psi = $dados['id_psi'];
  $paciente = $dados['id_paciente'];
  $start = $dados['inicio'];
  $end = $dados['fim'];
  $status = $dados['status'];
  // $color = $dados['color'];
  $description = $dados['descricao'];

  $eventos[] = [
    'id' => $id,
    'title' => $title,
    'psi' => $psi,
    'paciente' => $paciente,
    'start' => $start,
    'end' => $end,
    'status' => $status,
    // 'color' => $color,
    'description' => $description
  ];

}


echo json_encode($eventos);