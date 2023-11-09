<?php

require_once __DIR__ . '/../Model/Fornecedores.php';
require_once __DIR__ . "/../config/Conexao.php";

/* require __DIR__ . "/../dao/fornecedorDAO.php"; */



class FornecedoresController {
    public function criarFornecedor(Fornecedores $fornecedor) {
        $pdo = Conexao::getConnection();
        

    /*     $fornecedorDAO = new FornecedorDAO();
        $response = $fornecedorDAO->getFornecedor($fornecedor->getRazaosocial(), $fornecedor->getCnpj(), $fornecedor->getNome(), $fornecedor->getTelefone(), $fornecedor->getEmail(), $fornecedor->getCep(), $fornecedor->getRua(), $fornecedor->getNumero(), $fornecedor->getComplemento(), $fornecedor->getBairro(), $fornecedor->getCidade(), $fornecedor->getUf(),); *//* estava aqui */

        $stmt = $pdo->prepare("INSERT INTO fornecedores (razaosocial, cnpj, nome, telefone, email, cep, rua, numero, complemento, bairro, cidade, uf) VALUES (:razaosocial, :cnpj, :nome, :telefone, :email, :cep, :rua, :numero, :complemento, :bairro, :cidade, :uf)");

        $stmt->bindParam(':razaosocial', $fornecedor->getRazaosocial());
        $stmt->bindParam(':cnpj', $fornecedor->getCnpj());
        $stmt->bindParam(':nome', $fornecedor->getNome());
        $stmt->bindParam(':telefone', $fornecedor->getTelefone());
        $stmt->bindParam(':email', $fornecedor->getEmail());
        $stmt->bindParam(':cep', $fornecedor->getCep());
        $stmt->bindParam(':rua', $fornecedor->getRua());
        $stmt->bindParam(':numero', $fornecedor->getNumero());
        $stmt->bindParam(':complemento', $fornecedor->getComplemento());
        $stmt->bindParam(':bairro', $fornecedor->getBairro());
        $stmt->bindParam(':cidade', $fornecedor->getCidade());
        $stmt->bindParam(':uf', $fornecedor->getUf());
        
        

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Erro ao criar fornecedor: " . $stmt->errorInfo()[2];
            return false;
        }
    }

    public function listarFornecedores() {
       
        $pdo = Conexao::getConnection(); 
        $stmt = $pdo->query("SELECT * FROM fornecedores");
        $fornecedores = $stmt->fetchAll(PDO::FETCH_CLASS, "Fornecedores");
    
        return $fornecedores;
    }

    public function consultarFornecedorPorCnpj($cnpj) {
        $pdo = Conexao::getConnection();
        $cnpj = '%' . $cnpj . '%';
        $stmt = $pdo->prepare("SELECT * FROM fornecedores WHERE cnpj LIKE :cnpj");
        $stmt->bindParam(':cnpj', $cnpj);
        $stmt->execute();
        $fornecedores = $stmt->fetchAll(PDO::FETCH_CLASS, "Fornecedores");
        return $fornecedores;
    }

    public function FornecedorPorId($id) {

        $pdo = Conexao::getConnection(); 
        /* $fornecedorDAO = new FornecedorDAO(); */
        $sql = "SELECT * FROM fornecedores WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
       
        $stmt->execute();
    

        $fornecedorData = $stmt->fetch(PDO::FETCH_ASSOC);
        /* var_dump($fornecedorData); */ 
        /* ate aqui esta funcionando  */


    
        if ($fornecedorData) {
            $fornecedor = new Fornecedores();
            $fornecedor->setRazaosocial($fornecedorData['razaosocial'])
            ->setCnpj($fornecedorData['cnpj'])
            ->setNome($fornecedorData['nome'])
            ->setTelefone($fornecedorData['telefone'])
            ->setEmail($fornecedorData['email'])
            ->setCep($fornecedorData['cep'])
            ->setRua($fornecedorData['rua'])
            ->setNumero($fornecedorData['numero'])
            ->setComplemento($fornecedorData['complemento'])
            ->setBairro($fornecedorData['bairro'])
            ->setCidade($fornecedorData['cidade'])
            ->setUf($fornecedorData['uf'])
            ->setId($fornecedorData['id']);
            /* var_dump($fornecedor); */


            
            return $fornecedor;
            /* var_dump($fornecedor); */
            /* esta retornando null */
        } else {         
            return NULL;
        }
    }
    

    public function atualizarFornecedor(Fornecedores $fornecedor) {
        $pdo = Conexao::getConnection();
        /* $fornecedorDAO = new FornecedorDAO(); */
        $stmt = $pdo->prepare("UPDATE fornecedores SET razaosocial = :razaosocial, cnpj = :cnpj, nome = :nome, telefone = :telefone, email = :email, cep = :cep, rua = :rua, numero = :numero, complemento = :complemento, bairro = :bairro, cidade = :cidade, uf = :uf WHERE id = :id");
    
        $stmt->bindValue(':razaosocial', $fornecedor->getRazaosocial());
        $stmt->bindValue(':cnpj', $fornecedor->getCnpj());
        $stmt->bindValue(':nome', $fornecedor->getNome());
        $stmt->bindValue(':telefone', $fornecedor->getTelefone());
        $stmt->bindValue(':email', $fornecedor->getEmail());
        $stmt->bindValue(':cep', $fornecedor->getCep());
        $stmt->bindValue(':rua', $fornecedor->getRua());
        $stmt->bindValue(':numero', $fornecedor->getNumero());
        $stmt->bindValue(':complemento', $fornecedor->getComplemento());
        $stmt->bindValue(':bairro', $fornecedor->getBairro());
        $stmt->bindValue(':cidade', $fornecedor->getCidade());
        $stmt->bindValue(':uf', $fornecedor->getUf());
        $stmt->bindValue(':id', $fornecedor->getId());
    
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Erro ao atualizar fornecedor: " . $stmt->errorInfo()[2];
            return false;
        }
    }

    public function excluirFornecedor(Fornecedores $fornecedor) {
        $pdo = Conexao::getConnection();
        $stmt = $pdo->prepare("DELETE FROM fornecedores WHERE id = :id");
        $stmt->bindValue(':id', $fornecedor->getId());
    
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Erro ao excluir fornecedor: " . $stmt->errorInfo()[2];
            return false;
        }
    } 

    
}