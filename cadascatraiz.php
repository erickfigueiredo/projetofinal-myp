<?php 
	include 'conexao.php';
    $categoria =  htmlspecialchars(addslashes($_POST['inputCatRaiz']));

    $sql = "INSERT INTO tb_categoria (categoria) VALUES ('$categoria') ";
    
    if($con->query($sql)===TRUE){
        $_SESSION['cadas_cat']='OK';
    }else{
        $_SESSION['cadas_cat']='ERRO';
    }
    $con->close();
    header("location:novacatraiz.php");
?>