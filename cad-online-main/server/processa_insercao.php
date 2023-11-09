<?php
require_once __DIR__ . '/../Controllers/FornecedoresController.php';
require_once __DIR__ . '/../Model/Fornecedores.php';

$controller = new FornecedoresController();
$fornecedor = new Fornecedores();


$fornecedor->setRazaosocial($_POST['razaosocial']);
$fornecedor->setCnpj($_POST['cnpj']);
$fornecedor->setNome($_POST['nome']);
$fornecedor->setTelefone($_POST['telefone']);
$fornecedor->setEmail($_POST['email']);
$fornecedor->setCep($_POST['cep']);
$fornecedor->setRua($_POST['rua']);
$fornecedor->setNumero($_POST['numero']);
$fornecedor->setComplemento($_POST['complemento']);
$fornecedor->setBairro($_POST['bairro']);
$fornecedor->setCidade($_POST['cidade']);
$fornecedor->setUf($_POST['uf']);


if ($controller->criarFornecedor($fornecedor)) {
    
    /* mensagem de bem sucedido */
    header("Location: ../menu.php");
    exit();
} else {
    /* falha na inserção */
    echo "Falha ao inserir fornecedor.";
}
