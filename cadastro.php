<?php
include "header.php";
?>

<!-- CADASTRO DE CLIENTES PARA CONCORRER AO SORTEIO. -->
<style>
    .Mainform {
        margin: 50px auto;
        padding: 30px;
        width: 500px;
        background-color: #f2f2f2;
        border-radius: 10px;
    }

    label {
        font-weight: bold;
        font-size: 14px;
        margin-bottom: 10px;
        display: block;
    }

    input[type="text"],
    input[type="password"],
    input[type="date"],
    input[type="time"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .EnviarC {
        text-align: center;
        margin-top: 20px;
    }

    .radio {
        flex-direction: row;
        display: flex;
    }
</style>

<div class="Mainform">

    <form name="cadastro" id="cadastro" action="processa.php" method="post">

        <label>CPF:</label>
        <br>
        <input type="text" name="cpf" id="cpf" maxlength="14" placeholder="Ex: 376.862.190-90">

        <br>

        <label>Nome Completo:</label>
        <br>
        <input type="text" name="nome" id="nome" maxlength="40" placeholder="Ex: Luis Guilherme">

        <br>

        <label>Data de nascimento:</label>
        <br>
        <input type="date" name="datanasc" id="datanasc">

        <br>

        <label>Crie uma senha:</label>
        <br>
        <input type="password" name="senhaUser" id="senhaUser" maxlength="14">

        <br>

        <label>Informe o seu sexo:</label>

        <br>

        <div class="radio" style="display: flex; justify-content: center;">
            <input type="radio" name="sexo" id="sexo" value="Masculino">
            <label>Masculino</label>

            <input type="radio" name="sexo" id="sexo" value="Feminino">
            <label>Feminino</label>
        </div>


        <br>

        <div class="EnviarC">
            <input type="submit" name="EnviarC" id="EnviarC" value="Enviar">
        </div>

    </form>
</div>


<?php
include "footer.php";
?>