<?php
include "header.php";
include_once ('validaadmin.php');
?>

<!-- FAZER A VALIDAÇÃO SE O LOGIN DO ADMIN ESTÁ CORRETO PARA ACESSAR ESSA ÁREA. -->
<div class="AdminMenu">
    <h2> PAINEL ADMINISTRATIVO </h2>
</div>

<div class="container">
    <form name="AdminOpt" id="AdminOpt" action="processa.php" method="post">

        <label style="display: inline-block; width: 200px;"> Deseja listar todos os usuários? </label>
        <div class="EnviarC" style="display: inline-block;">
            <input type="submit" name="ListarUser" id="ListarUser" value="Listar" style="width: 100px; height: 24px; border-radius: 10px;">
        </div>
        <br>
        <br>

        <label style="display: inline-block; width: 200px;"> Pesquisar cupom por CPF: </label>
        <div class="EnviarC" style="display: inline-block;">
            <input type = "text" name = "pesquisarcpf" id = "pesquisarcpf" maxlength="14">
            <input type="submit" name="pesquisarcupom" id="pesquisarcupom" value="Pesquisar" style="width: 100px; height: 24px; border-radius: 10px;">
        </div>
        <br>
        <br>

        <label style="display: inline-block; width: 200px;"> Deseja listar todos os números da sorte até o momento? </label>
        <div class="EnviarC" style="display: inline-block;">
            <input type="submit" name="ListarNum" id="ListarNum" value="Listar" style="width: 100px; height: 24px; border-radius: 10px;">
        </div>
        <br>
        <br>

        <label style="display: inline-block; width: 200px;"> SORTEAR: </label>
        <div class="EnviarC" style="display: inline-block;">
            <input type="submit" name="Sortear" id="Sortear" value="SORTEAR" style="width: 110px; height: 30px; border-radius: 20px; background-color: #FFA500; color: white; font-size: 18px;">
        </div>

    </form>
</div>

<?php
include "footer.php";
?>