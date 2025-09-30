<?php
    if(isset($_SESSION['cliente'])):
?>

<span>
    Olá, <?= $_SESSION['cliente']->nomeCli ?>
    <a href="logout.php">Sair</a>
</span>

<?php
    endif;
?>