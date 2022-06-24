<!DOCTYPE html>
<?php
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";
$consulta = isset($_POST['consulta']) ? $_POST['consulta'] : "";

?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Detran SC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script>
        function excluirRegistro(url) {
            if (confirm("Confirmar Exclusão?"))
                location.href = url;
        }
    </script>
    <style>
        body {
            background-color: #d9d9d9;
        }

        .containerTable {
            width: 400px;
        }

        .container {
            width: 1100px;
            margin: 0 auto;
            height: 900px;
        }

        .esquerda {
            float: left;
            width: 50%;
            margin-top: 24px;
        }

        .direita {
            width: 40%;
            float: right;
        }

        .texto {
            color: #121011;
        }

        .textoDestaque {
            color: #BF5B04;
            font-size: 30px;
        }

        .adm {
            font-size: 50px;
            text-align: center;
            font-family: Tahoma, sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="adm"> PÁGINA ADMINISTRATIVA</div>
        <br><br>
       


            <br>
            <div class="esquerda">

                <table class="table table-hover" border="1">
                    <tr>
                        <th>
                            <div class="texto">Código</div>
                        </th>
                        <th>
                            <div class="texto">Nome</div>
                        </th>
                        <th>
                            <div class="texto">Detalhes</div>
                        </th>
                        <th>
                            <div class="texto">Alterar</div>
                        </th>
                        <th>
                            <div class="texto">Excluir</div>
                        </th>
                    </tr>

                    <h1>
                        <center>
                            <div class="textoDestaque">Tabela de condutores <a href="cadCondutor.php"><img src="img/add.png" height="40" width="40"></a></div>
                        </center>
                    </h1>
                    <?php
                    $pdo = Conexao::getInstance();
                    $sql = "SELECT * FROM condutor";
                    $consulta = $pdo->query($sql);
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td>
                                <div class="texto"><?php echo $linha['con_cod']; ?></div>
                            </td>
                            <td>
                                <div class="texto"><?php echo $linha['con_nome']; ?></div>
                            </td>
                            <td>
                                <center><a href='detalhes.php?con_cod=<?php echo $linha['con_cod']; ?>'> <img class="icon" src="img/procura.png" width="18" alt=""> </a></center>
                            </td>
                            <td>
                                <center><a href='cadCondutor.php?acao=editar&con_cod=<?php echo $linha['con_cod']; ?>'><img class="icon" src="img/edita.png" width="18" alt=""></a></center>
                            </td>
                            <td>
                                <center><a href="javascript:excluirRegistro('acao.php?acao=excluir&con_cod=<?php echo $linha['con_cod']; ?>')"><img class="icon" src="img/lixo.png" width="18" alt=""></a></center>
                            </td>
                            <!-- delete no cadCondutor -->

                        </tr>
                    <?php } ?>


                </table>

            </div>
            <br>
            <div class="direita">
                <table class="table table-hover" border="1">
                    <tr>
                        <th>
                            <div class="texto">Placa</div>
                        </th>
                        <th>
                            <div class="texto">Modelo</div>
                        </th>
                        <th>
                            <div class="texto">Dono</div>
                        </th>
                        <th>
                            <div class="texto">Alterar</div>
                        </th>
                        <th>
                            <div class="texto">Excluir</div>
                        </th>
                    </tr>

                    <h1>
                        <center>
                            <div class="textoDestaque">Tabela de Veiculos <a href="cadVeiculo.php"><img src="img/add.png" height="40" width="40"></a></div>
                        </center>
                    </h1>
            </div><?php
                    $pdo = Conexao::getInstance();
                    $sql = "SELECT * FROM veiculo";
                    $consulta = $pdo->query($sql);
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                <tr>
                    <td>
                        <div class="texto"><?php echo $linha['vei_placa']; ?></div>
                    </td>
                    <td>
                        <div class="texto"><?php echo $linha['vei_modelo']; ?></div>
                    </td>
                    <td>
                        <center><a href='detalhes.php?con_cod=<?php echo $linha['con_cod']; ?>'> <img class="icon" src="img/procura.png" width="18" alt=""> </a></center>
                    </td>
                    <td>
                        <center><a href='cadVeiculo.php?acao=editar&vei_cod=<?php echo $linha['vei_cod']; ?>'><img class="icon" src="img/edita.png" width="18" alt=""></a></center>
                    </td>
                    <td>
                        <center><a href="javascript:excluirRegistro('acaoVeiculo.php?acao=excluir&vei_cod=<?php echo $linha['vei_cod']; ?>')"><img class="icon" src="img/lixo.png" width="18" alt=""></a></center>
                    </td>


                </tr>
            <?php } ?>
    

    </table>


</body>

</html>