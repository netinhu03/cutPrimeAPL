<?php

Class cliente{
    public $idCliente;
    public $cpf;
    public $nomeCli;
    public $telefone;
    public $email;
    public $senha;
    public $bd;

    public function __construct($bd){
        $this->bd = $bd;
    }
    
    public function lerTodos(){
        $sql = "SELECT * FROM cliente";
        $resultado = $this->bd->query($sql);
        $resultado->execute();

        return $resultado->fetchALL(PDO::FETCH_OBJ);
    }

    public function lerCliente($nomeCli){
        $nomeCli = "%" . $nomeCli . "%";
        $sql = "SELECT * FROM cliente WHERE nomeCli LIKE :nomeCli";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(':nomeCli' , $nomeCli);
        $resultado->execute();

        return $resultado->fetchALL(PDO::FETCH_OBJ);
    }

    public function pesquisaCliente($idCliente){
        $sql = "SELECT * FROM cliente WHERE idCliente LIKE :idCliente";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(':idCliente' , $idCliente);
        $resultado->execute();

        return $resultado->fetch(PDO::FETCH_OBJ);
    }

    public function cadastrarCli(){
         $senha_hash = password_hash($this->senha, PASSWORD_DEFAULT);
         $sql = "INSERT INTO cliente(cpf, nomeCli, telefone, email, senha) VALUES (:cpf, :nomeCli, :telefone, :email, :senha)";
         $stmt = $this->bd->prepare($sql);
         $stmt->bindParam(':cpf', $this->cpf, PDO::PARAM_STR);
         $stmt->bindParam(':nomeCli', $this->nomeCli, PDO::PARAM_STR);
         $stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_INT);
         $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
         $stmt->bindParam(':senha', $senha_hash, PDO::PARAM_STR);

         if($stmt->execute()){
            return true;
         }else{
            return false;
         }
    }

    public function atualizar(){
        $senha_hash = password_hash($this->senha, PASSWORD_DEFAULT);
        $sql = "UPDATE cliente SET cpf = :cpf, nomeCli = :nomeCli, telefone = :telefone, email = :email, senha = :senha WHERE ra = :ra";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':cpf', $this->cpf, PDO::PARAM_STR);
        $stmt->bindParam(':nomeCli', $this->nomeCli, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_INT);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha_hash, PDO::PARAM_STR);
        $stmt->bindParam(':idCliente', $this->idCliente, PDO::PARAM_INT);

         if ($stmt->execute()){
            return true;
         }else{
            return false;
         }
    }

    public function excluir(){
        $sql = "DELETE FROM cliente WHERE idCliente = :idCliente";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':idCliente', $this->idCliente, PDO::PARAM_INT);

        if ($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function login(){
        $sql = 'SELECT * FROM cliente WHERE email = :email';
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_OBJ);

        session_start();

        if ($resultado){
            if (password_verify($this->senha, $resultado->senha)){
                session_start();
                $_SESSION['erro'] = 'senha correta';
                $_SESSION['cliente'] = $resultado;
                header('Location: index.php');
                exit();
            }else{
                $_SESSION['erro'] = 'senha incorreta';
                header('Location: loginCli.php');
                exit();
            }
        } else {
            $_SESSION['erro'] = 'user não encontrado';
        }
    }
}
?>