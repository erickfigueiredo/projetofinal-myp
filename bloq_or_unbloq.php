<?php
    include 'conexao.php';
    $id_prof = htmlspecialchars(addslashes($_POST['iduser']));
    $sql = "SELECT bloqueado FROM tb_profissional WHERE id = '$id_prof'";
    $row = $con->query($sql)->fetch_assoc();
    if($row['bloqueado']){
        $s="UPDATE tb_profissional SET bloqueado = 0 WHERE id = '$id_prof'";
        if($con->query($s)===TRUE){
            $con->close();
            header("location: tabela_profissionais.php");
        }
    }else{
        $s="UPDATE tb_profissional SET bloqueado = 1 WHERE id = '$id_prof'";
        if($con->query($s)===TRUE){
            $con->close();
            header("location: tabela_profissionais.php"); 
        }
    }
?>