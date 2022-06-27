<?php
$post_user = "ababbb";

$conversao_p_array = str_split($post_user);
$conversao_p_array[] = '';


$estado_atual;
$entradas;
$topo_pilha;
$novo_estado;
$nova_pilha;
$entrada_post;




$entradas = $conversao_p_array;
$novo_estado = 'q';
$topo_pilha = ['Z'];
foreach ($entradas as $entrada) {

    $estado_atual = $novo_estado;

    //1
    if (($estado_atual == 'q') && ($entrada == 'a') && (end($topo_pilha) == 'Z')) {
        $novo_estado = 'p';
        $nova_pilha = ['B', 'B'];
    }
    //2
    else if (($estado_atual == 'p') && ($entrada == 'b') && (end($topo_pilha) == 'B')) {
        $novo_estado = 'p';
        array_pop($topo_pilha); //pode dar erro aqui, possivel fazer validação, se passou aqui, nao vai receber  o nova pilha la em cima
        //como ele ja atualizou o topo_pilha, ele ja pode cair em outra validacao antes da proxima entrada(foreach)

    }
    //3
    else if (($estado_atual == 'p') && ($entrada == 'a') && (end($topo_pilha) == 'Z')) {
        $novo_estado = 'p';
        $nova_pilha = ['B', 'B'];
    }
    //4 finaliza
    else if (($estado_atual == 'p') && ($entrada == '') && (end($topo_pilha) == 'Z')) {
        $novo_estado = 'p';
        array_pop($topo_pilha);
    }
    //5
    else if (($estado_atual == 'p') && ($entrada == 'a') && (end($topo_pilha) == 'B')) {
        $novo_estado = 'p';
        $nova_pilha = ['B', 'B'];
    } else {
        break;
    }

    /**
     * caso ja tenha feito o desempilhamento nos deltas, ele nao vai juntar os arrays
     */
    if ($nova_pilha) {
        $topo_pilha = array_merge($topo_pilha, $nova_pilha); //ele recebe vazio se o $nova_pilha for vazio
    }

    $nova_pilha = null;
} //fim foreach


if (!$topo_pilha) {
    echo "<b>Autômato aceito</b>";
} else {
    echo "<b>Autômato NÃO aceito</b>";
}
echo "</pre>";


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