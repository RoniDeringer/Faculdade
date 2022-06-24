<?php
    include 'variavel_100.php';
    header('Content-Type: text/html; charset=UTF-8');

    $teste = 10;

    echo $valor."<br>";
    echo soma(3,4);
    
    function soma($n1, $n2){
        return $n1 + $n2 + $GLOBALS['valor'];
    }
?>