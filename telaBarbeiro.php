<?php
include_once 'objetos/barbeiroController.php';
include_once 'objetos/agendamentoController.php';

$controller = new barbeiroController();

if (!isset($_SESSION["barbeiro"])) {
    header("Location: loginBarber.php");
    exit();
}

$agendamentos = $controller->listarAgendamentos($_SESSION['barbeiro']->idBarbeiro);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento</title>
    <link rel="stylesheet" href="css/telaBarbeiro.css">
</head>

<body>
    <header>
        <strong>GERENCIAMENTO DE AGENDAMENTOS</strong>
    </header>
    <main>
        <video autoplay muted loop
            src="videos/6a2f4a4de969ddd3309646c1df43faeb~4.mp4">
        </video>

        <div class="divListas">
            <div class="linhacabecalho">
                <span>Nome do Cliente</span>
                <span>Serviço</span>
                <span>Data e Hora</span>
            </div>
            <table>
                <?php if($clientes) : ?>
                    <?php foreach ($clientes as $cliente) : ?>
                        <tr>
                            <td><?= $cliente->id ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>

        </div>
        </table>    
    </main>
    <footer>
        © 2025 - Feito por Ademir Marques da Silva Neto.
    </footer>
</body>

</html>

<?php //foreach($agendamentos as $agendamento) : 
?>
<? //php var_dump($agendamento) 
?>
<? //php endforeach;