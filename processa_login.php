<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se o arquivo de usuários existe
    if (!file_exists("usuarios.txt")) {
        echo "<div class='erro'>Erro: Nenhum usuário cadastrado!</div>";
        header("refresh:2;url=login.php");
        exit();
    }

    // Lê o arquivo de usuários
    $usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES);

    // Verifica se o email e senha correspondem a algum registro
    foreach ($usuarios as $linha) {
        if (strpos($linha, "user: $email / senha: $senha") !== false) {
            $_SESSION['usuario'] = $email;
            header("Location: dashboard.php");
            exit();
        }
    }

    // Se não encontrou, exibe erro e redireciona para login.php
    echo "
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f8f8f8;
        }
        .erro {
            color: red;
            font-size: 18px;
            font-weight: bold;
            background: #ffe6e6;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
    <div class='erro'>Usuário ou senha incorretos! Redirecionando...</div>";
    
    header("refresh:2;url=login.php"); // Redireciona após 2 segundos
    exit();
}
?>
