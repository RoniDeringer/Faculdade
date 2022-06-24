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

$printerPath = "http://localhost:631/printers/EPSON_TM-T20";
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
____________________________________
Produto: $codigo
$dt CFF: 000009
			
	Cupom nao Fiscal 
____________________________________ 

$menu

\n\n\n\n\n\n\n";
   
$myfile = fopen("fileToPrint.txt", "w");
fwrite($myfile, $texto);
fclose($myfile);
exec('cat fileToPrint.txt > /dev/usb/lp0');
?> 
</body>
</html>