<!DOCTYPE html>
<?php 
    $title = "Cadastro de Vendas";
    include 'connect/connect.php';
    include 'acaoVenda.php';
    $acao = '';
    $codigo = '';
    $dados;
    if (isset($_GET["acao"]))
        $acao = $_GET["acao"];
    if ($acao == "editar"){
        if (isset($_GET["codigo"])){
            $codigo = $_GET["codigo"];
            $dados = carregaBDParaVetor($codigo); 
        }
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>  
    <link rel=stylesheet href='css/jquery-calendario.css'/>
    <link rel=stylesheet href='css/calendario.css'/>
    <link rel=stylesheet href='css/estilo.css'/>  
    <script src="js/jquery.maskedinput.js"></script>
    <script src='js/calendario.js'></script>      
    <script src="js/jquery-2.1.4.min.js"></script>
    <script>
    jQuery(function($){
        $("#dataVencimento").mask("99/99/9999");
        $("#dataPagamento").mask("99/99/9999");
    });
    </script>
</head>
<body>
    <?php include 'menu.php'; ?>
    <form action="acaoVenda.php" id="form" method="post">
        <fieldset>
            <legend><?php echo $title; ?></legend>
            Código
            <input type="text" name="codigo" id="codigo" size="3" value="<?php if ($acao == "editar") echo $dados['codigo']; else echo "0";?>" readonly>
            
            &nbsp;&nbsp;Data de Vencimento
            <input type='text' size='11' name='dataVencimento' id='dataVencimento' value="<?php if ($acao == "editar") echo $dados['dataVencimento'];?>" readonly/>
            <span id='spanFD' style='position:absolute'></span>
            <img src="img/form/date.gif" width="24" height="24" border="0" style='cursor: pointer;' onclick="javascript:popdate('dataVencimento','spanFD','20','start')">

            &nbsp;&nbsp;Data de Pagamento
            <input type='text' size='11' name='dataPagamento' id='dataPagamento' value="<?php if ($acao == "editar") echo $dados['dataPagamento'];?>" readonly/>
            <span id='spanFD' style='position:absolute'></span>
            <img src="img/form/date.gif" width="24" height="24" border="0" style='cursor: pointer;' onclick="javascript:popdate('dataPagamento','spanFD','20','start')">

            <br><br>
            <button name="acao" value="salvar" id="acao" 
            type="submit">Salvar</button>
            <a href="list_venda.php">Consultar</a>    

            <br><br>
            <?php if ($acao == "editar"){ ?>

            <table width="100%"   border="1" align="left" id='painel'>
                <tr><tr>
                    <td width="90" align="center"><b>Produto|Marca|Valor</b></td>
                    <td width="90" align="center"><b>Quantidade</b></td>
                    <td width="120" align="right"><b></b></td>
                </tr>
                <tr>
                    <td width="90" align="center">
                        <select name="produto" id="produto">
                            <?php
                            $sql = "SELECT * FROM $tb_produto, $tb_marca WHERE $tb_produto.marca_codigo = $tb_marca.codigo ORDER BY $tb_produto.descricao";
                            echo $sql;
                            $result = mysqli_query($conexao,$sql);
                            while ($row = mysqli_fetch_array($result)) {      
                                ?>
                                <option value="<?php echo $row[0];?>">
                                    <?php echo $row[1]." | ".$row[6]." | R$ ".$row[2];?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td width="90" align="center">
                                <input type="text" name="quantidade" id="quantidade" size="12">
                            </td>
                            <td width="120" align="right">
                                <button name="acao" id="acao" value="addProduto"  type="submit" onclick="return validaAddProd();">
                                    <img src="img/form/add.png" alt="Adicionar">Adicionar Produto
                                </button><br><br>
                            </td>
                        </tr>
                    </table>


                    <br><br>

                    <table width="100%"   border="1" align="left" id='painel'>
                        <tr>
                            <td width="90" align="center"><b>Código</b></td>
                            <td width="400" ><b>Descrição</b></td>
                            <td width="400" ><b>Marca</b></td>
                            <td width="400" ><b>Quantidade</b></td>
                            <td width="250" ><b>Valor Unitário</b></td>
                            <td width="250" ><b>Total</b></td>
                            <td width="20" ></td>
                        </tr>


                        
                        <?php 
                        $sql = "SELECT $tb_produto.codigo, $tb_produto.descricao, ".
                        "$tb_marca.descricao,$tb_venda_has_produto.quantidade, ".
                        "$tb_produto.preco, ".
                        "($tb_venda_has_produto.quantidade * $tb_produto.preco) as totalItem ". 
                        "FROM $tb_produto, $tb_marca, $tb_venda, $tb_venda_has_produto ".
                        "WHERE $tb_venda.codigo = $codigo ".
                        "AND $tb_venda_has_produto.venda_codigo = $tb_venda.codigo ".
                        "AND $tb_produto.marca_codigo = $tb_marca.codigo ".
                        "AND $tb_produto.codigo = $tb_venda_has_produto.produto_codigo ". 
                        "ORDER BY $tb_produto.descricao";
                        $result = mysqli_query($conexao,$sql);
                        $totalVenda = 0;
                        while ($row = mysqli_fetch_array($result))  {     
                            $totalVenda = $totalVenda + $row['totalItem'];       
                            ?>
                            <tr>
                                <td align="center"><?php echo $row['codigo'];?></td>
                                <td width="400"><?php echo $row[1];?></td>
                                <td><?php echo $row[2];?></td>
                                <td><?php echo $row['quantidade'];?></td>
                                <td><?php echo number_format($row['preco'],2,',','.');?></td>
                                <td><?php echo number_format($row['totalItem'],2,',','.');?></td>
                                <td><a href="javascript:excluirRegistro('acaoVenda.php?acao=excluirProduto&produto=<?php echo $row['codigo'];?>&venda=<?php echo $codigo;?>')"><img border="0" src="img/form/delete.png" alt="Excluir"></a></td>
                            </tr>
                            <?php } 
                            $totalVenda = number_format($totalVenda,2,',','.');
                            ?>
                        </table> 
                        <table width="100%"   border="1" align="left" id='painel'>
                         <tr>
                            <td align="right"><b><font color="blue" size="4"><?php echo "TOTAL DA VENDA R$ ".$totalVenda;?></font></b></td>
                        </tr>      
                    </table>
                    <?php } ?>
                </fieldset>
            </form>
            <?php include 'msg.php'; ?>
        </body>
        </html>