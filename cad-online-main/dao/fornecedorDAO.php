<?php

require __DIR__ . "/../config/Conexao.php";

class FornecedorDAO{
    public function getFornecedor($razaosocial, $cnpj, $nome, $telefone, $email, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf){
        $pdo = Conexao::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM fornecedores WHERE razaosocial = :razaosocial AND cnpj = :cnpj AND nome = :nome AND telefone = :telefone AND email = :email AND cep = :cep AND rua = :rua AND numero = :numero AND complemento = :complemento AND bairro = :bairro AND cidade = :cidade AND uf = :uf");
        $stmt->bindValue(':razaosocial', $razaosocial);
        $stmt->bindValue(':cnpj', $cnpj);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':telefone', $telefone);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':cep', $cep);
        $stmt->bindValue(':rua', $rua);
        $stmt->bindValue(':numero', $numero);
        $stmt->bindValue(':complemento', $complemento);
        $stmt->bindValue(':bairro', $bairro);
        $stmt->bindValue(':cidade', $cidade);
        $stmt->bindValue(':uf', $uf);
        $stmt->execute();
        $response = $stmt->fetch(PDO::FETCH_ASSOC);

        return $response;
    }
}