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

         echo "PDO::FETCH_ASSOC<br>";
         $consulta = $pdo->query("SELECT * FROM marca");
         while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
           var_dump($linha);
           echo "<br>";
         }

         echo "<br>PDO::FETCH_BOTH<br>";
         $consulta = $pdo->query("SELECT * FROM marca");
         while ($linha = $consulta->fetch(PDO::FETCH_BOTH)){
           var_dump($linha);
           echo "<br>";
         }

         echo "<br>PDO::FETCH_NUM<br>";
         $consulta = $pdo->query("SELECT * FROM marca");
         while ($linha = $consulta->fetch(PDO::FETCH_NUM)){
           var_dump($linha);
           echo "<br>";
         }
    ?>      
    
</body>
</html>