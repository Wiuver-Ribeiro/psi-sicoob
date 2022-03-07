<?php
namespace src\models;
use \core\Model;

class Appointment extends Model {

  public function todosAgendamentos() {
    include '../connnect.php';
    $sql = $pdo->prepare("
    SELECT a.idagendamentos as 'idagendamento', u1.nome as 'Paciente', u2.nome as 'Medico', a.inicio, a.fim, a.status 
    FROM agendamentos as a 
        INNER JOIN  pacientes as pac ON (a.id_paciente = pac.idpaciente)
        INNER JOIN  usuarios as u1 ON (u1.idusuario = pac.id_usuario)
        INNER JOIN  psi as psi ON(a.id_psi = psi.idpsi)
        INNER JOIN  usuarios as u2 ON (psi.id_usuario = u2.idusuario) where  a.status = 'pendente' ");
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
    $sql = $pdo->prepare("SELECT COUNT(*) as 'cancelados', status FROM agendamentos WHERE status = 'cancelado' ORDER BY status");
    $sql->execute();

    $dados = $sql->fetch(\PDO::FETCH_ASSOC);
    return $dados;
  }



  public function cadastrarAgendamento() {
    require '../connnect.php';
    echo "Cadastrando nova consulta";
  }

  public function cancelarAgendamento($id) {
    require '../connnect.php';
    $sql = $pdo->prepare("UPDATE agendamentos SET status = ? WHERE idagendamentos = ?");
    $sql->bindValue(1, 'cancelado');
    $sql->bindValue(2, $id['id']);
    $sql->execute();
    return true;
  }


  public function confirmarAgendamento($id) {
    require '../connnect.php';
    $sql = $pdo->prepare("UPDATE agendamentos SET status = ? WHERE idagendamentos = ?");
    $sql->bindValue(1, 'confirmado');
    $sql->bindValue(2, $id['id']);
    $sql->execute();
    return true;
  }
}