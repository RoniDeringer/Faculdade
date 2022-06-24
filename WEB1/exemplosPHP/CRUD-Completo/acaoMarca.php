<?php
	header('Content-Type: text/html; charset=UTF-8');
	include 'connect/connect.php';
	
	$acao = '';
	if (isset($_GET["acao"]))
		  $acao = $_GET["acao"];
	
	if ($acao == "excluir"){
		$codigo = 0;
		if (isset($_GET["codigo"])){
		  	$codigo = $_GET["codigo"];
			excluir($codigo);
		}
	}else{
		if (isset($_POST["acao"])){
			$acao = $_POST["acao"];
			if ($acao == "salvar"){
				$codigo = 0;
				if (isset($_POST["codigo"])){
					$codigo = $_POST["codigo"];
					if ($codigo == 0)
					inserir();
					else
					alterar($codigo);
				}
			}
		}
	}
	
	function excluir($codigo){
		$sql = 'DELETE FROM '.$GLOBALS['tb_marca'].
		       ' WHERE codigo =  '.$codigo;
		$result = mysqli_query($GLOBALS['conexao'],$sql);
		if ($result == 1)
			header('location:list_marca.php');
		else
			header('location:list_marca.php');
	}

	function alterar($codigo){
		$vet = carregarTelaParaVetor();
		$sql = 'UPDATE '.$GLOBALS['tb_marca'].
		       ' SET descricao = "'.$vet['descricao'].
		       '" WHERE codigo = '.$codigo;
		$result = mysqli_query($GLOBALS['conexao'],$sql);
		if ($result == 1)
			header('location:cad_marca.php?msg="sa"&acao=editar&codigo='.$codigo);
		else
			header('location:cad_marca.php?msg="er"&acao=editar&codigo='.$codigo);

	}
	
	function inserir(){	
		$vet = carregarTelaParaVetor();
		$sql = 'INSERT INTO '.$GLOBALS['tb_marca'].
		       ' (descricao) VALUES ("'.$vet['descricao'].'")';
		$result = mysqli_query($GLOBALS['conexao'],$sql);
		$codigo = mysqli_insert_id($GLOBALS['conexao']);
		if ($result == 1)
			header('location:cad_marca.php?msg="si"&acao=editar&codigo='.$codigo);
		else
			header('location:cad_marca.php?msg="er"&acao=editar&codigo='.$codigo);
	}
	
	function carregarTelaParaVetor(){
		$vet = array();
		$vet['codigo'] = $_POST["codigo"];
		$vet['descricao'] = $_POST["descricao"];
		return $vet;		
	}	
		
	function carregaBDParaVetor($codigo){
		$sql = 'SELECT * FROM '.$GLOBALS['tb_marca'].
		       ' WHERE codigo = '.$codigo;
		$result = mysqli_query($GLOBALS['conexao'],$sql);
		$dados = array();
		while ($row = mysqli_fetch_array($result)){
			$dados['codigo'] = $row['codigo'];
			$dados['descricao'] = $row['descricao'];
		}   
		return $dados;    		
	}
?>	