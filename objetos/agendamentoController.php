<?php
include_once 'configs/database.php';
include_once 'agendamentos.php';

session_start();

class agendamentoController{
    private $bd;
    private $agendamento;

    public function __construct(){
        $banco = new Database();
        $this->bd = $banco->conectar();
        $this->agendamento = new agendamento($this->bd);
    }

    public function index(){
        return $this->agendamento->lerTodos();
    }

    public function cadastrarAgenda($dados){
        $this->agendamento->data_hora = $dados['data_hora'];    
        $this->agendamento->idCliente = $_SESSION['cliente']->idCliente;
        $this->agendamento->idBarbeiro = $dados['idBarbeiro'];
        $this->agendamento->idServico =  $dados['servico'];

        if($this->agendamento->cadastrarAgendamento()){
            header("Location: index.php");
            exit();
        }
        return false;
    }

    public function atualizar($dados){
        $this->agendamento->data_hora = $dados['data_hora'];
        $this->agendamento->idBarbeiro = $dados['idBarbeiro'];
        $this->agendamento->idServico = $dados['idServico'];

        if($this->agendamento->atualizar()){
            header("Location: index.php");
            exit();
        }
        return false;
    }

    public function excluirAgendamento($idAgendamento){
        $this->agendamento->idAgendamento = $idAgendamento;

        if($this->agendamento->excluir()){
            header("Location: index.php");
        }
    }


}
?>