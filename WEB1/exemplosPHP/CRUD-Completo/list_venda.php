<!DOCTYPE html>
<?php include 'connect/connect.php'; 
include 'util/util.php';
    $title = "Lista de Vendas";
	$dataInicial = '01/01/2015';
	if (isset($_POST["dataInicial"]))
		  $dataInicial = $_POST["dataInicial"];
    $dataFinal = '31/12/2015';
    if (isset($_POST["dataFinal"]))
          $dataFinal = $_POST["dataFinal"];
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel=stylesheet href='css/jquery-calendario.css'/>
    <link rel=stylesheet href='css/calendario.css'/>
    <link rel=stylesheet href='css/estilo.css'/>  
    <script src="js/jquery.maskedinput.js"></script>
    <script src='js/calendario.js'></script>      
    <script src="js/jquery-2.1.4.min.js"></script>
    <script language="javascript" type="text/javascript"></script>
<title> <?php echo $title; ?> </title>
</head>
<body>
<?php include 'menu.php'; ?>
<form id="ListaVendas" name="ListaVendas" method="post" action="" >
    <fieldset>
            <legend>Procurar Vendas</legend>
            &nbsp;&nbsp;Data Inicial
            <input type='text' size='11' name='dataInicial' id='dataInicial' value="<?php echo $dataInicial;?>"readonly/>
            <span id='spanFD' style='position:absolute'></span>
            <img src="img/form/date.gif" width="24" height="24" border="0" style='cursor: pointer;' onclick="javascript:popdate('dataInicial','spanFD','20','start')">

            &nbsp;&nbsp;Data Final
            <input type='text' size='11' name='dataFinal' id='dataFinal' value="<?php echo $dataFinal;?>" readonly/>
            <span id='spanFD' style='position:absolute'></span>
            <img src="img/form/date.gif" width="24" height="24" border="0" style='cursor: pointer;' onclick="javascript:popdate('dataFinal','spanFD','20','start')">

    <button name="acao" id="acao" value="busca"  type="submit">
                <img src="img/form/magnifier.png" alt="Enviar"> Procurar
            </button>
 &nbsp;&nbsp;
<a href="cad_venda.php">Nova Venda</a>
    <table width="70%">
	
	<tr>
        <td width="90" align="center"><b>Código</b></td>
        <td width="250" align="center"><b>Data de Vencimento</b></td>
        <td width="250" align="center"><b>Data de Pagamento</b></td>
        <td width="20"><b>Alterar</b></td>
        <td width="20"><b>Excluir</b></td>
	</tr>
    <?php 
    $sql = 'SELECT * FROM '.$tb_venda.
        ' WHERE '.$tb_venda.'.dataVencimento>="'.dataPadraoToMySQL($dataInicial).'"'.
        ' AND '.$tb_venda.'.dataVencimento<="'.dataPadraoToMySQL($dataFinal).'"';
    
	$result = mysqli_query($conexao,$sql);
    $cont = 0;
  while ($row = mysqli_fetch_array($result)){ 
    if ($cont % 2 == 0)
                echo '<tr>';
            else
                echo '<tr class="sombra">';
            $cont++;
?>
        <td align="center"><?php echo $row['codigo'];?></td>
        <td align="center"><?php echo dataTracoToPadrao($row['dataVencimento']);?></td>
        <td align="center"><?php echo dataTracoToPadrao($row['dataPagamento']);?></td>
        <td align="center"><a href="cad_venda.php?acao=editar&codigo=<?php echo $row['codigo'];?>"><img border="0" src="img/form/edit.png" alt="Editar"></a></td> 
        <td align="center"><a href="javascript:excluirRegistro('acaoVenda.php?acao=excluir&codigo=<?php echo $row['codigo'];?>')"><img src="img/form/delete.png"></a></td>       
	 </tr>
   <?php } ?>       
    </table>
  <p>&nbsp;</p>
    </fieldset>
</form>
<?php include 'msg.php'; ?>
</body>
</html>
