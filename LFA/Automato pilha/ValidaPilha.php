<?php
include __DIR__ . '/css/style.php';
echo '<h1>Automato de Pilha</h1>';
echo '<h2> a^n b^m | n > 0 e m = 2*n </h2>';
echo "<pre>";
/*
?>
<form action="" method="post">
    <label>Entrada:</label>
    <input type="text" name="entrada">
    <input type="submit" value="Verificar">
</form>
<?php
*/
echo "</pre>";
echo "<hr>";
//if (isset($_POST["entrada"])) {
   // $post_user = $_POST["entrada"];
     $post_user = "bbbbbababbb";
    $conversao_p_array = str_split($post_user);
 
    //atribuir um valor vazio na ultima posicao do array
    $conversao_p_array[] = '';

    class ValidaPilha
    {
        public $estado_atual;
        public $entradas;
        public $topo_pilha;
        public $novo_estado;
        public $nova_pilha;
        public $entrada_post;
    }

    var_dump($conversao_p_array);

    $automato = new ValidaPilha();

    /*
 * Atribuo os valores inicias
 */
    $automato->entradas = $conversao_p_array;
    $automato->novo_estado = 'q';
    $automato->topo_pilha = ['Z'];

    foreach ($automato->entradas as $entrada) {

        /*
     * estado e pilha recebem os novos valores
     */
        $automato->estado_atual = $automato->novo_estado; //sobreescreve, OK
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
        //4 finaliza
        if (($automato->estado_atual == 'p') && ($entrada == '') && (end($automato->topo_pilha) == 'Z')) {
            $automato->novo_estado = 'p';
            array_pop($automato->topo_pilha);
        }
        //5
        if (($automato->estado_atual == 'p') && ($entrada == 'a') && (end($automato->topo_pilha) == 'B')) {
            $automato->novo_estado = 'p';
            $automato->nova_pilha = ['B', 'B'];
        }

        /**
         * caso ja tenha feito o desempilhamento nos deltas, ele nao vai juntar os arrays
         */
        if ($automato->nova_pilha) {
            $automato->topo_pilha = array_merge($automato->topo_pilha, $automato->nova_pilha); //ele recebe vazio se o $nova_pilha for vazio
        }

        $automato->nova_pilha = null;

        //esvazia o novo estado
        //esvazia o nova pilha

    } //fim foreach
    if (!$automato->topo_pilha) {
        echo "automato aceito";
/*        
?>
        <h2 style color="green">
            <strong>
                AUTOMATO ACEITO
            </strong>
        </h2>
    <?php
  */  
    } else {
        echo "automato aceito";
    /*    
    ?>
        <h2 style color="green">
            <strong>
                AUTOMATO ACEITO
            </strong>
        </h2>
<?php
*/

    }
//}





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