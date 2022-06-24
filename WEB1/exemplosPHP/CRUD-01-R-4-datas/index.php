<!DOCTYPE html>
<?php 
     include_once "conf/default.inc.php";
     include_once "fdata.php";
     require_once "conf/Conexao.php";
     $title = "Lista de Produtos";
     $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "2";
     $procurar = isset($_POST['procurar']) ? $_POST['procurar'] : "";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
</head>
<body>

<form method="post">
    <input type="radio" name="tipo" id="tipo" value="1" <?php if ($tipo == 1) { echo "checked"; }?>>Código<br>  
    <input type="radio" name="tipo" id="tipo" value="2" <?php if ($tipo == 2) { echo "checked"; }?>>Descrição<br>
    <input type="text" name="procurar" id="procurar" value="<?php echo $procurar; ?>">
    <input type="submit" value="Consultar">
</form>
<br>
<?php
    $sql = "";
    if ($tipo == 1){
        $sql = "SELECT * FROM produto WHERE id = $procurar ORDER BY id";
    }else{    
        $sql = "SELECT * FROM produto WHERE descricao LIKE '$procurar%' ORDER BY descricao";
    }
    $pdo = Conexao::getInstance(); 
    $consulta = $pdo->query($sql);
    ?>
    <table border="1">
        <thead>
        <tr><th>Código</th>
        <th>Descrição</th>
        <th>Valor</th>
        <th>Data da Compra</th>
        <th>Data de Vencimento</th></tr>
        </thead> 
        <tbody>
    <?php
    while ($linha = $consulta->fetch(PDO::FETCH_BOTH)){
        echo "<tr><td>{$linha['id']}</td>";
        echo "<td>{$linha['descricao']}</td>";
        echo "<td>{$linha['valor']}</td>";
        echo "<td>".datatimeFormat($linha['dataCompra'])."</td>";
        echo "<td>".dataFormat($linha['vencimento'])."</td></tr>";
    }   
?>
    </tbody>
    </table>
</body>
</html>