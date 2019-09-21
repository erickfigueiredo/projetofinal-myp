<?php
    include 'enviarNotificacao.php';
    $titulo = htmlspecialchars(addslashes($_GET['ttl']));
    $conteudo = htmlspecialchars(addslashes($_GET['mens']));
    enviarNotificacao($titulo,$conteudo);
?>