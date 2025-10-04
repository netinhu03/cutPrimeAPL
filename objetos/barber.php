<?php

class barbeiro{
    public $idBarbeiro;
    public $nomeBarber;
    public $telefone;
    public $email;
    public $senha;
    public $cpf;
    public $bd;

    public function __construct($bd){
        $this->bd = $bd;
    }

    public function lerTodos(){
        $sql = "SELECT * FROM barbeiro";
        $resultado = $this->bd->query($sql);
        $resultado->execute();

        return $resultado->fetchALL(PDO::FETCH_OBJ);
    }

    public function lerBarbeiros(){
        $sql = "SELECT idBarbeiro, nomeBarber FROM barbeiro";
        $resultado = $this->bd->query($sql);
        $resultado->execute();

        return $resultado->fetchALL(PDO::FETCH_ASSOC);
    }

    public function lerBarbeiro($nomeBarber){
        $nomeBarber = "%" . $nomeBarber . "%";
        $sql = "SELECT * FROM barbeiro WHERE nomeBarber LIKE :nomeBarber";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(':nomeBarber' , $nomeBarber);
        $resultado->execute();

        return $resultado->fetchALL(PDO::FETCH_OBJ);
    }

    public function pesquisaBarbeiro($idBarbeiro){
        $sql = "SELECT * FROM barbeiro WHERE idBarbeiro LIKE :idBarbeiro";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(':idBarbeiro' , $idBarbeiro);
        $resultado->execute();

        return $resultado->fetch(PDO::FETCH_OBJ);
    }

    public function cadastrarBar(){
        $senha_hash = password_hash($this->senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO barbeiro(nomeBarber, telefone, email, senha, cpf) VALUES (:nomeBarber, :telefone, :email, :senha, :cpf)";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':nomeBarber', $this->nomeBarber, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha_hash, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $this->cpf, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function atualizar(){
        $senha_hash = password_hash($this->senha, PASSWORD_DEFAULT);
        $sql = "UPDATE barbeiro SET nomeBarber = :nomeBarber, telefone = :telefone, email = :email, senha = :senha, cpf = :cpf";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':nomeBarber', $this->nomeBarber, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha_hash, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $this->cpf, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function excluir(){
        $sql = "DELETE FROM barbeiro WHERE idBarbeiro = :idBarbeiro";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':idBarbeiro', $this->idBarbeiro, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login(){
        $sql = "SELECT * FROM barbeiro WHERE email = :email";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_OBJ);

        if($resultado){
            if(password_verify($this->senha, $resultado->senha)){
                session_start();
                $_SESSION['barbeiro'] = $resultado;
                header('Location: index.php');
                exit;
            } else {
                header('Location: login.php');
                exit;
            }
        }
    }
}
?>