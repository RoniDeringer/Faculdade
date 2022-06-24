<!DOCTYPE html>
<?php 
    $title = "Cadastro de Produtos";
    include 'connect/connect.php';
    include 'acaoProduto.php';
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
</head>
<body>
    <?php include 'menu.php'; ?>
    <form action="acaoProduto.php" id="form" method="post">
    <fieldset>
        <legend><?php echo $title; ?></legend>
        <input type="hidden" name="codigo" id="codigo" value="<?php if ($acao == "editar") echo $dados['codigo']; else echo "0";?>">        
        <label for="nome">Descrição</label>     
        <input type="text" name="descricao" id="descricao" placeholder="Descrição" required="true" value="<?php if ($acao == "editar") echo $dados['descricao'];?>"><br>
        <label for="nome">Preço</label>     
        <input type="text" name="preco" id="preco" placeholder="Preço" required="true" value="<?php if ($acao == "editar") echo $dados['preco'];?>"><br>
        <label for="nome">Código de Barras</label>     
        <input type="text" name="barra" id="barra" placeholder="Código de Barra" required="true" value="<?php if ($acao == "editar") echo $dados['barra'];?>"><br>
        <label for="marca">Marca</label>
        <select name="marca" id="marca">
        <?php 
            $sql = 'SELECT * FROM '.$tb_marca.' ORDER by descricao';
            $result = mysqli_query($conexao,$sql);
            while ($row = mysqli_fetch_array($result)){
                echo '<option value="'.$row['codigo'].'"';
                if ($acao == "editar" && $dados['marca'] == $row['codigo'])
                    echo ' selected';
                echo '>'.$row['descricao'].'</option>';
            }
        ?>	    
        </select>                    
        <br><br>
        <button name="acao" value="salvar" id="acao" 
        type="submit">Salvar</button>
        <a href="list_produto.php">Consultar</a>         
    </fieldset>
    </form>
    <?php include 'msg.php'; ?>
</body>
</html>