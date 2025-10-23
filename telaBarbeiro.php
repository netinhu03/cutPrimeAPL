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
        <?php include_once 'topo.php'; ?>
    </header>
    <main>
        <video autoplay muted loop
            src="videos/6a2f4a4de969ddd3309646c1df43faeb~4.mp4">
        </video>

        <?php
        if($_SESSION["barbeiro"]->tipo == "adm"):  
        ?>

        <a class="cadbarber" href="cadastroBarber.php">Cadastrar Barbeiro</a>

        <?php else: ?>

        <div class="divListas">
            <div class="linhacabecalho">
                <span>Nome do Cliente</span>
                <span>Serviço</span>
                <span>Data e Hora</span>
            </div>
            <table>
                <?php if (!empty($agendamentos)): ?>
                    <?php foreach ($agendamentos as $ag): ?>
                        <tr class="infos">
                            <td class="um"><?= htmlspecialchars($ag->nomeCli ?? '') ?></td>
                            <td class="dois"><?= htmlspecialchars($ag->nomeServico ?? '') ?></td>
                            <td class="tres"><?= date('d/m/Y H:i', strtotime($ag->data_hora)) ?></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <hr style="border:1px solid white">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" style="text-align:center; color: #aaa;">
                            Nenhum agendamento encontrado.
                        </td>
                    </tr>
                <?php endif; ?>
        </div>
        <?php endif; ?>
        </table>
        <a class="btn" href="cadastroServico.php">Cadastrar Serviço</a>
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