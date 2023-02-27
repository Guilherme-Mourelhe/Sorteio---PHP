<?php
include "header.php";
include_once ('validalogin.php');
?>
<!-- //Estilização -->

<style>
  .AdminMenu {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    padding: 20px;
  }

  .Mainform {
    margin: 40px;
    padding: 20px;
    background-color: #f2f2f2;
    border-radius: 10px;
  }

  label {
    font-size: 18px;
    font-weight: bold;
    display: block;
    margin-bottom: 10px;
  }

  input[type="text"],
  input[type="number"],
  input[type="date"],
  input[type="time"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 10px;
    border: 1px solid gray;
    font-size: 16px;
  }

  .cadastrarcup {
    text-align: center;
    margin-top: 20px;
  }

  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #3e8e41;
  }
</style>

<!-- AREA PARA CADASTRO DE CUPOM, RESTRITA PARA CLIENTES LOGADOS. -->

<div class="AdminMenu">
<h2> CARO CLIENTE, POR FAVOR REGISTRE O SEU CUPOM </h2>
</div>

<div class = Mainform>

    <form name = "cadastrocupom" id = "cadastrocupom" action = "processa.php" method = "post">

        <label> Insira o código do cupom: </label>
        <br>
        <input type="text" name="codcupom" id="codcupom" maxlength="10" placeholder="Ex: BGD6JAU2O0">

        <br>
        <br>

        <label> CPF vinculado: </label>
        <br>
        <input type="text" name = "vincCpf" id = "vincCpf" maxlength="14" placeholder="Ex: 376.862.190-90">

        <br>
        <br>

        <label> Valor em R$: </label>
        <br>
        <input type = "number" name = "valor" id = "valor">

        <br>
        <br>

        <label> Nome da loja: </label>
        <br>
        <input type = "text" name = "nomeloja" id = "nomeloja" maxlength="20">

        <br>
        <br>

        <label> Data da compra: </label>
        <br>
        <input type = "date" name = "data" id = "data" >

        <br>
        <br>

        <label> Hora da compra: </label>
        <br>
        <input type = "time" name = "hora" id = "hora" >

        <br>
        <br>

        <div class = cadastrarcup>
        <input type = "submit" name = "cadastrarcupom" id = "cadastrarcupom" value = "Registrar" style = "width: 150px; height: 34px; border-radius: 16px;">
        </div>

        <br>
        <br>


    </form>
</div>

<?php
include "footer.php"
?>