<?php

include "ConexaoBd.php";
$controle = 0;
//  PARTE DO CÓDIGO QUE REALIZA O LOGIN DE ADMINISTRADOR.
if (isset($_POST["Entrar"])) {
    // Pegando o input do usuário através do método POST.
    $AdminUser = isset($_POST["AdminUser"]) ? $conexao->real_escape_string($_POST["AdminUser"]) : "";
    $SenhaAdmin = isset($_POST["senhaAdmin"]) ? $conexao->real_escape_string($_POST["senhaAdmin"]) : "";

    //Operação que será realizada na consulta SQL.
    $sql_oper = "SELECT * FROM adminuser WHERE Usuario = '$AdminUser' AND Senha = '$SenhaAdmin'";

    // Consulta feita para buscar colunas que atendam a condição da variável $sql_oper.
    $result = $conexao->query($sql_oper);

    // Método usado para informar quantas linhas retornaram na consulta feita pela variável $result.
    $qtd = $result->num_rows;

    //O login de administrador é fixo, logo se houver apenas um retorno significa que o login está correto.
    if ($qtd == 1) {

        // Método utilizado para criar um array associativo na variável $usuario.
        $usuario = $result->fetch_assoc();

        if (!isset($_SESSION["UserAdmin"])) {
            session_start();
            $_SESSION["UserAdmin"] = $usuario["Usuario"];
        }

        header("Location: AdminArea.php");
        exit;
    } else {
        echo "Usuário e senha de administrador incorretos!";
    }
}


// PARTE DO CÓDIGO QUE REALIZA O CADASTRO DO CLIENTE.
if($controle == 0){
if (isset($_POST["EnviarC"])) {

    


    // Pegando o input do usuário através do método POST.
    $cpf = isset($_POST["cpf"]) ? $conexao->real_escape_string($_POST["cpf"]) : "";
    $nome = isset($_POST["nome"]) ? $conexao->real_escape_string($_POST["nome"]) : "";
    $nascimento = isset($_POST["datanasc"]) ? $conexao->real_escape_string($_POST["datanasc"]) : "";
    $senha = isset($_POST["senhaUser"]) ? $conexao->real_escape_string($_POST["senhaUser"]) : "";
    $sexo = isset($_POST["sexo"]) ? $conexao->real_escape_string($_POST["sexo"]) : "";


    // Operação que será realizada para verificar se o cpf ja foi cadastrado anteriormente.
    $sql_oper = "SELECT * FROM clientes WHERE cpf = '$cpf'";
    //Resultado da operação.
    $result = $conexao->query($sql_oper);
    // Método usado para informar quantas linhas retornaram na consulta feita pela variável $result.
    $qtd = $result->num_rows;

    if ($qtd == 1) {

        echo "CPF já está cadastrado! <br>";
        echo "<a href = 'cadastro.php'> Tentar novamente </a>";
    } else {
        // Operação que será realizada na consulta SQL.
        $sqlInserir = "INSERT INTO clientes ( cpf, nome, genero, nascimento, senha) VALUES ('$cpf', '$nome', '$sexo', '$nascimento', '$senha' )";

        // Consulta SQL
        $conexao->query($sqlInserir);

        //Iniciando a sessão do cliente
        if (!isset($_SESSION["User"])) {
            session_start();
            $_SESSION["User"] = $cpf;
        }
        //Leva o cliente para a área logada.
        header("Location: AreaRestrita.php");
    }
}
}else{
    echo "Não é possível inserir novos clientes ou cupons, pois o sorteio já foi realizado";
}



// PARTE DO CÓDIGO QUE REALIZA O LOGIN DO CLIENTE.
if($controle == 0){
if (isset($_POST["enviarLogin"])) {
    // Pegando o input do usuário através do método POST.
    $cpflogin = isset($_POST["cpflogin"]) ? $conexao->real_escape_string($_POST["cpflogin"]) : "";
    $senha = isset($_POST["senhalogin"]) ? $conexao->real_escape_string($_POST["senhalogin"]) : "";

    $sql_oper = "SELECT * FROM clientes WHERE cpf = '$cpflogin'";

    $result = $conexao->query($sql_oper);

    $qtd = $result->num_rows;

    if ($qtd == 1) {
        header("Location: AreaRestrita.php");

        if (!isset($_SESSION["User"])) {
            session_start();
            $_SESSION["User"] = $cpflogin;
        }
        exit;
    } else {
        echo "Dados de login incorretos.";
        echo "<br>";
        echo "<a href = 'login.php'> Tentar novamente </a>";
    }
}
}else{
    echo "Não é possível inserir novos clientes ou cupons, pois o sorteio já foi realizado";
}

