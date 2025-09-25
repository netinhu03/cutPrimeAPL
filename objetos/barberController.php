<?php
include_once 'configs/database.php';
include_once 'barber.php';

class barberController{
    private $bd;
    private $barber;

    public function __construct(){
        $banco = new Database();
        $this->bd = $banco->conectar();
        $this->barber = new Barber($this->bd);
    }

    public function index(){
        return $this->barber->lerTodos();
    }

    public function pesquisaBarber($nomeBarber){
        return $this->barber->lerBarber($nomeBarber);
    }

    public function localizarBarber($idBarbeiro){
        return $this->barber->pesquisaBarber($idBarbeiro);
    }

    public function cadastrarBarber($dados, $arquivo){
        $this->barber->nomeBarber = $dados['nomeBarber'];
        $this->barber->telefone = $dados['telefone'];
        $this->barber->email = $dados['email'];
        $this->barber->senha = $dados['senha'];
        $this->barber->cpf = $dados['cpf'];

        if($this->barber->cadastrarBar()){
            header("Location: index.php");
            exit();
        }
        return false;
    }

    public function atualizarBarber($dados){
        $this->barber->idBarbeiro = $dados['idBarbeiro'];
        $this->barber->nomeBarber = $dados['nomeBarber'];
        $this->barber->telefone = $dados['telefone'];
        $this->barber->email = $dados['email'];
        $this->barber->senha = $dados['senha'];
        $this->barber->cpf = $dados['cpf'];

        if($this->barber->atualizar()){
            header("Location: index.php");
            exit();
        }

        return false;
    }

    public function excluirBarber($idBarbeiro){
        $this->barber->idBarbeiro = $idBarbeiro;

        if($this->barber->excluir()){
            header("Location: index.php");
            exit();
        }
    }

    public function login($email, $senha){
        $this->barber->email = $email;
        $this->barber->senha = $senha;
        $this->barber->login();
    }
    
}
?>