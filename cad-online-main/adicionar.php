<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Fornecedor</title>
    <link rel="stylesheet" href="estilos/pages1.css">
</head>

<body>
    <div class="cont">
        <h1>CAD-ONLINE</h1>
        <h2>ADICIONAR FORNECEDOR</h2>
        <p class="subtitulo">Preencha todos os campos abaixo:</p>
    </div>
        <main>
            <form action="server/processa_insercao.php" method="post">
                <div class="column-container">
                    <div class="first_col">
                        <label for="razaosocial">Razão Social: </label> <input type="text" name="razaosocial" id="razaosocial" required>    

                        <label for="cnpj">CNPJ: </label> <input type="text" name="cnpj" id="cnpj " required oninput="mascaraCnpj(this)">

                        <label for="telefone">Telefone: </label> <input type="tel" name="telefone" id="telefone" required>

                        <label for="email">E-mail: </label> <input type="email" name="email" id="email" required>

                
                    </div>

                    <div class="sec_col">
                        <label for="cep">CEP: </label> <input type="text" name="cep" id="cep" required oninput="buscarCep()" onkeyup="cepMascara(event)">

                        <label for="numero">Numero: </label> <input type="number" name="numero" id="numero" required>
                        
                        <label for="rua">Rua: </label> <input type="text" name="rua" id="rua" required>

                        <label for="bairro">Bairro: </label> <input type="text" name="bairro" id="bairro" required>

                        
                    </div>
                    
                    <div class="terc_col">

                        <label for="cidade">Cidade: </label> <input type="text" name="cidade" id="cidade" required>

                        <label for="uf">UF: </label> <input type="text" name="uf" id="uf" required>

                        <label for="complemento">Complemento: </label> <input type="text" name="complemento" id="complemento">

                        <label for="nome">Nome Contato: </label> <input type="text" name="nome" id="nome" required>
                    </div>
                </div>

                <div class="botcadastrar">
                    <p class="container">
                        <input id="button" type="submit" value="Cadastrar!">
                    </p>
                </div>


                <p class="voltar">
                    <a href="menu.php" class="ult">Voltar</a>
                </p>

            </form>
        </main>
        
    


    <script>
    function buscarCep() {
        let cep = document.getElementById('cep').value;
        cep = cep.replace(/\D/g, ''); // tirando os caracteres todos os caracteres não numéricos

        if (cep.length === 8) {
            const url = "https://viacep.com.br/ws/" + cep + "/json/";

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.erro) {
                        alert('CEP não encontrado');
                    } else {
                        document.getElementById('rua').value = data.logradouro;
                        document.getElementById('bairro').value = data.bairro;
                        document.getElementById('cidade').value = data.localidade;
                        document.getElementById('uf').value = data.uf;
                    }
                })
        }
    }


    const cepMascara = (event) => {
        let input = event.target
        input.value = zipcepMascara(input.value)
    }

    const zipcepMascara = (value) => {
        if (!value) return ""
        value = value.replace(/\D/g, '')
        value = value.replace(/(\d{5})(\d)/, '$1-$2')
        return value
    }

    function mascaraCnpj(input) {
    let value = input.value;
    value = value.replace(/\D/g, ''); // Remove caracteres não numéricos
    let formattedCnpj = "";

    for (let i = 0; i < value.length; i++) {
        formattedCnpj += value[i];
        if (i === 1 || i === 4) {
            formattedCnpj += ".";
        } else if (i === 7) {
            formattedCnpj += "/";
        } else if (i === 11) {
            formattedCnpj += "-";
        }
    }

    input.value = formattedCnpj;
}
    </script>

    

</body>

</html>