<?php

Class agendamento{
    public $idAgendamento;
    public $data_hora;
    public $idCliente;
    public $idBarbeiro;
    public $idServico;
    public $bd;

    public function __construct($bd){
        $this->bd = $bd;
    }

    public function lerTodos(){
        $sql = "SELECT * FROM agendamento";
        $resultado = $this->bd->query($sql);
        $resultado->execute();

        return $resultado->fetchALL(PDO::FETCH_OBJ);
    }

    public function lerAgendamento($idAgendamento){
        $idAgendamento = "%" . $idAgendamento . "%";
        $sql = "SELECT * FROM agendamento WHERE idAgendamento LIKE :idAgendamento";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(':idAgendamento' , $idAgendamento);
        $resultado->execute();

        return $resultado->fetchALL(PDO::FETCH_OBJ);
    }

    public function cadastrarAgendamento(){
        $sql = "INSERT INTO agendamento(data_hora, idCliente, idBarbeiro, idServico) VALUES (:data_hora, :idCliente, :idBarbeiro, :idServico)";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':data_hora', $this->data_hora, PDO::PARAM_STR);
        $stmt->bindParam('idCliente', $this->idCliente, PDO::PARAM_INT);
        $stmt->bindParam(':idBarbeiro', $this->idBarbeiro, PDO::PARAM_INT);
        $stmt->bindParam(':telefone', $this->idServico, PDO::PARAM_INT);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function atualizar(){
        $sql = "UPDATE agendamento SET data_hora = :data_hora, idBarbeiro = :idBarbeiro, idServico = :idServico WHERE idAgendamento = idAgendamento";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':data_hora', $this->data_hora, PDO::PARAM_STR);
        $stmt->bindParam('idCliente', $this->idCliente, PDO::PARAM_INT);
        $stmt->bindParam(':idBarbeiro', $this->idBarbeiro, PDO::PARAM_INT);
        $stmt->bindParam(':telefone', $this->idServico, PDO::PARAM_INT);
        $stmt->bindParam(':idAgendamento', $this->idAgendamento, PDO::PARAM_INT);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function excluir(){
        $sql = "DELETE FROM agendamento WHERE idAgendamento = :idAgendamento";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':idAgendamento', $this->idAgendamento, PDO::PARAM_INT);

        if ($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>