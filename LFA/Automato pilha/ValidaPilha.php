<?php

class ValidaPilha
{
    public $estado_atual;
    public $entradas;
    public $topo_pilha;
    public $novo_estado;
    public $nova_pilha;
}

$automato = new ValidaPilha();

/*
 * Atribuo os valores inicias
 */
$automato->entradas = ['a', 'b', 'a', 'b', 'b', 'b', ''];
$automato->novo_estado = 'q';
$automato->topo_pilha = ['Z'];

foreach ($automato->entradas as $entrada) {

    /*
     * estado e pilha recebem os novos valores
     */
    $automato->estado_atual = $automato->novo_estado; //sobreescreve, OK
   

    /*
     * validações do delta
     */

    //1
    if (($automato->estado_atual == 'q') && ($entrada == 'a') && (end($automato->topo_pilha) == 'Z')) {
        $automato->novo_estado = 'p';
        $automato->nova_pilha = ['B', 'B'];
    }

    //2
    if (($automato->estado_atual == 'p') && ($entrada == 'b') && (end($automato->topo_pilha) == 'B')) {
        $automato->novo_estado = 'p';
        array_pop($automato->topo_pilha); //pode dar erro aqui, possivel fazer validação, se passou aqui, nao vai receber  o nova pilha la em cima
        //como ele ja atualizou o topo_pilha, ele ja pode cair em outra validacao antes da proxima entrada(foreach)
    }

    //3
    if (($automato->estado_atual == 'p') && ($entrada == 'a') && (end($automato->topo_pilha) == 'Z')) {
        $automato->novo_estado = 'p';
        $automato->nova_pilha = ['B', 'B'];
    }

    //4
    if (($automato->estado_atual == 'p') && ($entrada == '') && (end($automato->topo_pilha) == 'Z')) {
        $automato->novo_estado = 'p';
        array_pop($automato->topo_pilha);
    }

    //5
    if (($automato->estado_atual == 'p') && ($entrada == 'a') && (end($automato->topo_pilha) == 'B')) {
        $automato->novo_estado = 'p';
        $automato->nova_pilha = ['B' , 'B'];
    }
 

    /**
     * caso ja tenha feito o desempilhamento nos deltas, ele nao vai juntar os arrays
     */
    if($automato->nova_pilha){
        $automato->topo_pilha = array_merge($automato->topo_pilha, $automato->nova_pilha); //ele recebe vazio se o $nova_pilha for vazio
    }

    $automato->nova_pilha = null;  
    
    //esvazia o novo estado
    //esvazia o nova pilha

} //fim foreach

if(!$automato->topo_pilha){
    echo"AUTOMATO ACEITO";
}else{
    echo"AUTOMATO NAO ACEITO";
}






/*
 * Estados:                     {q, p}
 * Alfabeto de Entrada:         {a, b}
 * Alfabeto de Pilha:           {B}
 * Estado inicial:              q
 * Conjunto de estado finais:
 *
 * Delta:
    δ = (q, a, Z) = (p, BBZ)
    δ = (p, b, B) = (p, &)
    δ = (p, a, Z) = (p, BBZ)
    δ = (p, &, Z) = (p, &)
    δ = (p, a, B) = (p, BBB)
 */