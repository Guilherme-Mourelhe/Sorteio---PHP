<?php
include "header.php";
?>

<!-- LOGIN DE CLIENTES PARA ACESSAR O CADASTRO DE CUPONS. -->

<style>
  .login {
    width: 500px;
    margin: 0 auto;
    text-align: center;
    padding: 30px;
    background-color: #f2f2f2;
  }

  form label {
    font-size: 18px;
    font-weight: bold;
    margin-top: 20px;
    display: block;
  }

  form input[type="text"], form input[type="password"] {
    width: 60%;
    height: 35px;
    margin-top: 10px;
    padding: 5px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }

  form input[type="submit"] {
    width: 20%;
    height: 40px;
    margin-top: 20px;
    font-size: 18px;
    border-radius: 5px;
    border: none;
    background-color: #4CAF50;
    color: #fff;
    cursor: pointer;
  }
</style>

<div class="login">
  <form name="login" id="login" action="processa.php" method="post">
    
    <label>CPF:</label>
    <br>
    <input type="text" name="cpflogin" id="cpflogin" maxlength="14" placeholder="Ex: 376.862.190-90">

    <label>Digite sua senha:</label>
    <br>

    <input type="password" name="senhalogin" id="senhalogin" maxlength="14">
    <br>

    <input type="submit" name = "enviarLogin" id = "enviarLogin" value="Entrar">
  </form>
</div>
