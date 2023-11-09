<?php

require __DIR__ . "/../dao/usuarioDAO.php";

class UsuariosController{
    
    public function autenticar(Usuarios $usuario){

        if (!empty($usuario->getUser()) && !empty($usuario->getSenha())) {

           
            
            $usuarioDAO = new UsuarioDAO();
            $response = $usuarioDAO->getUsuario($usuario->getUser(), $usuario->getSenha());
            
            return $response;
        }
    }
}


?>