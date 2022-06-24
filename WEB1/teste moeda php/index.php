<!DOCTYPE html>
<?php
 $moeda = rand(0, 1);
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Moeda</title>
</head>
<body>
<?php include "menu.php";?>
<form action="" method="post">
    <input type="submit" value="Lançar Moeda">
</form>



<?php
   echo "<img src='img/$moeda.png' alt=''>";
?>
</body>
</html>
