<?php


require __DIR__ . "/Model/Fornecedores.php";
require __DIR__ . "/Controllers/FornecedoresController.php";

$responseFornecedor = new Fornecedores();
$responseFornecedoresController = new FornecedoresController();

if (isset($_GET['id'])) {


    $responseFornecedor->setId($_GET['id']);


    $responseFornecedor = $responseFornecedoresController->FornecedorPorId($_GET['id']);

} else {

    echo "nao foi achado fornecedor";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Fornecedor</title>
    <link rel="stylesheet" href="estilos/pages1.css">
</head>

<body>
<div class="cont">
        <h1>CAD-ONLINE</h1>
        <h2>ATUALIZAR FORNECEDOR</h2>
        <p class="subtitulo">Atualize os campos abaixo:</p>
    </div>

    <main>
        <form method="post" action="server/salvar_edicao.php">
            <div class="column-container">
                <div class="first_col">
                    <label for="razaosocial"></label>Razao social:<input type="text" name="razaosocial" value="<?php echo $responseFornecedor->getRazaosocial(); ?>">   

                    <label for="cnpj">CNPJ: </label><input type="text" name="cnpj" value="<?php echo $responseFornecedor->getCnpj(); ?>">

                    <label for="telefone">Telefone: </label><input type="tel" name="telefone" value="<?php echo $responseFornecedor->getTelefone(); ?>">

                    <label for="email">E-mail: </label><input type="email" name="email" value="<?php echo $responseFornecedor->getEmail(); ?>">

                        
                </div>

                <div class="sec_col">
                    <label for="cep">CEP: </label><input type="text" name="cep" value="<?php echo $responseFornecedor->getCep(); ?>">

                    <label for="numero">Numero: </label> <input type="number" name="numero" value="<?php echo $responseFornecedor->getNumero(); ?>">

                    <label for="rua">Rua: </label><input type="text" name="rua" value="<?php echo $responseFornecedor->getRua(); ?>">

                    <label for="bairro">Bairro: </label> <input type="text" name="bairro" value="<?php echo $responseFornecedor->getBairro(); ?>">

                        

                </div>
                    
                <div class="terc_col">

                    <label for="cidade">Cidade: </label><input type="text" name="cidade" value="<?php echo $responseFornecedor->getCidade(); ?>">

                    <label for="uf">UF: </label><input type="text" name="uf" value="<?php echo $responseFornecedor->getUf(); ?>">

                    <label for="complemento">Complemento:  </label><input type="text" name="complemento" value="<?php echo $responseFornecedor->getComplemento(); ?>">

                    <label for="nome">Nome Contato: </label><input type="text" name="nome" value="<?php echo $responseFornecedor->getNome(); ?>">
                    <input type="hidden" name="id" value="<?php echo $responseFornecedor->getId(); ?>">
                </div>
            </div>


                <div class="botcadastrar">
                    <p class="container">
                        <button type="submit">ATUALIZAR!</button>
                    </p>
                </div>


                <p class="voltar">
                    <a href="relatorio.php" class="ult">Voltar </a>
                </p>

        </form>
    </main>

</body>

</html>