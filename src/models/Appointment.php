<?php
namespace src\models;
use \core\Model;

class Appointment extends Model {

  public function todosAgendamentos() {
    include '../connnect.php';
    $sql = $pdo->prepare("
    SELECT a.idagendamentos, u1.nome as 'Paciente', u2.nome as 'Medico', a.inicio, a.fim, a.status 
    FROM agendamentos as a 
        INNER JOIN  pacientes as pac ON (a.id_paciente = pac.idpaciente)
        INNER JOIN  usuarios as u1 ON (u1.idusuario = pac.id_usuario)
        INNER JOIN  psi as psi ON(a.id_psi = psi.idpsi)
        INNER JOIN  usuarios as u2 ON (psi.id_usuario = u2.idusuario)");
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

  public function cadastrarAgendamento() {
    require '../connnect.php';
    echo "Cadastrando nova consulta";
  }
}