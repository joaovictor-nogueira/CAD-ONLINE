<?php

require __DIR__ . "/../config/Conexao.php";

class UsuarioDAO{
    public function getUsuario($usuario, $senha)
    {
        $pdo = Conexao::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE user = :nome AND senha = :senha");
        $stmt->bindValue(':nome', $usuario);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();
        $response = $stmt->fetch(PDO::FETCH_ASSOC);

        return $response;
    }
}
