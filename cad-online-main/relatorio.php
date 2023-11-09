<?php

require_once __DIR__ . "/config/Conexao.php";

require __DIR__ . "/Model/Fornecedores.php";
require __DIR__ . "/Controllers/FornecedoresController.php";

/* Conectando com o banco de dados */
$pdo = Conexao::getConnection();
$fornecedoresController = new FornecedoresController();
$fornecedores = $fornecedoresController->listarFornecedores();


$icon_editar = '<i class="fa-solid fa-pen-to-square fa-lg" style="color: #00d921;"></i>';
$icon_excluir = '<i class="fa-solid fa-trash-can" style="color: #ff0000;"></i>';



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/pages1.css">

</head>

<body>

    <div class="relat">
        <div class="cont">
            <h1>CAD-ONLINE</h1>
            <h2>LISTA DE FORNECEDORES</h2>
            <p class="subtitulo">Caso deseje consultar por CNPJ ou voltar para o Menu:</p>
            <div class="b-rel">
                <a href="menu.php" class="ult">Menu</a>
                <a href="consultar.php" class="ult">Consultar</a>
            </div>
            
            
        </div>
        
        
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
                <?php foreach ($fornecedores as $fornecedor) : ?>
                    <tr>
                        <td><?php echo $fornecedor->getRazaosocial(); ?></td>
                        <td><?php echo $fornecedor->getCnpj(); ?></td>
                        <td><?php echo $fornecedor->getNome(); ?></td>
                        <td><?php echo $fornecedor->getTelefone(); ?></td>
                        <td><?php echo $fornecedor->getEmail(); ?></td>
                        <td><?php echo $fornecedor->getCep(); ?></td>
                        <td><?php echo $fornecedor->getRua(); ?></td>
                        <td><?php echo $fornecedor->getNumero(); ?></td>
                        <td><?php echo $fornecedor->getComplemento(); ?></td>
                        <td><?php echo $fornecedor->getBairro(); ?></td>
                        <td><?php echo $fornecedor->getCidade(); ?></td>
                        <td><?php echo $fornecedor->getUf(); ?></td>
                        <td>
                            <a href="editar_fornecedor.php?id=<?php echo $fornecedor->getId(); ?>"><?php echo $icon_editar; ?></a>
                            <a href="javascript:void(0);" onclick="confirmarExclusao(<?php echo $fornecedor->getId(); ?>);"><?php echo $icon_excluir; ?></a>
                        </td>

                    </tr>
                <?php endforeach; ?>
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