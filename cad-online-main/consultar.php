<?php
require 'Controllers/FornecedoresController.php';

$cnpj = null;
$fornecedores = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cnpj = $_POST['cnpj'];
    $controller = new FornecedoresController();
    $fornecedores = $controller->consultarFornecedorPorCnpj($cnpj);
}

$icon_editar = '<i class="fa-solid fa-pen-to-square fa-lg" style="color: #00d921;"></i>';
$icon_excluir = '<i class="fa-solid fa-trash-can" style="color: #ff0000;"></i>';
$icon_lupa = '<i class="fa-solid fa-magnifying-glass"></i>';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/pages1.css">
</head>
<body>
<div>
    <div class="cont">
        <h1>CAD-ONLINE</h1>
        <h2>CONSULTAR FORNECEDORES</h2>
        <div class="b-rel">
            <a href="menu.php" class="ult">Menu</a>
            <a href="relatorio.php" class="ult">Relatorio</a>
        </div>

        <form method="post" class="mb-consult">
            <label for="cnpj">CNPJ do Fornecedor: </label>
            <input type="text" name="cnpj" id="cnpj" required autofocus0,>
            <input type="submit" value="Pesquisar">
        </form>
            
            
    </div>

    <!-- Formulário de pesquisa -->
    

    <!-- Tabela para exibir os resultados -->
    <table class="table table-striped container">
        <thead>
            <tr>
                <th>Razão Social</th>
                <th>CNPJ</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>CEP</th>
                <th>Rua</th>
                <th>Numero</th>
                <th>Complemento</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>--#--</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($fornecedores) {
                foreach ($fornecedores as $fornecedor) {
                    echo "<tr>";
                    echo "<td>" . $fornecedor->getRazaoSocial() . "</td>";
                    echo "<td>" . $fornecedor->getCnpj() . "</td>";
                    echo "<td>" . $fornecedor->getNome() . "</td>";
                    echo "<td>" . $fornecedor->getTelefone() . "</td>";
                    echo "<td>" . $fornecedor->getEmail() . "</td>";
                    echo "<td>" . $fornecedor->getCep() . "</td>";
                    echo "<td>" . $fornecedor->getRua() . "</td>";
                    echo "<td>" . $fornecedor->getNumero() . "</td>";
                    echo "<td>" . $fornecedor->getComplemento() . "</td>";
                    echo "<td>" . $fornecedor->getBairro() . "</td>";
                    echo "<td>" . $fornecedor->getCidade() . "</td>";
                    echo "<td>" . $fornecedor->getUf() . "</td>";
                    echo "<td>";
                    echo "<a href=editar_fornecedor.php?id=". $fornecedor->getId().">".$icon_editar."</a>";
                    echo "<a href=javascript:void(0);" . "onclick=confirmarExclusao(".$fornecedor->getId().")".$icon_excluir."</a>";
                    echo "</td>";
                    echo "</tr>";

                }
            }
            ?>
        </tbody>
    </table>
</div>



<script>
    function confirmarExclusao(id) {
        if (confirm("Tem certeza que deseja excluir este fornecedor?")) {
            window.location.href = "excluir_fornecedor.php?id=" + id;
        }
    }
</script>



<script src="https://kit.fontawesome.com/d709ea726d.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
