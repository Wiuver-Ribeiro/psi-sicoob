<?php
 require __DIR__.'../../../../connnect.php';

 $id = $_GET['id'];



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
        INNER JOIN  usuarios as u2 ON (psi.id_usuario = u2.idusuario) WHERE a.status = 'pendentes' AND u2.idusuario = $id "
);
$sql->execute();
// print_r($sql->fetch(\PDO::FETCH_ASSOC));
// die();


$eventos = array();

while($dados  = $sql->fetch(\PDO::FETCH_ASSOC)) {
  $id = $dados['idagendamentos'];
  $title = $dados['title'];
  $psi = $dados['medico'];
  $pac = $dados['paciente'];
  $start = $dados['inicio'];
  $end = $dados['fim'];
  $status = $dados['status'];
  $descricao = $dados['descricao'];

  $eventos[] = [
    'id' => $id,
    'title' => $title,
    'psi' => $psi,
    'pac' => $pac,
    'start' => $start,
    'end' => $end,
    'status' => $status,
    'descricao' => $descricao
  ];

}
echo json_encode($eventos);
