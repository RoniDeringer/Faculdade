<!DOCTYPE html>
<?php
$matriz = array();
define("LIN",3);
define("COL",3);
?>

<html>
<head>
    <meta charset="utf-8">
    <tittle> Matriz 3 x 3</tittle>
    <center>
        <h1>MATRIZ:</h1>
</head>
<body>

    <?php
    for ($lin = 0; $lin < LIN; $lin++) {
        for ($col = 0; $col < LIN; $col++){
            $matriz[$lin][$col] = rand(1,9 );
        }
    }
    foreach ($matriz as $linha){
        echo "<br>";
        foreach ($linha as $item)
        echo $item . "\n";
    }
    ?>
</body>

</html>