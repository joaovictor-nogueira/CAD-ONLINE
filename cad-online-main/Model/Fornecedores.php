<?php
class Fornecedores{
        private $id;
        private $razaosocial;
        private $cnpj;
        private $nome;
        private $telefone;
        private $email;
        private $cep;
        private $rua;
        private $numero;
        private $complemento;
        private $bairro;
        private $cidade;
        private $uf;

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getId(){
        return $this->id;
    }

    public function setRazaosocial($razaosocial){
        $this->razaosocial = $razaosocial;
        return $this;
    }

    public function getRazaosocial(){
        return $this->razaosocial;
    }

    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
        return $this;
    }

    public function getCnpj(){
        return $this->cnpj;
    }

    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
        return $this;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setCep($cep){
        $this->cep = $cep;
        return $this;
    }

    public function getCep(){
        return $this->cep;
    }

    public function setRua($rua){
        $this->rua = $rua;
        return $this;
    }

    public function getRua(){
        return $this->rua;
    }

    public function setNumero($numero){
        $this->numero = $numero;
        return $this;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setComplemento($complemento){
        $this->complemento = $complemento;
        return $this;
    }

    public function getComplemento(){
        return $this->complemento;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
        return $this;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
        return $this;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function setUf($uf){
        $this->uf = $uf;
        return $this;
    }

    public function getUf(){
        return $this->uf;
    }

    public function getFornecedor(){
        $pdo = Conexao::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM fornecedores WHERE razaosocial = :razaosocial AND cnpj = :cnpj AND nome = :nome AND telefone = :telefone AND email = :email AND cep = :cep AND rua = :rua AND numero = :numero AND complemento = :complemento AND bairro = :bairro AND cidade = :cidade AND uf = :uf");
        $stmt->bindValue(':razaosocial', $this->getRazaosocial());
        $stmt->bindValue(':cnpj', $this->getCnpj());
        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':telefone', $this->getTelefone());
        $stmt->bindValue(':email', $this->getEmail());
        $stmt->bindValue(':cep', $this->getCep());
        $stmt->bindValue(':rua', $this->getRua());
        $stmt->bindValue(':numero', $this->getNumero());
        $stmt->bindValue(':complemento', $this->getComplemento());
        $stmt->bindValue(':bairro', $this->getBairro());
        $stmt->bindValue(':cidade', $this->getCidade());
        $stmt->bindValue(':uf', $this->getUf());
        $stmt->execute();
        $return = $stmt->fetch();
        print_r ($return);
    }
}