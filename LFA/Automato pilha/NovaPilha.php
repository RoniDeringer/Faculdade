<?php
include __DIR__ . '/css/style.php';
echo '<h1>Automato de Pilha</h1>';
echo '<h2> a^n b^m | n > 0 e m = 2*n </h2>';

echo "<hr>";

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
echo "<pre>";
foreach ($entradas as $entrada) {

    $estado_atual = $novo_estado; 

    //1
    if (($estado_atual == 'q') && ($entrada == 'a') && (end($topo_pilha) == 'Z')) {
        $novo_estado = 'p';
        $nova_pilha = ['B', 'B'];

        echo "Estado Atual:        <strong>$estado_atual</strong><br>" ;

        echo "Palavra a ser lida:  <strong>$entrada</strong><br>";

        echo "Topo da pilha:       ";
        echo implode(', <strong>',$topo_pilha),'</strong>';
    
        echo "<br>Nova Pilha:          ";
        echo implode(', <strong>',$nova_pilha),'</strong>';

        echo "<br>Estado atual:        <strong>$estado_atual</strong><br><br><br>";
    }
    //2
    else if (($estado_atual == 'p') && ($entrada == 'b') && (end($topo_pilha) == 'B')) {
        $novo_estado = 'p';
        array_pop($topo_pilha); //pode dar erro aqui, possivel fazer validação, se passou aqui, nao vai receber  o nova pilha la em cima
        //como ele ja atualizou o topo_pilha, ele ja pode cair em outra validacao antes da proxima entrada(foreach)
    
        echo "Estado Atual:        <strong>$estado_atual</strong><br>" ;

        echo "Palavra a ser lida:  <strong>$entrada</strong><br>";

        echo "Topo da pilha:       ";
        echo implode(', <strong>',$topo_pilha),'</strong>';
    
        echo "<br>Nova Pilha:          <strong>&</strong>";

        echo "<br>Estado atual:        <strong>$estado_atual</strong><br><br><br>";
    }
    //3
    else if (($estado_atual == 'p') && ($entrada == 'a') && (end($topo_pilha) == 'Z')) {
        $novo_estado = 'p';
        $nova_pilha = ['B', 'B'];
        
        echo "Estado Atual:        <strong>$estado_atual</strong><br>" ;

        echo "Palavra a ser lida:  <strong>$entrada</strong><br>";

        echo "Topo da pilha:       ";
        echo implode(', <strong>',$topo_pilha),'</strong>';
    
        echo "<br>Nova Pilha:          ";
        echo implode(', <strong>',$nova_pilha),'</strong>';

        echo "<br>Estado atual:        <strong>$estado_atual</strong><br><br><br>";
    }
    //4 finaliza
    else if (($estado_atual == 'p') && ($entrada == '') && (end($topo_pilha) == 'Z')) {
        $novo_estado = 'p';
        array_pop($topo_pilha);
    
        echo "Estado Atual:        <strong>$estado_atual</strong><br>" ;

        echo "Palavra a ser lida:  <strong>$entrada</strong><br>";

        echo "Topo da pilha:       ";
        echo implode(', <strong>',$topo_pilha),'</strong>';
    
        echo "<br>Nova Pilha:          <strong>&</strong>";

        echo "<br>Estado atual:        <strong>$estado_atual</strong><br><br><br>";
    }
    //5
    else if (($estado_atual == 'p') && ($entrada == 'a') && (end($topo_pilha) == 'B')) {
        $novo_estado = 'p';
        $nova_pilha = ['B', 'B'];
       
        echo "Estado Atual:        <strong>$estado_atual</strong><br>" ;

        echo "Palavra a ser lida:  <strong>$entrada</strong><br>";

        echo "Topo da pilha:       ";
        echo implode(', <strong>',$topo_pilha),'</strong>';
    
        echo "<br>Nova Pilha:          ";
        echo implode(', <strong>',$nova_pilha),'</strong>';

        echo "<br>Estado atual:        <strong>$estado_atual</strong><br><br><br>";
    } else {
        echo "automato nao aceito";
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

echo "</pre>";
echo "<pre>";
if (!$topo_pilha) {
    echo "automato aceito";
} else {
    echo "automato NÃO aceito";
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