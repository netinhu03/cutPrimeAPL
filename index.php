<?php
include_once "configs/database.php";
include_once "objetos/clientes.php";
include_once "objetos/clienteController.php";
include_once "session.php";

$controller = new clienteController();
$clientes = $controller->index();
global $alunos;
$a = null;

/*f($_SERVER['REQUEST_METHOD'] === "POST"){
    if(isset($_POST['pesquisa'])){
        $a = $controller->pesquisarCliente($_POST['pesquisa']);

    }
}elseif($_SERVER['REQUEST_METHOD'] === "GET"){
    if(isset($_GET['excluir'])){
       $controller->excluirCliente($_GET['excluir']); 
    }
}*/

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage CutPrime</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header>
        <nav>
        <?php
            include 'topo.php';
        ?>
        <img src="imagens/LogoCut-White.png" alt="Logo CutPrime">
        </nav>
        <div class="linkHP">
            <a style="color: white;" class="inicioHP" href="index.php">INÍCIO</a>
            <a style="color: white;" class="quemSomos" href="">QUEM SOMOS</a>
            <a style="color: white;" class="nossoEndereco" href="">MEUS AGENDAMENTOS</a>
        </div>
        <div>
            <a class="btn"  href="cadastroAgenda.php">AGENDAR</a>
        </div>
    </header>
    <main>
        <p>
            <h1 style="text-align: center;">Desde sempre cuidando do seu  estilo.</h1>
        </p>

            <h2>Nossa História</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut quis turpis id risus congue ornare blandit id dui. Maecenas posuere sagittis tortor vel consectetur. Cras fermentum, magna ac convallis iaculis, arcu arcu pulvinar leo, eu ullamcorper mi orci commodo arcu. Mauris ac elit id purus iaculis tincidunt. Sed vel justo eu enim venenatis pharetra. Ut id ante pellentesque augue viverra feugiat id sit amet velit. Vivamus erat metus, lobortis sit amet erat vitae, faucibus luctus dui. Pellentesque a gravida nisi, eget blandit dolor. Fusce porttitor, est non tempus molestie, nisl risus pulvinar enim, ut condimentum lacus nibh nec nunc. Suspendisse laoreet eros et ipsum rhoncus consectetur. Aliquam sagittis non risus lobortis iaculis. Sed sit amet purus sapien. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer fermentum, eros quis dapibus volutpat, metus nisi varius lorem, mollis lacinia nunc lorem id eros. Quisque quis est vel eros placerat pellentesque sed eu orci. Fusce eu ullamcorper massa.
        </p>

        <p>
            Aenean nisl ante, suscipit et imperdiet eget, ullamcorper a tortor. Vivamus imperdiet vehicula turpis ut vehicula. Phasellus ullamcorper purus nec nulla gravida, sed aliquam justo tempor. Integer semper erat id magna mattis elementum. Vivamus ultrices cursus commodo. Phasellus in placerat dui, ac bibendum felis. Cras ut euismod quam. Phasellus metus nisl, vehicula vitae dui non, pulvinar convallis est.
        </p>

        <p>
            Suspendisse porttitor tristique nulla, suscipit semper arcu auctor ultricies. Donec egestas, risus non viverra finibus, mi nibh elementum nunc, id mollis enim magna quis enim. Curabitur ut varius nibh, id eleifend quam. Vestibulum mollis nunc vel pharetra gravida. Curabitur cursus sem in eros consequat, vitae gravida est maximus. Curabitur tempus velit diam, id feugiat massa hendrerit vel. Aliquam condimentum dolor mi, eget faucibus nisi auctor a. In vitae semper urna. Vivamus quis pharetra urna. Sed velit metus, placerat id libero et, tincidunt elementum orci. Vivamus tempor massa eu nisl congue, a sollicitudin turpis feugiat. Sed sodales, elit ut elementum tempus, risus est auctor nisi, sit amet varius sapien sem ac nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </p>

        <p>
            Quisque a neque quam. Nunc molestie varius ornare. Proin lobortis non eros lobortis fringilla. Duis hendrerit ligula ac arcu commodo malesuada. Vivamus pretium eu arcu id ornare. Fusce sagittis ultrices porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas scelerisque odio nec ultricies luctus. Phasellus lobortis dolor ante, eu laoreet libero lobortis in. Vestibulum quis enim ac metus convallis tincidunt. Cras nisi justo, sodales eget convallis at, hendrerit porta neque. Suspendisse augue sem, ornare non nibh eget, maximus venenatis odio. Aliquam id interdum tortor.
        </p>

        <p>
            Cras iaculis nec ipsum sit amet finibus. Nulla sagittis purus eu massa consequat faucibus. Donec a arcu odio. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec id mauris ut odio euismod mollis vitae vitae libero. Nullam rutrum eget ligula quis finibus. Aenean tincidunt augue sed nisl maximus, fringilla ullamcorper sapien ultricies. Proin facilisis enim et odio ultrices placerat. Aliquam erat
        </p>
    </main>
    <footer>
    </footer>
</body>
</html>