<?php
 require __DIR__.'../../../../../connnect.php';



$sql = $pdo->prepare("SELECT id, title, start, end, color, status FROM consultas");
$sql->execute();


$eventos = array();

while($dados  = $sql->fetch(\PDO::FETCH_ASSOC)) {
  $id = $dados['id'];
  $title = $dados['title'];
  $start = $dados['start'];
  $end = $dados['end'];
  $color = $dados['color'];
  $status = $dados['status'];

  $eventos[] = [
    'id' => $id,
    'title' => $title,
    'start' => $start,
    'end' => $end,
    'color' => $color,
    'status' => $status,
  ];

}


echo json_encode($eventos);