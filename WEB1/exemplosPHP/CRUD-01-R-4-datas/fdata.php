<?php

function datatimeFormat($data){
    return date("d/m/Y H:i:s",strtotime($data));
}

function dataFormat($data){
    return date("d/m/Y",strtotime($data));
}

?>