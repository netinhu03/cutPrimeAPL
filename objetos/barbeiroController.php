<?php
include_once 'configs/database.php';
include_once 'barber.php';

class barbeiroController{
    private $bd;
    private $barbeiro;

    public function __construct(){
        $banco = new Database();
        $this->bd = $banco->conectar();
        $this->barbeiro = new barbeiro($this->bd);
    }

    public function index(){
        return $this->barbeiro->lerTodos();
    }

     public function listarBarbeiros(){
         return $this->barbeiro->lerBarbeiros();
    }

    public function pesquisaBarber($nomeBarber){
        return $this->barbeiro->lerBarbeiro($nomeBarber);
    }

    public function localizarBarber($idBarbeiro){
        return $this->barbeiro->pesquisaBarbeiro($idBarbeiro);
    }

    public function cadastrarBarber($dados){
        $this->barbeiro->nomeBarber = $dados['nome'];
        $this->barbeiro->telefone = $dados['telefone'];
        $this->barbeiro->email = $dados['email'];
        $this->barbeiro->senha = $dados['senha'];
        $this->barbeiro->cpf = $dados['cpf'];

        if($this->barbeiro->cadastrarBar()){
            header("Location: index.php");
            exit();
        }
        return false;
    }

    public function atualizarBarbeiro($dados){
        $this->barbeiro->idBarbeiro = $dados['idBarbeiro'];
        $this->barbeiro->nomeBarber = $dados['nomeBarber'];
        $this->barbeiro->telefone = $dados['telefone'];
        $this->barbeiro->email = $dados['email'];
        $this->barbeiro->senha = $dados['senha'];
        $this->barbeiro->cpf = $dados['cpf'];

        if($this->barbeiro->atualizar()){
            header("Location: index.php");
            exit();
        }

        return false;
    }

    public function excluirBarbeiro($idBarbeiro){
        $this->barbeiro->idBarbeiro = $idBarbeiro;

        if($this->barbeiro->excluir()){
            header("Location: index.php");
            exit();
        }
    }

    public function login($email, $senha){
        $this->barbeiro->email = $email;
        $this->barbeiro->senha = $senha;
        $this->barbeiro->login();
    }
    
}
?>