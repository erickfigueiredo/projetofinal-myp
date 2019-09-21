<?php
    include 'conexao.php';
    $id = htmlspecialchars(addslashes($_POST['id']));
    $nome = htmlspecialchars(addslashes($_POST['nome']));
    $sql = "UPDATE tb_profissional SET saldo = 0, solicitou_retirada = 0 WHERE id_usuario = $id";
    if($con->query($sql)===TRUE){
        $con->close();
        header("location:preNotifiSaldo.php?id=$id&nome=$nome");
    }else{
        $_SESSION['erro_zera_conta']='ERRO';
        $con->close();
        header("location: tabela-profissionais.php");
    }
?>