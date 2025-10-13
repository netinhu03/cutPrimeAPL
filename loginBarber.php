<?php
include_once 'objetos/barbeiroController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['barbeiro']['email'] ?? '');
    $senha = trim($_POST['barbeiro']['senha'] ?? '');

    if (!empty($email) && !empty($senha)) {
        $controller = new barbeiroController();
        $controller->login($email, $senha);
    } else {
        echo "Preencha todos os campos.";
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