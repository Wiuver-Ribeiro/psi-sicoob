<?php
namespace src\models;
use \core\Model;

class Appointment extends Model {

  public function todosAgendamentos() {
    include '../connnect.php';
    $sql = $pdo->prepare("SELECT u.nome AS 'nome', u.tipo, a.inicio, a.fim, a.status 
    FROM usuarios AS u INNER JOIN psi AS ps ON (u.idusuario = ps.id_usuario)
      INNER JOIN agendamentos AS a ON (a.id_psi = ps.idpsi) WHERE u.tipo = 'psi'
    UNION 
    SELECT u.nome AS 'nome',u.tipo, a.inicio, a.fim, a.status 
    FROM usuarios AS u INNER JOIN pacientes AS p ON (u.idusuario = p.id_usuario)
      INNER JOIN agendamentos AS a ON (a.id_paciente = p.idpaciente) WHERE u.tipo = 'paciente';
    ");
    $sql->execute();

    $dados = $sql->fetchAll(\PDO::FETCH_ASSOC);
    return $dados;
  }

  public function agendamentosPendentes() {
    include '../connnect.php';;
    $sql = $pdo->prepare("SELECT COUNT(*) as 'pendentes', status FROM agendamentos WHERE status = 'pendente' ORDER BY status");
    $sql->execute();

    $dados = $sql->fetch(\PDO::FETCH_ASSOC);
    return $dados;
  }

  public function agendamentosMarcados() {
    include '../connnect.php';;
    $sql = $pdo->prepare("SELECT COUNT(*) as 'marcados', status FROM agendamentos WHERE status = 'confirmado' ORDER BY status");
    $sql->execute();

    $dados = $sql->fetch(\PDO::FETCH_ASSOC);
    return $dados;
  }

  public function agendamentosCancelados() {
    include '../connnect.php';;
    $sql = $pdo->prepare("SELECT COUNT(*) as 'cancelados', status FROM agendamentos WHERE status = 'cancelados' ORDER BY status");
    $sql->execute();

    $dados = $sql->fetch(\PDO::FETCH_ASSOC);
    return $dados;
  }


  public function agendamentos() {
    require '../connnect.php';

    $sql = $pdo->prepare("SELECT idagendamentos, id_paciente, id_psi, inicio, fim FROM agendamentos");
    $sql->execute();
    
    
    $eventos = array();
    
    while($dados = $sql->fetch(\PDO::FETCH_ASSOC)) {
     $events = array();

      $events['id'] = $dados['idagendamentos'];
      $events['paciente'] = $dados['id_paciente'];
      $events['psi'] = $dados['id_psi'];
      $events['start'] = $dados['inicio'];
      $events['end'] = $dados['fim'];

      array_push($eventos, $events);
    }
    
    echo json_encode($eventos);
  }
}