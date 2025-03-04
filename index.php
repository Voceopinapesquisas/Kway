<?php
session_start();
include "saldo.php"; // Inclui a função de saldo

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$saldo = obterSaldo($usuario); // Obtém o saldo atualizado do usuário
$linkConvite = "https://seusite.com/cadastro.php?ref=" . urlencode($usuario);
$mensagem = "Ganhe R$5 ao se cadastrar no Kwai! Use meu link: $linkConvite";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convide e Ganhe</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function registrarCompartilhamento() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "atualizar_saldo.php", true);
            xhr.send();

            xhr.onload = function () {
                if (xhr.status == 200) {
                    alert("Você ganhou R$5 pelo compartilhamento!");
                    location.reload(); // Atualiza a página para exibir o saldo atualizado
                } else {
                    alert("Erro ao registrar compartilhamento.");
                }
            };
        }
    </script>
</head>
<body>
    <div class="container">
        <header>
            <img src="https://cdn-static.kwai.net/kos/s101/nlav11312/kwai-nuxt-pwa-pc-online/img/kwaiLogo@2.e9a678e.png" alt="Kwai Logo" class="logo">
        </header>
        <h1>Convide seus amigos e ganhe R$5! por amigo convidado.</h1>
        <p>Compartilhe seu link de convite:</p>
        
        <a href="https://api.whatsapp.com/send?text=<?php echo urlencode($mensagem); ?>" target="_blank" class="whatsapp-btn" onclick="registrarCompartilhamento()">📱 Compartilhar no WhatsApp</a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($linkConvite); ?>" target="_blank" class="facebook-btn" onclick="registrarCompartilhamento()">📘 Compartilhar no Facebook</a>
        
        <p>Seu link: <strong><?php echo $linkConvite; ?></strong></p>
        
        <p class="saldo">Saldo: <strong>R$<?php echo number_format($saldo, 2, ',', '.'); ?></strong></p>
        
        <button class="pix-btn" onclick="window.location.href='saque.php'">💰 Sacar via Pix</button>
        <button class="sair-btn" onclick="window.location.href='logout.php'">Sair</button>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f8f8;
        }
        .container {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
        }
        .logo {
            width: 120px;
            margin-bottom: 20px;
        }
        h1 {
            color: #ff6600;
            font-size: 22px;
        }
        .whatsapp-btn, .facebook-btn {
            display: block;
            background-color: #25d366;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
        }
        .facebook-btn {
            background-color: #1877f2;
        }
        .pix-btn {
            background-color: #ff6600;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        .sair-btn {
            background-color: red;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        .saldo {
            font-size: 18px;
            font-weight: bold;
            color: #ff6600;
        }
    </style>
</body>
</html>
