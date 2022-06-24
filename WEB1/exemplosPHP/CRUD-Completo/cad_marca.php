<!DOCTYPE html>
<?php 
    $title = "Cadastro de Marcas";
    include 'connect/connect.php';
    include 'acaoMarca.php';
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
    <form action="acaoMarca.php" id="form" method="post">
    <fieldset>
        <legend><?php echo $title; ?></legend>
        <input type="hidden" name="codigo" id="codigo" value="<?php if ($acao == "editar") echo $dados['codigo']; else echo "0";?>">
        <label for="nome">Descrição</label>        
        <input type="text" name="descricao" id="descricao" value="<?php if ($acao == "editar") echo $dados['descricao'];?>"
        placeholder="Descrição" required="true">	                        
        <br><br>
        <button name="acao" value="salvar" id="acao" 
        type="submit">Salvar</button>
        <a href="list_marca.php">Consultar</a>         
    </fieldset>
    </form>
    <?php include 'msg.php'; ?>
</body>
</html>