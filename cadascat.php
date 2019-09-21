<?php 
	include 'conexao.php';
    $categoria = htmlspecialchars(addslashes($_POST['inputCat']));
    $idpai= htmlspecialchars(addslashes($_POST['idcatpai']));

    $sql = "INSERT INTO tb_categoria (categoria,id_cat_pai) VALUES ('$categoria',$idpai) ";
    
    if($con->query($sql)===TRUE){
        $_SESSION['cadas_cat']='OK';
    }else{
        $_SESSION['cadas_cat']='ERRO';
    }
    $con->close();
    header("location:tabela_categorias.php");
?>