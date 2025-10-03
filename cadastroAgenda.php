<?php
include_once 'objetos/agendamentoController.php';
include_once 'objetos/barbeiroController.php';

$barbeiroController = new barbeiroController();

$barbeiros = $barbeiroController->listarBarbeiros();

$db = new Database();
$conn = $db->conectar();

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $controller = new agendamentoController();

    if(isset($_POST['cadastrar'])){
        $controller->cadastrarAgenda($_POST['agendamento'], $_FILES['agendamento']);
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
            <select name="barbeiro" id="barbeiro">
                <?php foreach($barbeiros as $barbeiro): ?>
                    <option value="<?= $barbeiro['idBarbeiro']?>"><?= $barbeiro['nomeBarber']?></option>
                    <?php endforeach; ?>
            </select>
        </div>
    </form>
</main>


</body>
</html>