//PARTE DO CÓDIGO QUE REALIZA O CADASTRO DO CUPOM ATENDENDO AS CONDIÇÕES ESPECIFICADAS NO ENUNCIADO DO EXERCÍCIO.

if (isset($_POST["cadastrarcupom"])) {
    // Pegando o input do usuário através do método POST.
    $codigo = isset($_POST["codcupom"]) ? $conexao->real_escape_string($_POST["codcupom"]) : "";
    $cpfCupon = isset($_POST["vincCpf"]) ? $conexao->real_escape_string($_POST["vincCpf"]) : "";
    $valor = isset($_POST["valor"]) ? $conexao->real_escape_string($_POST["valor"]) : "";
    $loja = isset($_POST["nomeloja"]) ? $conexao->real_escape_string($_POST["nomeloja"]) : "";
    $datacompra = isset($_POST["data"]) ? $conexao->real_escape_string($_POST["data"]) : "";
    $hora = isset($_POST["hora"]) ? $conexao->real_escape_string($_POST["hora"]) : "";

    // Operação que será realizada para verificar se o cupom ja foi cadastrado anteriormente.
    $sql_oper = "SELECT * FROM cupons WHERE code = '$codigo' AND clientes_cpf = (SELECT id FROM clientes WHERE cpf = '$cpfCupon') AND data_compra = '$datacompra'";

    //Operação realizada para verificar se o cupom já foi cadastrado anteriormente.
    $sql_operC = "SELECT * FROM cupons WHERE code = '$codigo'";
    $resultC = $conexao->query($sql_operC);
    $qtdC = $resultC->num_rows;

    //Resultado da operação.
    $result = $conexao->query($sql_oper);
    // Método usado para informar quantas linhas retornaram na consulta feita pela variável $result.
    $qtd = $result->num_rows;
    // Variável criada para controlar o estado do cupom.
    $status = "";

    //Verificação e cadastro do cupom.
    if ($qtd == 1) {
        $status = "Invalido";

        //Inserção no banco de dados com o status inválido.
        $sql_oper2 = "INSERT INTO cupons (code, clientes_cpf, valor, loja, hora, data_compra, status) VALUES ('$codigo', (SELECT id FROM clientes WHERE cpf = '$cpfCupon'), '$valor', '$loja', '$hora', '$datacompra', '$status')";
        $result2 = $conexao->query($sql_oper2);

        echo "<h3 style='color:red'>STATUS: " . $status . "</h3><br>";
        echo "<p style='color:red'>Verifique se os dados inseridos estão corretos e se o CPF do cupom é o mesmo do login de sua conta, o valor do cupom não será contabilizado no sorteio.</p>";
        echo "<br>";
        echo "<a href = 'AreaRestrita.php'> Cadastrar mais cupons? </a>";
    } else {
        $status = "Valido";

        //verificando se o cpf do cupom é o mesmo da área logada.
        session_start();
        if ($_SESSION["User"] != $cpfCupon) {
            $status = "Invalido";
        }

        if ($qtdC > 0) {
            $status = "Invalido";
        }

        //Inserção no banco de dados com o status válido.
        $sql_oper2 = "INSERT INTO cupons (code, clientes_cpf, valor, loja, hora, data_compra, status) VALUES ('$codigo', '$cpfCupon', '$valor', '$loja', '$hora', '$datacompra', '$status')";
        $result2 = $conexao->query($sql_oper2);

        if ($status == "Invalido") {
            echo "<h3 style='color:red'>STATUS: " . $status . "</h3><br>";
            echo "<p style='color:red'>Verifique se os dados inseridos estão corretos e se o CPF do cupom é o mesmo do login de sua conta, o valor do cupom não será contabilizado no sorteio.</p>";
            echo "<br>";
            echo "<a href = 'AreaRestrita.php'> Cadastrar mais cupons? </a>";
            echo "<br>";
        } else {
            echo "<h3 style='color:green'>STATUS: " . $status . "</h3><br>";
            echo "<br>";
            echo "<a href = 'AreaRestrita.php'> Cadastrar mais cupons? </a>";
            echo "<br>";
        }

        if ($status != "Invalido") {
            // Consulta o valor total dos cupons para determinado CPF
            $sql_cupon = "SELECT SUM(valor) as valor_total FROM cupons WHERE clientes_cpf = '$cpfCupon'";
            $resultCup = $conexao->query($sql_cupon);

            if ($resultCup->num_rows > 0) {
                $row = $resultCup->fetch_assoc();
                $valor_total = $row["valor_total"];

                // Verifica se o valor total é maior ou igual a R$ 300,00
                if ($valor_total >= 300) {
                    // Consulta se o número da sorte já foi gerado para esse valor total
                    $sql_num_sorte = "SELECT * FROM numero_sorte WHERE clientes_cpf = '$cpfCupon' AND valor_total = '$valor_total'";
                    $resultNS = $conexao->query($sql_num_sorte);

                    if ($resultNS->num_rows == 0) {
                        // Gera um número da sorte
                        $numero_sorte = rand(100000, 999999);

                        // Armazena o número da sorte no banco de dados
                        $sql_cupon = "INSERT INTO numero_sorte (clientes_cpf, valor_total, numero_s) VALUES ('$cpfCupon', '$valor_total', '$numero_sorte')";

                        if ($conexao->query($sql_cupon) === TRUE) {
                            echo "Número da sorte gerado com sucesso: $numero_sorte";
                        } else {
                            echo "Erro ao gerar o número da sorte: " . $conexao->error;
                        }
                    } else {
                        echo "Número da sorte já foi gerado para esse valor total";
                    }
                } else {
                    echo "Valor total ainda não atingiu R$ 300,00";
                }
            }
        }
    }
}

