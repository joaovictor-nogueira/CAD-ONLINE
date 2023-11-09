<?php

    session_start();
    
    /* $error_mensagem =  ? $_SESSION['error_mensagem'] : "";
    unset($_SESSION['error_mensagem']); */
 
    $icone_login = "<i class='fa-solid fa-right-to-bracket'></i>"

    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login CAD-ONLINE</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos/style.css">
    
</head>
<body>
    <div class="container">
        <div class="box">
            <div class="titulo">
                <h1>CAD-ONLINE <br><i class="fa-solid fa-users"></i></h1>
                
            </div>

            
            

            <form method="post" action="/cad-online-main/server/validaLogin.php" class="form-login">
                <div class="login">
                    <label for="user">LOGIN: </label><input type="text" name="user">
                </div>
                <div class="senha">
                    <label for="senha">SENHA: </label><input type="password" name="senha">
                </div>

                <div class="entrar">
                    <button type="submit" class="enter">ENTRAR <?php echo $icone_login ?> </button>
                </div>
            </form>

            <?php if(isset($_SESSION['error_mensagem'])){ 
            unset($_SESSION['error_mensagem']);   
            ?>
                <div class="error_mensagem">
                    <p>Login ou senha incorretos.</p>
                </div>
            <?php } ?>
            
        </div>

    </div>
    

    <script src="https://kit.fontawesome.com/d709ea726d.js" crossorigin="anonymous"></script>
</body>
</html>
