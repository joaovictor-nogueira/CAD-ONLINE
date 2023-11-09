<?php

session_start();

if (!isset($_SESSION['user'])) {
    // Se o usuário não estiver autenticado, redirecione para a página de login
    /*  mensagem de nao esta logado */
    header("Location: index.php");
    exit();
}

$icone_loggout = "<i class='fa-solid fa-right-from-bracket'></i>";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Cad-Online</title>
    <link rel="stylesheet" href="estilos/pages.css">
</head>
<body>
    <div class="container">
        <h1 class="titulo">CAD-ONLINE</h1>

        <h2 class="subtitulo">
            MENU
        </h2>

        
        <div class="btn_wrapper">
            <a href="adicionar.php" class="btn_action margin">Adicionar</a>
            <a href="consultar.php" class="btn_action">Consultar</a>
        </div>
        <a href="relatorio.php" class="btn_action">Listar Fornecedores</a>

        <a href="logout.php" class="btn_sair">SAIR <?php echo $icone_loggout; ?></a>

    </div>



    <script src="https://kit.fontawesome.com/d709ea726d.js" crossorigin="anonymous"></script>
</body>
</html>

