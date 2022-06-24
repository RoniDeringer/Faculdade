<!DOCTYPE html>
<?php 
    include 'connect/connect.php';
	$title = "Lista de Produtos/Marcas";
    $procurar = '';
	if (isset($_POST["procurar"]))
        $procurar = $_POST["procurar"];
    $busca = 2;
    if (isset($_POST["busca"]))
        $busca = $_POST["busca"];
?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
</head>
<body>
    <?php include 'menu.php'; ?>
    <form method="post">
    <fieldset>
        <legend><?php echo $title; ?></legend>
        <input type="text"   name="procurar" list="marcas"
               id="procurar" size="37" value="<?php echo $procurar;?>">
        <datalist id="marcas">
        <?php 
            $sql = 'SELECT * FROM '.$tb_produto;
            $result = mysqli_query($conexao,$sql);
            while ($row = mysqli_fetch_array($result))
                echo '<option value="'.$row['descricao'].'">';
        ?>
        </datalist>
        <input type="submit" name="acao" id="acao">
        <input type="radio" name="busca" id="busca" value="1" 
               <?php if ($busca == 1) echo 'checked';?>>Busca por Marca
        <input type="radio" name="busca" id="busca" value="2" 
               <?php if ($busca == 2) echo 'checked';?>>Busca por Produto
        <a href="cad_produto.php">Novo Produto</a>
        <br><br>
        <table width="90%">
	    <tr><th align="center"><b>Código</b></th>
            <th align="left"><b>Descrição</b></th> 
            <th align="left"><b>Marca</b></th>
            <th align="left"><b>Preço</b></th> 
            <th align="left"><b>Código</b></th> 
            <th width="20"><b>Imprimir</b></th> 
            <th width="20"><b>Alterar</b></th>
            <th width="20"><b>Excluir</b></th>
	    </tr>
        <?php
            if ($busca == 1){ 
            $sql = 'SELECT * FROM '.$tb_marca.', '.$tb_produto.
                   ' WHERE '.$tb_marca.'.codigo = '.$tb_produto.'.marca_codigo'.
                   ' AND '.$tb_marca.'.descricao LIKE "'.$procurar.
                   '%" ORDER BY '.$tb_produto.'.descricao';
            }
            else{
            $sql = 'SELECT * FROM '.$tb_marca.', '.$tb_produto.
                   ' WHERE '.$tb_marca.'.codigo = '.$tb_produto.'.marca_codigo'.
                   ' AND '.$tb_produto.'.descricao LIKE "'.$procurar.
                   '%" ORDER BY '.$tb_produto.'.descricao';
            }
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
            <td><?php echo $row['descricao'];?></td>
            <td><?php echo $row[1];?></td>
            <td><?php echo $row['preco'];?></td>
            <td><?php echo $row['codigodebarra'];?></td>
            <td align="center"><a href="printW.php?codigo=<?php echo $row['codigo'];?>"><img src="img/form/print.png"></a></td>
            <td align="center"><a href="cad_produto.php?acao=editar&codigo=<?php echo $row['codigo'];?>"><img src="img/form/edit.png"></a></td>
            <td align="center"><a href="javascript:excluirRegistro('acaoProduto.php?acao=excluir&codigo=<?php echo $row['codigo'];?>')"><img src="img/form/delete.png"></a></td>
	    </tr>
            <?php } ?>       
        </table>
    </fieldset>
    </form>
    <?php include 'msg.php'; ?>
</body>
</html>