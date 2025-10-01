<?php
include_once 'objetos/clienteController.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['cliente']['email']) && isset($_POST['cliente']['senha'])){
        $controller = new clienteController();
        $controller->login($_POST['cliente']['email'], $_POST['cliente']['senha']);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cliente</title>
    <link rel="stylesheet" href="css/loginCli.css">
</head>
<body>
    <header>
    </header>
<main>
    <form action="loginCli.php" method="post" enctype="multipart/form-data">
        <h2>Bem-vindo de volta!</h2>
        <div class="divInput">
            <label for="email">Email</label>
            <input id="email" type="text" name="cliente[email]">
        </div>
        <div class="divInput">
            <label for="senha">Senha</label>
            <input id="senha" type="password" name="cliente[senha]">
        </div>
        <button name="login">Login</button>
        <p>Não possuo login<a href="cadastroCli.php"><strong> Cadastrar-se</strong></a></p>
        <p><a href="loginBarber.php"><strong> Barbeiro</strong></a></p>
    </form>
    <div>
        <img src="imagens/LogoCut-Black.png" alt="logo">
    </div>
</main>
<footer>
    oi
</footer>
</body>
</html>