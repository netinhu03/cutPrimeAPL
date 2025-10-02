<?php
include_once 'configs/database.php';
include_once 'clientes.php';

class clienteController{
    private $bd;
    private $cliente;

    public function __construct(){
        $banco = new Database();
        $this->bd = $banco->conectar();
        $this->cliente = new cliente($this->bd);
    }

    public function index(){
        return $this->cliente->lerTodos();
    }

    public function pesquisarCliente($nomeCli){
        return $this->cliente->lerCliente($nomeCli);
    }

    public function localizarClientes($idCliente){
        return $this->cliente->pesquisaCliente($idCliente);
    }

    public function cadastrarCliente($dados){
        $this->cliente->cpf = $dados['cpf'];
        $this->cliente->nomeCli = $dados['nome'];
        $this->cliente->telefone = $dados['telefone'];
        $this->cliente->email = $dados['email'];
        $this->cliente->senha = $dados['senha'];

        if($this->cliente->cadastrarCli()){
            header("Location: index.php");
            exit();
        }
        return false;
    }

    public function atualizarCliente($dados){
        $this->cliente->idCliente = $dados['id'];
        $this->cliente->cpf = $dados['cpf'];
        $this->cliente->telefone = $dados['telefone'];
        $this->cliente->email = $dados['email'];
        $this->cliente->senha = $dados['senha'];

        if($this->cliente->atualizar()){
            header("Location: index.php");
            exit();
        }

        return false;
    }

    public function excluirCliente($idCliente){
        $this->cliente->idCliente = $idCliente;

        if($this->cliente->excluir()) {
            header("Location: index.php");
            exit();
        }
    }

    public function login($email, $senha){
        $this->cliente->email = $email;
        $this->cliente->senha = $senha;
        $this->cliente->login();
    }
}
?>