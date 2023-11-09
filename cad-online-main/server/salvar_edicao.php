<?php
require __DIR__ . "/../Model/Fornecedores.php";
require __DIR__ . "/../Controllers/FornecedoresController.php";

$objFornecedor = new Fornecedores();
$objFornecedoresController = new FornecedoresController();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fornecedorId = $_POST['id'];
    

   

    /* echo $_POST['razaosocial']; */
    // $responseFornecedores = $fornecedoresController->FornecedorPorId($fornecedorId);
    $objFornecedor->setRazaosocial($_POST['razaosocial'])
    ->setCnpj($_POST['cnpj'])
    ->setNome($_POST['nome'])
    ->setTelefone($_POST['telefone'])
    ->setEmail($_POST['email'])
    ->setCep($_POST['cep'])
    ->setRua($_POST['rua'])
    ->setNumero($_POST['numero'])
    ->setComplemento($_POST['complemento'])
    ->setBairro($_POST['bairro'])
    ->setCidade($_POST['cidade'])
    ->setUf($_POST['uf'])
    ->setId($_POST['id']);
    /* var_dump($fornecedorId); */

    $responseFornecedores = $objFornecedoresController->atualizarFornecedor($objFornecedor);
    header("Location: ../relatorio.php");
    
}else{
    echo "nao atualizado";
}

?>
