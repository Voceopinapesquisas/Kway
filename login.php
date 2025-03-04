<?php
session_start();
session_destroy(); // Garante que a sessão sempre será encerrada ao acessar a página
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kwai</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .logo {
            width: 150px;
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #ff6600;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #ff6600;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #e65c00;
        }

        .link {
            margin-top: 15px;
            font-size: 14px;
        }

        .link a {
            color: #ff6600;
            text-decoration: none;
            font-weight: bold;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="https://cdn-static.kwai.net/kos/s101/nlav11312/kwai-nuxt-pwa-pc-online/img/kwaiLogo@2.e9a678e.png" alt="Kwai Logo" class="logo">
        <h2>Faça seu login</h2>
        <p>E ganhe 5 reais por pessoa convidada!</p>
        <?php
        if (isset($_GET['erro'])) {
            echo "<p style='color: red;'>E-mail ou senha inválidos!</p>";
        }
        ?>
        <form action="processa_login.php" method="POST">
            <input type="email" name="email" placeholder="Digite seu e-mail" required>
            <input type="password" name="senha" placeholder="Digite sua senha" required>
            <button type="submit" class="btn">Entrar</button>
        </form>
        <div class="link">
            Ainda não tem uma conta? <a href="cadastro.php">Cadastre-se</a>
        </div>
    </div>
</body>
</html>
