<?php 
	include 'conexao.php';
	$email =  htmlspecialchars(addslashes($_POST['emailCadas']));
	
	$s = "SELECT email FROM tb_adm WHERE email = '$email'";
	
	if($con->query($s)->num_rows == 0){
	    
	     if ($_POST['senhaCadas'] == $_POST['confsenhaCadas']) {
	        
	        $nome =  htmlspecialchars(addslashes($_POST['nick']));
	        $senha =  htmlspecialchars(addslashes($_POST['senhaCadas']));
	        $tipo =  htmlspecialchars(addslashes($_POST['tipo']));
	        $sql = "INSERT INTO tb_adm (username,email,password,master) VALUES ('$nome','$email',md5('$senha'),'$tipo') ";
	        
	        if ($con->query($sql) === TRUE) {
	            $_SESSION['sucesso_cadas'] ='OK';
	        }
	    }else{
	           $_SESSION['errocadasuser'] = 'ERRO';
	    }
	}else{
	    
	   $_SESSION['mesmo_email_cadas'] = 'ERRO';
	}
	$con->close();
	header("location: novoadm.php");
?>

 