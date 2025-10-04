<?php

use function PHPSTORM_META\type;

Class Database{
    private $host = "127.0.0.1:3306"; //em casa a porta é "3306" no Senac é "3316"
    private $banco = "cutprime";
    private $usuario = "root";
    private $senha = "123456";
    private $con;

    public function conectar(){
        $this->con = null;
    
        try{
            $this->con = new PDO("mysql:host=$this->host; dbname=$this->banco", $this->usuario, $this->senha);
        }catch (PDOException $e){
            echo "Erro ao conectar: " . $e->getMessage();
        }

        return $this->con;
    }
}
?>