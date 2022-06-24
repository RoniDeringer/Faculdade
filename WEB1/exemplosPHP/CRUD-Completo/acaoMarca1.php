<?php
	header('Content-Type: text/html; charset=UTF-8');
	
	include 'conf/conf.inc.php';
	include 'connect/connect.php';
	
	$acao = '';
	if (isset($_GET["acao"]))
		  $acao = $_GET["acao"];
	
	if ($acao == "excluir"){
		$codigo = 0;
		if (isset($_GET["codigo"])){
		  	$codigo = $_GET["codigo"];
			$sql = 'DELETE FROM $tb_marca'].
		               ' WHERE codigo =  '.$codigo;
		        $result = mysqli_query($conexao,$sql);
			header('location:list_marca1.php');
		}
	}

?>	
