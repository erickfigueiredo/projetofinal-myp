<?php 
	session_start();
	$usuario = 'classmat_myp';
	$servidor = 'classmatch.myscriptcase.com';
	$senha = 'myp123';
	$nomeBanco = 'classmat_myp';

	$con = new mysqli($servidor, $usuario, $senha, $nomeBanco);

	if($con->connect_error){
		die("Erro na conexao: ".$con->connect_error);
	}
?>