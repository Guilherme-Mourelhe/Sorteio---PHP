<?php 

// Parte do código onde é realizada a conexão com o banco de dados.
// A variável conexão recebe uma função php com os parâmetros necessários para acessar o servidor.

$servidor = "127.0.0.1";
$usuario = "root";
$senha = "";
$banco = "sistema_sorteio";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if(!$conexao) {
    die("<h3> Não foi possível estabelecer conexão." . mysqli_connect_error());
}

?>