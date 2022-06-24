<?php
	header('Content-Type: text/html; charset=UTF-8');
	date_default_timezone_set('America/Sao_Paulo');
	
	// Banco de Dados para configuração
	$url = "127.0.0.1";     // IP do host
	$dbname="ds2-7";          // Nome do database
	$usuario="root";        // Usuário do database
	$password="";           // Senha do database
	
	// Tabelas do Banco de Dados
	$tb_marca = "marca";
	$tb_produto = "produto";
	$tb_venda = "venda";
	$tb_venda_has_produto = "venda_has_produto";
?>
