<?php

session_start();

if (!isset($_SESSION["User"])){
    header('Location: login.php?erro=notlogged');
    echo "Usuário não está logado";
    exit;
}