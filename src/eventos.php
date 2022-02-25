<?php
 require __DIR__.'../../connnect.php';



$sql = $pdo->prepare("SELECT idagendamentos, id_paciente, id_psi, inicio, fim FROM agendamentos");
$sql->execute();


$eventos = array();

while($row_events  = $sql->fetch(\PDO::FETCH_ASSOC)) {
  // $e = array();

  $id = $row_events['idagendamentos'];
  $paciente = $row_events['id_paciente'];
  $psi = $row_events['id_psi'];
  $inicio = $row_events['inicio'];
  $fim = $row_events['fim'];

  // $e['id'] = $row_events['idagendamentos'];
  // $e['paciente'] = $row_events['id_paciente'];
  // $e['psi'] = $row_events['id_psi'];
  // $e['inicio'] = $row_events['inicio'];
  // $e['fim'] = $row_events['fim'];

  $eventos[] = [
    'id' => $id,
    'paciente' => $paciente,
    'psi' => $psi,
    'inicio' => $inicio,
    'fim' => $fim,
  ];

  // $events = array_push($eventos, $e);
}

echo json_encode($eventos);