<?php
    if(isset($_SESSION['cliente'])):
?>

<span>
    Olá, <?= $_SESSION['cliente']->nome ?>
</span>
<a href="logout.php">Sair</a>

<?php
    endif;
?>

<a href="cadastroCli.php">Sair</a>