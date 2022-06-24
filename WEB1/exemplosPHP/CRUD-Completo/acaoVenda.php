<?php
	header('Content-Type: text/html; charset=UTF-8');
	include 'connect/connect.php';
	
	$acao = '';
	if (isset($_GET["acao"]))
		  $acao = $_GET["acao"];

	if ($acao == "excluirProduto"){
		$venda = $_GET['venda'];
		$produto = $_GET['produto'];
		excluirProduto($venda,$produto);
	}else if ($acao == "excluir"){
		$codigo = 0;
		if (isset($_GET["codigo"])){
		  	$codigo = $_GET["codigo"];
			excluir($codigo);
		}
	}else if (isset($_POST["acao"])){
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
			else if($acao == "addProduto"){
				$produto = $_POST['produto'];
				$codigo = $_POST['codigo'];
				$quantidade = $_POST['quantidade'];
				adicionarProduto($codigo,$produto,$quantidade);
			}
	}

	function excluirProduto($venda,$produto){
		$sql = 'DELETE FROM '.$GLOBALS['tb_venda_has_produto'].
		       ' WHERE '.$GLOBALS['tb_venda_has_produto'].'.venda_codigo =  '.$venda.
		       ' AND '.$GLOBALS['tb_venda_has_produto'].'.produto_codigo =  '.$produto;
		$result = mysqli_query($GLOBALS['conexao'],$sql);
		if ($result == 1)
			header('location:cad_venda.php?msg="se"&acao=editar&codigo='.$venda);
		else
			header('location:cad_venda.php?msg="er"&acao=editar&codigo='.$venda);
	}
	
	function adicionarProduto($codigo,$produto,$quantidade){
		$sql = 'INSERT INTO '.$GLOBALS['tb_venda_has_produto'].
		       ' (venda_codigo, produto_codigo, quantidade)'. 
		       ' VALUES ('.$codigo.','.$produto.','.$quantidade.')';
		$result = mysqli_query($GLOBALS['conexao'],$sql);
		if ($result == 1)
			header('location:cad_venda.php?msg="si"&acao=editar&codigo='.$codigo);
		else
			header('location:cad_venda.php?msg="er"&acao=editar&codigo='.$codigo);
	}
	
	function excluir($codigo){
		$sql = 'DELETE FROM '.$GLOBALS['tb_venda_has_produto'].
		       ' WHERE venda_codigo =  '.$codigo;
		$result = mysqli_query($GLOBALS['conexao'],$sql);
		$sql = 'DELETE FROM '.$GLOBALS['tb_venda'].
		       ' WHERE codigo =  '.$codigo;
		$result = mysqli_query($GLOBALS['conexao'],$sql);
		if ($result == 1)
			header('location:list_venda.php');
		else
			header('location:list_venda.php');
	}

	function alterar($codigo){
		$vet = carregarTelaParaVetor();
		$sql = 'UPDATE '.$GLOBALS['tb_marca'].
		       ' SET descricao = "'.$vet['descricao'].
		       '" WHERE codigo = '.$codigo;
		$result = mysqli_query($GLOBALS['conexao'],$sql);
		if ($result == 1)
			header('location:cad_venda.php?msg="sa"&acao=editar&codigo='.$codigo);
		else
			header('location:cad_venda.php?msg="er"&acao=editar&codigo='.$codigo);
	}
	
	function inserir(){	
		$vet = carregarTelaParaVetor();		
		$sql = 'INSERT INTO '.$GLOBALS['tb_venda'].
		       ' (dataVencimento, dataPagamento)'. 
		       ' VALUES ("'.$vet['dataVencimento'].
		       '","'.$vet['dataPagamento'].'")';
		$result = mysqli_query($GLOBALS['conexao'],$sql);
		$codigo = mysqli_insert_id($GLOBALS['conexao']);
		if ($result == 1)
			header('location:cad_venda.php?msg="si"&acao=editar&codigo='.$codigo);
		else
			header('location:cad_venda.php?msg="er"&acao=editar&codigo='.$codigo);
	}
	
	function carregarTelaParaVetor(){
		include 'util/util.php';
		$vet = array();
		$vet['dataVencimento'] = dataPadraoToMySQL($_POST["dataVencimento"]);
		$vet['dataPagamento'] = dataPadraoToMySQL($_POST["dataPagamento"]);
		return $vet;		
	}	
		
	function carregaBDParaVetor($codigo){
		include 'util/util.php';
		$sql = 'SELECT * FROM '.$GLOBALS['tb_venda'].
		       ' WHERE codigo = '.$codigo;
		$result = mysqli_query($GLOBALS['conexao'],$sql);
		$dados = array();
		while ($row = mysqli_fetch_array($result)){
			$dados['codigo'] = $row['codigo'];
			$dados['dataVencimento'] = dataTracoToPadrao($row['dataVencimento']);
			$dados['dataPagamento'] = dataTracoToPadrao($row['dataPagamento']);
		}   
		return $dados;    		
	}
?>	