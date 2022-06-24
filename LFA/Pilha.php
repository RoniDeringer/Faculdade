<?php
/**
 * @author Roni Deringer <ronideringer@gmail.com>
 */
include __DIR__ . '/css/style.php';
echo '<h1>Automato de Pilha</h1>';

echo '<h2> a^n b^m | n > 0 e m = 2*n </h2>';
echo "<pre>";
?>
    <form action="" method="post">
        <label>Entrada:</label>
        <input type="text" name="entrada">
        <input type="submit" value="Verificar">
    </form>
<?php
echo "</pre>";
echo "<hr>";

if (isset($_POST["entrada"])) {

    $entrada = $_POST["entrada"];



        //aqui codigo


    echo "<pre>";
    echo $entrada;
    echo "</pre>";
}
?>