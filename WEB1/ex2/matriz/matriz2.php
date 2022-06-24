<!DOCTYPE html>
<?php
$matriz = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9)
);

define("LIN", 3);
define("COL", 3);

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
        echo "<br>";
        for ($col = 0; $col < COL; $col++)
            echo $matriz[$lin][$col] . "\n";
    }
    ?>
</body>

</html>