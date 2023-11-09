<?php
session_start();
require __DIR__ . "/../Model/Usuarios.php";
require __DIR__ . "/../Controllers/UsuariosController.php";
/* require __DIR__ . "/../dao/UsuarioDAO.php";  */

$objUsuario = new Usuarios();
$objUsuarioController = new UsuariosController(); 

if(isset($_POST['user']) && isset($_POST['senha'])){
    $objUsuario->setUser($_POST['user'])->setSenha($_POST['senha']);
    
    $responseUsuario = $objUsuarioController->autenticar($objUsuario);

    if($responseUsuario){
        /* autenticação foi bem sucedida */
        
        $_SESSION['user'] = $responseUsuario['user'];
        header("Location: ../menu.php");
        exit();
    }else{
        
        $_SESSION['error_mensagem'] = "Login ou senha incorretos"; 
        header("Location: ../index.php");
        exit();

        /* mensagem de login e senha incorretos */
    }
}else{
    header("Location: ../index.php");
    exit();

}



