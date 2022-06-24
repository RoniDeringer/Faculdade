<!DOCTYPE html>
<?php 
    include 'connect/connect.php';
	$title = "Lista de Marcas";
    
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
            $sql = 'SELECT * FROM '.$tb_marca;
            $result = mysqli_query($conexao,$sql);
            while ($row = mysqli_fetch_array($result))
                echo '<option value="'.$row['descricao'].'">';
        ?>
        </datalist>
        <input type="submit" name="acao" id="acao">
        <a href="cad_marca.php">Nova Marca</a>
        <br><br>
        <table width="60%">
	    <tr><th align="center"><b>Código</b></th>
            <th align="left"><b>Descrição</b></th> 
            <th width="20"><b>Alterar</b></th>
            <th width="20"><b>Excluir</b></th>
	    </tr>
        <?php
            $sql = 'SELECT * FROM '.$tb_marca;
                   ' WHERE descricao LIKE "'.$procurar.
                   '%" ORDER BY descricao';
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
            
            <td align="center"><a href="cad_marca.php?acao=editar&codigo=<?php echo $row['codigo'];?>"><img src="img/form/edit.png"></a></td>
            <td align="center"><a href="javascript:excluirRegistro('acaoMarca.php?acao=excluir&codigo=<?php echo $row['codigo'];?>')"><img src="img/form/delete.png"></a></td>
	    </tr>
            <?php } ?>       
        </table>
    </fieldset>
    </form>
    <?php include 'msg.php'; ?>
</body>
</html>