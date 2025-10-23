<?php
include_once 'objetos/servicoController.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $controller = new servicoController();

    if (isset($_POST['cadastrar'])) {
        $controller->cadastrarServico($_POST['servico']);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Serviço</title>
    <link rel="stylesheet" href="css/cadastroServico.css">
</head>
<body>
    <header>
        <h1>Cadastro de Serviços</h1>
    </header>
    <main>
        <form action="cadastroServico.php" method="post" enctype="multipart/form-data">
            <h2>Cadastro de Serviços</h2>
            <div class="divInput">
                <label for="nome">Nome do Serviço</label>
                <input id="nome" class="nomeServico" type="text" name="servico[nomeServico]">
            </div>
            <div class="divInput">
                <label for="descricao">Descrição</label>
                <input id="descricao" type="text" name="servico[descricao]">
            </div>
            <div class="divInput">
                <label for="preco">Preço</label>
                <input id="preco" type="text" name="servico[preco]">
            </div>
            <button name="cadastrar">Cadastrar</button>
        </form>
    </main>
    <footer>
        © 2025 - Feito por Ademir Marques da Silva Neto.
    </footer>
</body>

</html>