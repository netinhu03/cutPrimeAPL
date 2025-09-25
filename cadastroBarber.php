<?php
include_once 'objetos/barberController.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $controller = new barberController();

    if (isset($_POST['cadastrar'])) {
        $controller->cadastrarBarber($_POST['barber'], $_FILES['barber']);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Barbeiro</title>
</head>
<body>
    Hello World
</body>
</html>