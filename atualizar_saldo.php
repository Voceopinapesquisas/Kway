<?php
session_start();
include "saldo.php"; // Inclui funções de saldo

if (!isset($_SESSION['usuario'])) {
    echo "Erro: Usuário não logado!";
    exit();
}

$usuario = $_SESSION['usuario'];
adicionarSaldo($usuario, 5.00); // Adiciona R$5 ao saldo do usuário

echo "Saldo atualizado com sucesso!";
?>
