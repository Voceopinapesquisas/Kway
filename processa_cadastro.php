<?php
session_start();
include "saldo.php"; // Inclui funções de saldo

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    if (!file_exists("usuarios.txt")) {
        file_put_contents("usuarios.txt", "");
    }

    $usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES);

    // Verifica se o e-mail já está cadastrado
    foreach ($usuarios as $linha) {
        if (strpos($linha, "user: $email /") !== false) {
            echo "<script>alert('E-mail já cadastrado!'); window.location.href='cadastro.php';</script>";
            exit();
        }
    }

    // Adiciona o usuário ao arquivo de usuários
    file_put_contents("usuarios.txt", "user: $email / senha: $senha / nome: $nome\n", FILE_APPEND);

    // Define saldo inicial do usuário como 0
    adicionarSaldo($email, 0.00);

    // Se foi convidado, adiciona saldo ao padrinho
    if (isset($_GET['ref'])) {
        $padrinho = urldecode($_GET['ref']);
        adicionarSaldo($padrinho, 5.00); // Dá R$5 ao padrinho
    }

    echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='login.php';</script>";
    exit();
}
?>
