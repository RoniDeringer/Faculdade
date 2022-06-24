<?php
    header('Content-Type: text/html; charset=UTF-8');

    $teste = 10;
    $resultado = soma(3,4);
    
    echo $resultado;
    function soma($n1, $n2){
        return $n1 + $n2 + $GLOBALS['teste'];
    }
?>