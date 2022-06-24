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
		$sql = 'DELETE FROM '.$GLOBALS['tb_produto'].
		       ' WHERE codigo =  '.$codigo;
		$result = mysqli_query($GLOBALS['conexao'],$sql);
		if ($result == 1)
			header('location:list_produto.php');
		else
			header('location:list_produto.php');
	}

	function alterar($codigo){
		$vet = carregarTelaParaVetor();
		$sql = 'UPDATE '.$GLOBALS['tb_produto'].
		       ' SET descricao = "'.$vet['descricao'].'"'.
		       ', marca_codigo = '.$vet['marca'].
		       ', preco = '.$vet['preco'].
		       ', codigodebarra = "'.$vet['barra'].'"'.
		       ' WHERE codigo = '.$codigo;
		$result = mysqli_query($GLOBALS['conexao'],$sql);
		if ($result == 1)
			header('location:cad_produto.php?msg="sa"&acao=editar&codigo='.$codigo);
		else
			header('location:cad_produto.php?msg="er"&acao=editar&codigo='.$codigo);
	}
	
	function inserir(){	
		$vet = carregarTelaParaVetor();
		$sql = 'INSERT INTO '.$GLOBALS['tb_produto'].
		       ' (descricao, marca_codigo, preco, codigodebarra)'.
		       ' VALUES ("'.$vet['descricao'].'",'.$vet['marca'].
		       	','.$vet['preco'].',"'.$vet['barra'].'")';
		$result = mysqli_query($GLOBALS['conexao'],$sql);
		$codigo = mysqli_insert_id($GLOBALS['conexao']);
		if ($result == 1)
			header('location:cad_produto.php?msg="si"&acao=editar&codigo='.$codigo);
		else
			header('location:cad_produto.php?msg="er"&acao=editar&codigo='.$codigo);
	}
	
	function carregarTelaParaVetor(){
		$vet = array();
		$vet['codigo'] = $_POST["codigo"];
		$vet['descricao'] = $_POST["descricao"];
		$vet['marca'] = $_POST["marca"];
		$vet['preco'] = $_POST["preco"];
		$vet['barra'] = $_POST["barra"];
		return $vet;		
	}	
		
	function carregaBDParaVetor($codigo){
		$sql = 'SELECT * FROM '.$GLOBALS['tb_produto'].
		       ' WHERE codigo = '.$codigo;
		$result = mysqli_query($GLOBALS['conexao'],$sql);
		$dados = array();
		while ($row = mysqli_fetch_array($result)){
			$dados['codigo'] = $row['codigo'];
			$dados['descricao'] = $row['descricao'];
			$dados['marca'] = $row['marca_codigo'];
			$dados['preco'] = $row['preco'];
			$dados['barra'] = $row['codigodebarra'];

		}   
		return $dados;    		
	}
?>	