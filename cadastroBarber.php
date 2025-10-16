<?php
include_once 'objetos/barbeiroController.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $controller = new barbeiroController();

    if (isset($_POST['cadastrar'])) {
        $controller->cadastrarBarber($_POST['barbeiro']);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Barbeiro</title>
    <link rel="stylesheet" href="css/cadastroBarber.css">
</head>
<body>
    <header>
        <h1>Cadastro Funcionários</h1>      
    </header>
<main>
    <form action="cadastroBarber.php" method="post" enctype="multipart/form-data">
        <h2>Bem-vindo a CutPrime</h2>
        <div class="divInput">
        <label for="nome">Nome</label>
        <input id="nome" class="nomeBarber" type="text" name="barbeiro[nome]">
        </div>
        <div class="divTelCPF">
            <div class="divInput">
                <label for="telefone">Telefone</label>
                <input  id="telefone" type="text" name="barbeiro[telefone]">
            </div>
            <div class="divInput">
                <label for="cpf">CPF</label>
                <input id="cpf" type="text" name="barbeiro[cpf]">
            </div>
        </div>
        <div class="divInput">
            <label for="email">Email</label>
            <input id="email" type="text" name="barbeiro[email]">
        </div>
        <div class="divInput">
            <label for="senha">Senha</label>
            <input id="senha" type="password" name="barbeiro[senha]">
        </div>
        <button name="cadastrar">Cadastrar</button>
        <p>Já possuo cadastro! <a href="login.php"><strong>Login</strong></a></p>
    </form>
    
</main>
<footer>
    © 2025 - Feito por Ademir Marques da Silva Neto.
</footer>
</body>
</html>