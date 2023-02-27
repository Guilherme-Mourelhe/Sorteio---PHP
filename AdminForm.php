<?php
include "header.php";
?>
<!-- LOGIN DE ADMINISTRADOR PARA ACESSAR A AREA DO ADMIN, O LOGIN É ÚNICO. -->
<style>
.AdminMenu {
    text-align: center;
    padding: 20px;
    background-color: #F2F2F2;
    border-radius: 10px;
    margin-bottom: 20px;
}

.AdminForm {
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #FFFFFF;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px #BBBBBB;
}

.AdminForm label {
    font-size: 18px;
    margin-bottom: 10px;
}

.AdminForm input[type="text"], 
.AdminForm input[type="password"] {
    width: 50%;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #BBBBBB;
    margin-bottom: 20px;
}

.EnviarC {
    margin-top: 20px;
}
</style>


<div class="AdminMenu">
<h2> PAINEL ADMINISTRATIVO </h2>
</div>

<div class = AdminForm>
    <form name = "AdminForm" id = "AdminForm" action = "processa.php" method = "post">


    <label> Usuário </label>
        <br>
        <input type="text" name="AdminUser" id="AdminUser" maxlength="20">

        <br>
        <br>

        <label> Senha de administrador </label>
        <br>
        <input type="password" name="senhaAdmin" id="senhaAdmin" maxlength="14">
        
        <br>
        <br>

        <div class = EnviarC>
        <input type = "submit" name = "Entrar" id = "Entrar" value = "Entrar" style = "width: 150px; height: 34px; border-radius: 16px;">
        </div>

    </form>

</div>


<?php
include "footer.php";
?>