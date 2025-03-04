<?php
session_start();
include "saldo.php"; // Inclui funções de saldo

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$saldo = obterSaldo($usuario);
$mensagem = "⚠️ O saque mínimo é de R$100."; // Mensagem padrão na tela

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $chave_pix = trim($_POST['chave_pix']);
    $valor_saque = floatval($_POST['valor_saque']);

    if (empty($chave_pix)) {
        $mensagem = "⚠️ Insira uma chave Pix válida.";
    } elseif ($valor_saque < 100) {
        $mensagem = "⚠️ O saque mínimo é de R$100.";
    } elseif ($valor_saque > $saldo) {
        $mensagem = "⚠️ Saldo insuficiente.";
    } else {
        // Deduz saldo e confirma saque
        adicionarSaldo($usuario, -$valor_saque);
        $_SESSION['mensagem_saque'] = "✅ Saque de R$" . number_format($valor_saque, 2, ',', '.') . " enviado para a chave Pix: $chave_pix.";
        header("Location: taxa.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saque via Pix</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Saque via Pix</h1>
        <p class="saldo">Saldo disponível: <strong>R$<?php echo number_format($saldo, 2, ',', '.'); ?></strong></p>

        <?php if (!empty($mensagem)) : ?>
            <p class="mensagem"><?php echo $mensagem; ?></p>
        <?php endif; ?>

        <form action="saque.php" method="post">
            <label for="chave_pix">Chave Pix:</label>
            <input type="text" id="chave_pix" name="chave_pix" required>

            <label for="valor_saque">Valor do Saque (R$):</label>
            <input type="number" id="valor_saque" name="valor_saque" step="0.01" min="100" required>

            <button type="submit">💸 Solicitar Saque</button>
        </form>

        <button class="voltar-btn" onclick="window.location.href='index.php'">⬅ Voltar</button>
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
        h1 {
            color: #ff6600;
        }
        .saldo {
            font-size: 18px;
            font-weight: bold;
            color: #ff6600;
        }
        .mensagem {
            font-size: 16px;
            font-weight: bold;
            color: green;
            margin-bottom: 10px;
        }
        label {
            display: block;
            text-align: left;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #ff6600;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        .voltar-btn {
            background-color: gray;
            margin-top: 5px;
        }
    </style>
</body>
</html>
