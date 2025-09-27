<?php
include_once 'objetos/clienteController.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['email']) && isset($_POST['senha'])){
        $controller = new clienteController();
        $controller->login($_POST['email'], $_POST['senha']);
    }
}
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
<main>
    <form method="post" action="login.php">
        <h2>Bem-vindo de volta!</h2>
        <div></div>
    </form>
</main>
</body>
</html>