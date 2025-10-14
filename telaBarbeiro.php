<?php


session_start();

if(!isset($_SESSION["barbeiro"])){
    header("Location: loginBarber.php");
    exit;
} 

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

        <div class="divLista" >

        </div>
    </main>
    <footer>
        © 2025 - Feito por Ademir Marques da Silva Neto.
    </footer>
</body>
</html>