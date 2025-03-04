<?php
// Função para obter saldo do usuário
function obterSaldo($email) {
    $arquivo = "usuarios_saldo.txt";

    if (!file_exists($arquivo)) {
        file_put_contents($arquivo, "");
    }

    $linhas = file($arquivo, FILE_IGNORE_NEW_LINES);
    foreach ($linhas as $linha) {
        list($usuario, $saldo) = explode(":", $linha);
        if ($usuario == $email) {
            return floatval($saldo);
        }
    }

    return 0.00; // Retorna 0 se não houver saldo registrado
}

// Função para adicionar saldo ao usuário
function adicionarSaldo($email, $valor) {
    $arquivo = "usuarios_saldo.txt";
    
    if (!file_exists($arquivo)) {
        file_put_contents($arquivo, "");
    }

    $linhas = file($arquivo, FILE_IGNORE_NEW_LINES);
    $novas_linhas = [];
    $saldo_atualizado = false;

    foreach ($linhas as $linha) {
        list($usuario, $saldo) = explode(":", $linha);
        if ($usuario == $email) {
            $novo_saldo = floatval($saldo) + $valor;
            $novas_linhas[] = "$usuario:$novo_saldo";
            $saldo_atualizado = true;
        } else {
            $novas_linhas[] = $linha;
        }
    }

    if (!$saldo_atualizado) {
        $novas_linhas[] = "$email:$valor"; // Se o usuário não existir, cria novo saldo
    }

    file_put_contents($arquivo, implode("\n", $novas_linhas));
}
?>
