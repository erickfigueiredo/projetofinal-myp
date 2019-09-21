<?php  
    include 'conexao.php';
    $id = htmlspecialchars(addslashes($_POST['iddel']));
    $sql = "DELETE FROM tb_adm WHERE id = $id";
    echo $sql;
    if($con->query($sql)===TRUE){
        $con->close();
    }else{
        $_SESSION['erro_delete'] = ERRO;
        $con->close();
    }
    header("location: tabela_adms.php");
?>