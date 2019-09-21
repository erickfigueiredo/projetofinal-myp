<?php
    include 'conexao.php';
    $id = htmlspecialchars(addslashes($_POST['id']));
    $sql = "SELECT password FROM tb_adm WHERE id = $id";
    $row = $con->query($sql)->fetch_assoc();
    $con->close();
    if((trim($_POST['passUser'])=="")||(md5($_POST['passUser'])==$row['password'])){
         $nick = $_POST['nick'];
         $tipo = $_POST['tipo'];
         $email = $_POST['mailUser'];
         $sql = "UPDATE tb_adm SET username = '$nick', email = '$email', master = '$tipo' WHERE id = '$id'";
         if($con->query($sql)===TRUE){
            $_SESSION['edit_adm']='OK';
         }else{
            $_SESSION['edit_adm']='ERRO';
         }
    }else{
        $pass = htmlspecialchars(addslashes($_POST['passUser']));
        $nick = htmlspecialchars(addslashes($_POST['nick']));
        $tipo = htmlspecialchars(addslashes($_POST['tipo']));
        $email = htmlspecialchars(addslashes($_POST['mailUser']));
        $sql = "UPDATE tb_adm SET username = '$nick', email = '$email', master = '$tipo', password = md5('$pass') WHERE id = '$id'";
         if($con->query($sql)===TRUE){
            $_SESSION['edit_adm']='OK';
         }else{
            $_SESSION['edit_adm']='ERRO';
         }
    }
    $con->close();
    header("location:tabela_adms.php");
?>