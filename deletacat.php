<?php  
    include 'conexao.php';
    $id = $_POST['idcat_del'];
    $sql = "DELETE FROM tb_categoria WHERE id = '$id'";
    if($con->query($sql)===TRUE){
        $con->close();
    }else{
        $_SESSION['erro_delete_cat'] = ERRO;
        $con->close();
    }
    header("location: tabela_categorias.php");
?>