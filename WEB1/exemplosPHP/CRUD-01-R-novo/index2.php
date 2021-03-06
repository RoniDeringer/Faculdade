<!DOCTYPE html>
<?php 
     include_once "conf/default.inc.php";
     require_once "conf/Conexao.php";
     $title = "Lista de Marcas";
?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
</head>
<body>
<?php include "menu.php"; ?>
    <?php
         $pdo = Conexao::getInstance(); 

         $consulta = $pdo->prepare("SELECT * FROM marca
                           WHERE descricao
                           LIKE :descricao
                           ORDER BY descricao;");
         
        $valor = "a";
        $consulta->bindValue(':descricao', $valor."%", PDO::PARAM_STR);
        $consulta->execute();
        echo "Descrição iniciando com '".$valor."'<br>";
         while ($linha = $consulta->fetch(PDO::FETCH_BOTH))
           echo "Código: {$linha[0]} - Descrição: {$linha['descricao']}<br />";
         
         echo "<br><br>";
         
        $valor = "b";
        $consulta->bindValue(':descricao', $valor."%", PDO::PARAM_STR);
        $consulta->execute();
        echo "Descrição iniciando com '".$valor."'<br>";
        while ($linha = $consulta->fetch(PDO::FETCH_BOTH))
           echo "Código: {$linha['codigo']} - Descrição: {$linha[1]}<br />";
    ?>       
</body>
</html>