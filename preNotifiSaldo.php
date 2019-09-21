<?php
    include 'enviarNotificacaoSaldo.php';
    $id = htmlspecialchars(addslashes($_GET['id']));
    $nome = htmlspecialchars(addslashes($_GET['nome']));
    enviarNotificacaoSaldoAnalise($id, $nome);
?>