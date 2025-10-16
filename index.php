<?php
include_once "configs/database.php";
include_once "objetos/clientes.php";
include_once "objetos/clienteController.php";
include_once "session.php";

$controller = new clienteController();
$clientes = $controller->index();
global $clientes;
$a = null;

/*f($_SERVER['REQUEST_METHOD'] === "POST"){
    if(isset($_POST['pesquisa'])){
        $a = $controller->pesquisarCliente($_POST['pesquisa']);

    }
}elseif($_SERVER['REQUEST_METHOD'] === "GET"){
    if(isset($_GET['excluir'])){
       $controller->excluirCliente($_GET['excluir']); 
    }
}*/

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage CutPrime</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <header>
        <nav>
            <img src="imagens/LogoCut-White.png" alt="Logo CutPrime">
        </nav>
        <div class="linkHP">
            <a style="color: white;" class="inicioHP" href="index.php"><strong>INÍCIO</strong></a>
            <a style="color: white;" class="quemSomos" href=""><strong>QUEM SOMOS</strong></a>
            <a style="color: white;" class="nossoEndereco" href=""><strong>MEUS AGENDAMENTOS</strong></a>
        </div>
        <div class="topo">
            <?php
            include 'topo.php';
            ?>
        </div>
    </header>
    <main>
        <video autoplay muted loop
            src="videos/6a2f4a4de969ddd3309646c1df43faeb~4.mp4">
        </video>
        <div class="bnt-container">
            <a class="btn" href="cadastroAgenda.php">AGENDAR</a>
        </div>
    </main>
    <footer>
        © 2025 - Feito por Ademir Marques da Silva Neto.
    </footer>
</body>

</html>