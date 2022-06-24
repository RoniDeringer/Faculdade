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
         $consulta = $pdo->query("SELECT * FROM marca");
         while ($linha = $consulta->fetch(PDO::FETCH_ASSOC))
           echo "<input name='marcas[]' type='checkbox' 
                 value='{$linha['codigo']}'>{$linha['descricao']}</br>";
    ?>      
</body>
</html>