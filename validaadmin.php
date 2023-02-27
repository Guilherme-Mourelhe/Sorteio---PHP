<?php

session_start();

if (!isset($_SESSION["UserAdmin"])) {
    header('Location: AdminForm.php?erro=notlogged');
    echo "Login de administrador incorreto";
    exit;
}
