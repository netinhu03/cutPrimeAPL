<?php
    if(isset($_SESSION['cliente'])):
?>

<span>
    Olá, <?= $_SESSION['cliente']->nomeCli ?>
    <br>
    <a class="logout" href="logout.php">Sair</a>
</span>

<?php
    endif;
?>