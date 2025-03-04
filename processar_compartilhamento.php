<?php
session_start();
include "saldo.php";

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];
adicionarSaldo($usuario, 5.00); // Adiciona R$5 ao saldo do usuário

header("Location: index.php?msg=Saldo atualizado!");
exit();
?>
