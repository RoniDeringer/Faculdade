<!DOCTYPE html>
<?php
include_once "acaoVeiculo.php";
$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
$dados;
if ($acao == 'editar') {
    $vei_cod = isset($_GET['vei_cod']) ? $_GET['vei_cod'] : "";
    if ($vei_cod > 0)
        $dados = buscarDados($vei_cod);
}
//var_dump($dados);
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- APAGAR? -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> <!-- APAGAR? -->
    <title>cad</title> <!-- OBSERVAR SE NO EDIT TBM APARECE -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style>
        .container {
            width: 1100px;
            margin: 0 auto;
            height: 900px;
        }

        .cadastro {
            font-size: 40px;
            margin-bottom: 20px;
        }
    </style>

</head>

<body>
    <center>
        <div class="container">
            <br>
            <a href="adm.php"><button type="button" class="btn btn-outline-secondary">Voltar</button></a>
            <br><br>
            <div class="cadastro">CADASTRO VEÍCULO</DIV>



            <form action="acaoVeiculo.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"></label><br>
                    <input readonly  type="text" name="vei_cod" id="vei_cod" value="<?php if ($acao == "editar")         echo $dados['vei_cod'];else echo 0; ?>"><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Placa</label><br>
                    <div id="emailHelp" class="form-text">*Digite os 7 digitos</div>
                    <input required=true type="text" name="vei_placa" id="vei_placa" value="<?php if ($acao == "editar")   echo $dados['vei_placa']; ?>">

                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Modelo</label><br>
                    <input required=true type="text" name="vei_modelo" id="vei_modelo" value="<?php if ($acao == "editar")  echo $dados['vei_modelo'];         ?>">
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Marca</label><br>
                    <input required=true type="text" name="vei_marca" id="vei_marca" value="<?php if ($acao == "editar")   echo $dados['vei_marca'];   ?>">
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">ano</label><br>
                    <input required=true type="text" name="vei_ano" id="vei_ano" value="<?php if ($acao == "editar")        echo $dados['vei_ano']; ?>"><br>
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">codigo condutor</label><br>
                    <input required=true type="text" name="con_cod" id="con_cod" value="<?php if ($acao == "editar")         echo $dados['con_cod']; ?>"><br>
                </div>

                </select><br>
                    <button type="submit" class="btn btn-primary" name="acao" value="salvar" id="acao">Salvar</button>
            </form>


</body>

</html>