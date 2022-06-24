<!DOCTYPE html>
<?php 
     include_once "conf/default.inc.php";
     require_once "conf/Conexao.php";
     $title = "Lista de Marcas";
     $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "1";
?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
</head>
<body>

<form method="post">
    <input type="radio" name="tipo" id="tipo" value="1" <?php if ($tipo == 1) echo "checked";?>>Código<br>  
    <input type="radio" name="tipo" id="tipo" value="2" <?php if ($tipo == 2) echo "checked";?>>Descrição<br>
    <input type="submit" value="Consultar">
</form>
<br>
<?php
    $sql = "";
    if ($tipo == 1)
        $sql = "SELECT * FROM marca ORDER BY codigo";
    else    
        $sql = "SELECT * FROM marca ORDER BY descricao";
    $pdo = Conexao::getInstance(); 
    $consulta = $pdo->query($sql);
    while ($linha = $consulta->fetch(PDO::FETCH_BOTH))
        echo "Código: {$linha['codigo']} - Descrição: {$linha['descricao']}<br />";
?>
</body>
</html>