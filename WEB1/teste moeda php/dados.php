<!DOCTYPE html>
<?php
 $dado = rand(1, 6);
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dados</title>
</head>
<body>
<?php include "menu.php";?>


<form action="" method="post">
    <input type="submit" value="Lançar Dados">
</form>
<?php
   echo "<img src='img/dados/$dado.png' alt=''>";
?>
</body>
</html>
