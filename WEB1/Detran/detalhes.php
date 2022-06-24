<!DOCTYPE html>
<?php
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";
$title = "Detalhes";
$con_cod = isset($_GET['con_cod']) ? $_GET['con_cod'] : "1";
?>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title> <?php echo $title; ?> </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<div class="container-md">

  <body>
    <h1><center>Detalhes<center></h1>
    <a href="adm.php"><button type="button" class="btn btn-outline-secondary">Voltar</button></a>
    </br></br>

    <div class="container">
      <div class="row">
        <div class="col-sm-8">


          <h1> DADOS DO CONDUTOR:</h1>
          <?php

          $sql =      "SELECT * FROM condutor WHERE con_cod = $con_cod";
          $sqlVeiculo = "SELECT * FROM veiculo where con_cod = $con_cod";
          $pdo = Conexao::getInstance();
          $consulta2 = $pdo->query($sqlVeiculo);
          $consulta = $pdo->query($sql);
          while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
          ?>



            <table class="table table-hover">
              <tr>
                <th scope="row">Código</th>
                <td><?php echo "{$linha['con_cod']}" ?></th>
              </tr>
              <tr>
                <th scope="row">Nome</th>
                <td><?php echo "{$linha['con_nome']}" ?></td>
              </tr>
              <tr>
                <th scope="row">Total de multas</th>
                <td><?php echo "{$linha['con_num_multas']}" ?></td>
              </tr>
              <tr>
                <th scope="row">Pontos</th>
                <td colspan="2"><?php echo "{$linha['con_pontos']}" ?></td>
              </tr>
              <tr>
                <th scope="row">Categoria </th>
                <td><?php echo "{$linha['con_categoria']}" ?></td>
              </tr>
              </tbody>
            </table> <?php } ?>
          
          </div>
        <div class="col-sm-4">
          <br><br><br>
          <h1> VEICULOS: </h1><br> <?php
                                    while ($linha = $consulta2->fetch(PDO::FETCH_BOTH)) {

                                    ?>

            <table class="table table-hover">
              <tbody>
                <tr>
                  <th scope="row">Placa</th>
                  <td><?php echo "{$linha['vei_placa']}" ?></td>
                </tr>
                <tr>
                  <th scope="row">Marca</th>
                  <td><?php echo "{$linha['vei_marca']}" ?></td>
                </tr>
                <tr>
                  <th scope="row">Modelo</th>
                  <td colspan="2"><?php echo "{$linha['vei_modelo']}" ?></td>
                </tr>
                <tr>
                  <th scope="row">Ano </th>
                  <td><?php echo "{$linha['vei_ano']}" ?></td>
                </tr>
              </tbody>
            </table><br> <?php } ?>

  </body>

</html>