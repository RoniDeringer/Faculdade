<!DOCTYPE html>
<?php
include_once "acao.php";
$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
$dados;
if ($acao == 'editar') {
    $con_cod = isset($_GET['con_cod']) ? $_GET['con_cod'] : "";
    if ($con_cod > 0)
        $dados = buscarDados($con_cod);
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
            <div class="cadastro">CADASTRO CONDUTOR</DIV>

            <form action="acao.php" method="post">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"></label><br>
                    <input readonly type="text" name="con_cod" id="con_cod" value="<?php if ($acao == "editar") echo $dados['con_cod'];
                                                                                    else echo 0; ?>"><br>
           

                </div>


                <div class="mb-3" action="acao.php" method="post">
                    <label for="exampleInputEmail1" class="form-label">Nome</label><br>
                    <div id="emailHelp" class="form-text">*Nome completo</div>
                    <input required=true type="text" name="con_nome" id="con_nome" value="<?php if ($acao == "editar")   echo $dados['con_nome'];
                                                                                            else echo 0; ?>">

                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Número de multas</label><br>
                    <input required=true type="text" name="con_num_multas" id="con_num_multas" value="<?php if ($acao == "editar")   echo $dados['con_num_multas'];
                                                                                                        ?>">
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Pontos</label><br>
                    <input required=true type="text" name="con_pontos" id="con_pontos" value="<?php if ($acao == "editar")   echo $dados['con_pontos'];
                                                                                                ?>">
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Categoria</label><br>
                    <input required=true type="text" name="con_categoria" id="con_categoria" value="<?php if ($acao == "editar")   echo $dados['con_categoria']; ?>">
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="acao" id="acao"value="salvar">Salvar</button>
            </form>


</body>

</html>