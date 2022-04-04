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
        INNER JOIN  usuarios as u2 ON (psi.id_usuario = u2.idusuario) where  a.status = 'pendentes' AND a.status = 'confirmados' ");
    $sql->execute();

    $dados = $sql->fetchAll(\PDO::FETCH_ASSOC);
    return $dados;
  }

  public function agendamentosPendentes() {
    include '../connnect.php';;
    $sql = $pdo->prepare("SELECT COUNT(*) as 'pendentes', status FROM agendamentos WHERE status = 'pendentes' ORDER BY status");
    $sql->execute();

    $dados = $sql->fetch(\PDO::FETCH_ASSOC);
    return $dados;
  }

  public function agendamentosMarcados() {
    include '../connnect.php';;
    $sql = $pdo->prepare("SELECT COUNT(*) as 'marcados', status FROM agendamentos WHERE status = 'confirmados' ORDER BY status");
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
    $sql->bindValue(1, 'confirmados');
    $sql->bindValue(2, $id['id']);
    $sql->execute();
    return true;
  }

  public function buscarAgendamentosPorNome() {
    require '../connnect.php';

    $usuarios = $_POST['palavra'];

    $sql = $pdo->prepare("SELECT a.idagendamentos as 'idagendamento', u1.nome as 'Paciente', u2.nome as 'Medico', a.inicio, a.fim, a.status 
    FROM agendamentos as a 
        INNER JOIN  pacientes as pac ON (a.id_paciente = pac.idpaciente)
        INNER JOIN  usuarios as u1 ON (u1.idusuario = pac.id_usuario)
        INNER JOIN  psi as psi ON(a.id_psi = psi.idpsi)
        INNER JOIN  usuarios as u2 ON (psi.id_usuario = u2.idusuario) WHERE LIKE '%$usuarios%' LIMIT 20");
    $sql->execute();

    $dados = $sql->fetch(\PDO::FETCH_ASSOC);

    if(($dados) && ($dados->rowCount() != 0)) {
      echo "<li>".$dados['Paciente']."</li>";
    } else {
      echo "Nenhum usuário encontrado";
    }
  }


  public function converterData($data_inicio, $data_final) {
    $data_hora = array();

    //Convertendo a data e hora atual para formato americano, para cadastrar no banco de dados
    $dataInicio = str_replace('/', '-', $data_inicio);
    $dataHoraInicioConv = date('Y-m-d H:i:s', strtotime($dataInicio));
    // $dataHoraInicioConv = date('Y-m-d', strtotime($dataInicio));

    $dataFinal = str_replace('/', '-', $data_final);
    $dataHoraFinalConv = date('Y-m-d H:i:s', strtotime($dataFinal));
    // $dataHoraFinalConv = date('Y-m-d', strtotime($dataFinal));

    $data_hora = [
      "dataInicio" => $dataHoraInicioConv,
      "dataFinal" => $dataHoraFinalConv,
    ];
    return $data_hora;

  }


  public function verificaConsulta($dataHora) {
    require '../connnect.php';

    $sql = $pdo->prepare("SELECT inicio FROM agendamentos WHERE inicio = :inicio  AND fim = :fim");
    $sql->bindValue(":inicio", $dataHora['dataInicio']); 
    $sql->bindValue(":fim", $dataHora['dataFinal']);

    $sql->execute();

    if($sql->rowCount() > 0) {
      return true;
    } else {
     
      return false;
    }
  }


  public function marcarConsulta() {
    require '../connnect.php';

    // var_dump($_POST); die();

    $titulo = $_POST['titulo'];
    $inicio = $_POST['inicio'];
    $final = $_POST['fim'];

    $psi = $_POST['psi'];
    $paciente = $_POST['paciente'];
    $descricao = $_POST['descricao'];

    
    
    $data_horaConv = $this->converterData($inicio, $final);
   
    if($this->verificaConsulta($data_horaConv)) {
     return false;
    } else {
      $sql = $pdo->prepare("INSERT INTO 
        agendamentos 
          (title, id_psi, id_paciente, inicio, fim, status, descricao) 
            VALUES (:titulo, :psi,:paciente, :inicio, :fim,'pendentes',:descricao)");

      $sql->bindParam(':titulo', $titulo);
      $sql->bindParam(':psi', $psi);
      $sql->bindParam(':paciente', $paciente);
      $sql->bindParam(':inicio', $data_horaConv['dataInicio']);
      $sql->bindParam(':fim', $data_horaConv['dataFinal']);
    
      $sql->bindParam(':descricao', $descricao);
      $sql->execute();

      return true;
    }

  }


  public function minhasConsultas($info) {
    require '../connnect.php';

    $sql = $pdo->prepare("SELECT 
    u.nome, 
    u.avatar, 
    a.inicio, 
    a.status,
    a.idagendamentos
    FROM usuarios AS u INNER JOIN pacientes AS p ON (u.idusuario = p.id_usuario)
                       INNER JOIN agendamentos AS a ON (a.id_paciente = p.idpaciente) 
                       INNER JOIN psi AS ps ON (ps.idpsi = a.id_psi) 
                        where ps.id_usuario = :idlogado ");

    $sql->bindValue(':idlogado', $info['idusuario']);
    $sql->execute();

    $dados = $sql->fetchAll(\PDO::FETCH_ASSOC);
    // $this->
    // echo "<pre>";
    // print_r($dados[0]['inicio']);
    // die();
    return $dados;

  }


  public function minhasConsultasMarcadas($info) {
    include '../connnect.php';;

    $id = $info['idusuario'];

    $sql = $pdo->prepare("SELECT COUNT(*) AS 'marcados', status
    FROM agendamentos AS ag INNER JOIN psi AS p ON (ag.id_psi = p.idpsi) 
        INNER JOIN pacientes AS pac ON (pac.idpaciente = ag.id_paciente)
            INNER JOIN  usuarios AS u ON (u.idusuario = pac.id_usuario)
      WHERE (p.id_usuario = ? AND ag.status = 'confirmados') ");
    $sql->bindValue(1, $id);
    $sql->execute();  


    $dados = $sql->fetch(\PDO::FETCH_ASSOC);
    return $dados;
  }


  public function minhasConsultasPendentes($info) {
    include '../connnect.php';;

    $id = $info['idusuario'];

    $sql = $pdo->prepare("SELECT COUNT(*) AS 'pendentes', status
    FROM agendamentos AS ag INNER JOIN psi AS p ON (ag.id_psi = p.idpsi) 
        INNER JOIN pacientes AS pac ON (pac.idpaciente = ag.id_paciente)
            INNER JOIN  usuarios AS u ON (u.idusuario = pac.id_usuario)
      WHERE (p.id_usuario = ? AND ag.status = 'pendentes') ");
    $sql->bindValue(1, $id);
    $sql->execute();  


    $dados = $sql->fetch(\PDO::FETCH_ASSOC);
    return $dados;
  }

  public function minhasConsultasCanceladas($info) {
    include '../connnect.php';;

    $id = $info['idusuario'];

    $sql = $pdo->prepare("SELECT COUNT(*) AS 'cancelados', status
    FROM agendamentos AS ag INNER JOIN psi AS p ON (ag.id_psi = p.idpsi) 
        INNER JOIN pacientes AS pac ON (pac.idpaciente = ag.id_paciente)
            INNER JOIN  usuarios AS u ON (u.idusuario = pac.id_usuario)
      WHERE (p.id_usuario= ? AND ag.status = 'cancelados') ");
    $sql->bindValue(1, $id);
    $sql->execute();  


    $dados = $sql->fetch(\PDO::FETCH_ASSOC);
    return $dados;
  }

  
  public function meusUltimosPacientes($info) { 
    require '../connnect.php';

    $sql = $pdo->prepare("SELECT 
    u.nome, 
    u.avatar
    FROM usuarios AS u INNER JOIN pacientes AS p ON (u.idusuario = p.id_usuario)
                       INNER JOIN agendamentos AS a ON (a.id_paciente = p.idpaciente) 
                       INNER JOIN psi AS ps ON (ps.idpsi = a.id_psi) 
                        where ps.id_usuario = :idlogado ORDER BY idagendamentos DESC");

    $sql->bindValue(':idlogado', $info['idusuario']);
    $sql->execute();

    $dados = $sql->fetchAll(\PDO::FETCH_ASSOC);

    return $dados;
  }


  public function editarConsulta($id) {
    require '../connnect.php';

    $descricao = $_GET['descricao'];
  
    $sql = $pdo->prepare("UPDATE agendamentos SET descricao = ?, editado_em = now() WHERE idagendamentos = ?");
    $sql->bindValue(1, $descricao);
    $sql->bindValue(2, $id['id']);
    $sql->execute();

    return true;
  }

  public function encerrarConsulta($id) {
    echo "encerrando consulta de ID: ";
  }
}
