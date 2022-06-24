<!DOCTYPE html>
<?php 
	// Modelo de Impressão no Windows
	include 'conf/conf.inc.php';
	$codigo = $_GET['codigo'];
	$dt = date('d/m/y H:i');
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Cupom</title>
</head>   
<body>
<?php 
	$nome = "Rodrigo Curvêllo";
	$menu = "Volte Sempre";

	$texto = 
	" 
	EPSON do Brasil ind. e com 
	     Epson Brasil 
	   av.iucumare 720
	     06460-003

CNPJ: 52.106.991/0001-003
IE: 206108738115
IM: 987654321098
Nome:$nome
________________________________

Produto:$codigo

$dt CFF: 000009
			
	Cupom nao Fiscal 
________________________________ 

$menu ";
   
//$handle = printer_open("EPSON TM-T20 Receipt");
//printer_write($handle,$texto);
//printer_close($handle);
//header("location:list_produto.php");
echo $texto;
?> 
</body>
</html>