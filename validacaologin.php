<?php 
	include 'conexao.php';
	$email =  htmlspecialchars(addslashes($_POST['mailUser']));
	$senha = md5( htmlspecialchars(addslashes($_POST['passUser'])));

	$sql = "SELECT * FROM tb_adm WHERE email = '$email' AND password = '$senha'";
	$res = $con->query($sql);
	
	if($res->num_rows>0){
		$row = $res->fetch_assoc();
		$_SESSION['user'] = $row['username'];
		$_SESSION['pass'] = $row['password'];
		$_SESSION['tipo'] = $row['master'];
		$con->close();
		header("location: painel.php");
	}else{
		$_SESSION['erro']='ERRO';
		$con->close();
    	header("location: login.php");
	}
?>