//PARTE DO CÓDIGO QUE REALIZA AS FUNÇÕES DO PAINEL ADMINISTRATIVO.


?>
<style>
    .listagem-clientes {
        font-family: Arial, sans-serif;
        margin: 20px 0;
    }

    .listagem-clientes h2 {
        font-size: 20px;
        text-align: center;
        margin-bottom: 20px;
    }

    .listagem-clientes p {
        font-size: 18px;
        margin-bottom: 10px;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }
</style>

<div class="listagem-clientes">
    <h2>Lista</h2>

    <?php
    if (isset($_POST["ListarUser"])) {

        $consulta = "SELECT * FROM clientes";

        $resultado_consulta = $conexao->query($consulta);

        while ($clientes = mysqli_fetch_assoc($resultado_consulta)) {
            echo "<p>" . $clientes["nome"] . "</p>";
        }
    }
    ?>
</div>
<div class="listagem-clientes">
    <?php

    if (isset($_POST["pesquisarcupom"])) {

        $pesquisacpf = isset($_POST["pesquisarcpf"]) ? $conexao->real_escape_string($_POST["pesquisarcpf"]) : "";


        $sql_consultacpf = "SELECT cpf, nome FROM clientes WHERE cpf = '$pesquisacpf'";
        $resultado_consultacpf = $conexao->query($sql_consultacpf);

        $cliente = mysqli_fetch_assoc($resultado_consultacpf);
        echo "<p>" . $cliente["nome"] . "</p>";
    }
    ?>
</div>

<div class="listagem-clientes">
    <?php

    if (isset($_POST["ListarNum"])) {
        $sql_consultanum = "SELECT numero_s FROM numero_sorte";
        $resultado_consultanum = $conexao->query($sql_consultanum);

        while ($numeros = mysqli_fetch_assoc($resultado_consultanum)) {
            echo "<p>" . $numeros["numero_s"] . "</p>";
        }
    }
    ?>
</div>

<?php



if (isset($_POST["Sortear"])) {

    $sql = "SELECT numero_s FROM numero_sorte";
    $result = $conexao->query($sql);

    $numeros_sorte = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $numeros_sorte[] = $row["numero_s"];
    }

    $numero_sorteado = $numeros_sorte[array_rand($numeros_sorte)];

    echo "O número sorteado é: " . $numero_sorteado;
    echo "<br>";
    echo "<a href = 'AdminArea.php'> Voltar para Painel Administrativo </a>";
    Csorteio();
}


  function Csorteio() {
    
    $GLOBALS['controle'] = "1";
  }
