<?php
include_once 'configs/database.php';
include_once 'agendamentos.php';

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

    public function cadastrarAgendamento($dados){ //criar nome na hora do cadastro
        $this->agendamento->data_hora = $dados['data_hora'];
        $this->agendamento->idCliente = $dados['idCliente'];
        $this->agendamento->idBarbeiro = $dados['idBarbeiro'];
        $this->agendamento->idServico = $dados['idServico'];

        if($this->agendamento->cadastrarAgendamento()){ //certo
            header("Location: index.php");
            exit();
        }
        return false;
    }

    public function atualizar($dados){
        $this->agendamento->data_hora = $dados['data_hora'];
        $this->agendamento->idCliente = $dados['idCliente'];
        $this->agendamento->idBarbeiro = $dados['idBarbeiro'];
        $this->agendamento->idServico = $dados['idServico'];

        if($this->agendamento->cadastrarAgendamento()){
            header("Location: index.php");
            exit();
        }
        return false;
    }


}
?>