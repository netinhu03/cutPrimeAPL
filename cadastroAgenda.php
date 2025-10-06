<?php
include_once 'objetos/agendamentoController.php';
include_once 'objetos/barbeiroController.php';
include_once 'objetos/servicoController.php';

$barbeiroController = new barbeiroController();
$servicoController = new servicoController();

$barbeiros = $barbeiroController->listarBarbeiros();
$servicos = $servicoController->listarServicos();


$db = new Database();
$conn = $db->conectar();


if($_SERVER['REQUEST_METHOD'] === "POST"){
    $controller = new agendamentoController();

    if(isset($_POST['cadastrar'])){
        $controller->cadastrarAgenda($_POST['agendamento']);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento</title>
    <link rel="stylesheet" href="css/cadastroAgenda.css">
</head>
<body>
    <header>
        <h1>Agendamento</h1>
    </header>
<main>
    <form action="cadastroAgenda.php" method="post" enctype="multipart/form-data">
        <h2>Realizar Agendamento</h2>
        <div class="divInput">
            <label for="barbeiro">Barbeiro</label>
            <select name='agendamento[idBarbeiro]' id="barbeiro">
                <?php foreach($barbeiros as $barbeiro): ?>
                    <option value="<?= $barbeiro['idBarbeiro']?>"><?= $barbeiro['nomeBarber']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="servico">Serviço</label>
            <select name='agendamento[servico]' id="servico">
                <?php foreach($servicos as $servico): ?>
                    <option value="<?= $servico['idServico']?>"><?= $servico['nomeServico']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="divInput">
            <label for="data_hora">Data e Horário</label>
            <input id="data_hora" type="datetime-local" name='agendamento[data_hora]'>
        </div>
        <button name="cadastrar">Confirmar</button>
    </form>
</main>
</body>
<footer>
</footer>
</html>