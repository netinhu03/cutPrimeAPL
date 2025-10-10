<?php
include_once 'objetos/barbeiroController.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['barbeiro']['email']) && isset($_POST['barbeiro']['email'])){
        $controller = new barbeiroController();
        $controller->login($_POST['barbeiro']['email'], $_POST['barbeiro']['senha']);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Barbeiro</title>
    <link rel="stylesheet" href="css/loginBarber.css">
</head>
<body>
    <header>
        Login Barbeiros
    </header>
<main>
    <form action="loginBarber.php" method="post" enctype="multipart/form-data">
        <h2>Bem-vindo de volta!</h2>
        <div class="divInput">
            <label for="email">Email</label>
            <input id="email" type="text" name="barbeiro[email]">
        </div>
        <div class="divInput">
            <label for="senha">Senha</label>
            <input id="senha" type="password" name="barbeiro[senha]">
        </div>
        <button name="login">Login</button>
    </form>
    <div>
        <img src="imagens/LogoCut-Black.png" alt="logo">
    </div>
</main>
<footer>
    oi
</footer>
</main>
</body>
</html>