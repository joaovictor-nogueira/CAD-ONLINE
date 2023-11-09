<?php

require_once __DIR__ . '/config/Conexao.php';
require __DIR__ . '/Controllers/FornecedoresController.php';




if (isset($_GET['id'])) {
    $fornecedorId = $_GET['id'];

    $fornecedoresController = new FornecedoresController();
    $fornecedor = new Fornecedores();


    $fornecedor->setId($fornecedorId);

    
    if ($fornecedoresController->excluirFornecedor($fornecedor)) {
        /* se for bem sucedido ira mandar para o relatorio dnv */
        header("Location: relatorio.php");
        exit();
    } else {
        /* colocar algo caso der algum erro */
        echo "Erro ao excluir o fornecedor.";
    }
} else {
    /* caso o id estivr incorreto */
    /* redirecionar ou mandar msg de erro */
    echo "ID do fornecedor não especificado.";
}
?>


