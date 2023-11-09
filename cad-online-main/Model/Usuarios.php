<?php

class Usuarios{
    private $id;
    private $user;
    private $senha;

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getId(){
        return $this->id;
    }

    public function setUser($user){
        $this->user = $user;
        return $this;
    }

    public function getUser(){
        return $this->user;
    }

    public function setSenha($senha){
        $this->senha = $senha;
        return $this;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function getUsuario(){
        $pdo = Conexao::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE user=:user AND senha=:senha");
        $stmt->bindValue(':user',$this->getUser());
        $stmt->bindValue(':senha',$this->getSenha());
        $stmt->execute();
        $return = $stmt->fetch();
        print_r ($return);

    }
}
 