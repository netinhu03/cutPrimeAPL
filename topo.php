<?php
if (isset($_SESSION['cliente'])):
?>
<link rel="stylesheet" href="css/topo.css">

<div class="topo">
  <div class="usuario-info">
    <span>Olá, <?= $_SESSION['cliente']->nomeCli ?></span>
    <a class="logout" href="logout.php">Sair</a>
  </div>
</div>

<?php
endif;
?>