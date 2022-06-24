<!DOCTYPE html>
<?php
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "1";
$procurar = isset($_POST['procurar']) ? $_POST['procurar'] : "";
$con_cod = isset($_GET['con_cod']) ? $_GET['con_cod'] : "1";
?>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Detran SC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>



    </style>
</head>

<body>
    <header>
        <?php
        $idRecebido = $_POST["procurar"];   //ele pega o valor do ID 

        $pdo = Conexao::getInstance();
        $sql = "SELECT * FROM condutor WHERE con_cod=$idRecebido";
        $consulta = $pdo->query($sql);
        while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
            $nome = $linha["con_nome"];
        } ?>

        <h1>Olá <b><?php echo $nome ?></b>, aqui está sua consulta!</h1>
        <!--cabeçalho -->
    </header>


    <?php

    $sql =      "SELECT * FROM condutor  WHERE con_cod = $con_cod";
    $sqlVeiculo = "SELECT * FROM veiculo where con_cod = $con_cod";
    $pdo = Conexao::getInstance();
    $consulta2 = $pdo->query($sqlVeiculo);
    $consulta = $pdo->query($sql);
    while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
    ?>
        <h1>Seus dados:</h1><?php
                            echo "Seu código: {$linha['con_cod']} <br/>Nome Completo: {$linha['con_nome']} 
       -  Número de multas: {$linha['con_num_multas']}  -  Pontos na carteira: {$linha['con_pontos']} <br/>
        Categoria da carteira: {$linha['con_categoria']} <br/>
        <br>";
                        }



                        
                            ?><h1>Seus veiculos:</h1><?php
                                                            $pdo = Conexao::getInstance();
                                                            $sql = "SELECT * FROM veiculo WHERE con_cod=$idRecebido";
                                                            $consulta = $pdo->query($sql);
                                                            while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
                                                                echo "Modelo: {$linha['vei_modelo']} - Marca: {$linha['vei_marca']} <br/> 
            Placa: {$linha['vei_placa']}  ano: {$linha['vei_ano']} 
        <br><br><br>";
                                                            }

                                                            ?>


</body>

</html>