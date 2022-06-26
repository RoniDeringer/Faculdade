<?php

$entrada_post = "aba";

echo $entrada_post;



class ValidaPilha
{
   public $entrada;

    function RecebeEntrada($entrada_post){
        $entrada = $entrada_post;
    }
}
echo $entrada_post;

//RecebeEntrada($entrada_post);

//echo $entrada;
/*

$automato = new ValidaPilha();

/*
 * Atribuo os valores inicias
$automato->entradas = $entrada_post;
$automato->novo_estado = 'q';
$automato->topo_pilha = ['Z'];