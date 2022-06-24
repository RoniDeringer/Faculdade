<!DOCTYPE html>
<?php 
   include_once "conf/default.inc.php";
   require_once "conf/Conexao.php";
   $title = "Lista de Estudantes";
   $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<?php include "menu.php"; ?>
    <form method="post">
    <fieldset>
        <legend>Procurar Estudantes</legend>
        <input type="text"   name="procurar" id="procurar" size="37" value="<?php echo $procurar;?>">
        <input type="submit" name="acao"     id="acao">
        <br><br>
        <table>
	    <tr>
            <td><b>Código</b></td>
            <td><b>Nome</b></td> 
            <td><b>Nota1</b></td>
            <td><b>Nota2</b></td>
            <td><b>Nota3</b></td>
            <td><b>Nota4</b></td>
            <td><b>Média</b></td>
            <td><b>Resultado</b></td>
            <td><b>Data de Nascimento</b></td>
            <td><b>Idade</b></td>
        </tr>
        <?php
            $pdo = Conexao::getInstance(); 
            $consulta = $pdo->query("SELECT * FROM estudante 
                                     WHERE nome LIKE '$procurar%' 
                                     ORDER BY nome");
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
                $media = ($linha['n1'] + $linha['n2'] + $linha['n3'] + $linha['n4'])/4;
                
                $hoje = date("Y");
                $nasc = date("Y",strtotime($linha['nascimento']));

                $resultado = "Reprovado";
                $class = "red";
                if ($media >= 7){
                    $resultado = "Aprovado";
                    $class = "blue";
                }
                
            

        ?>
	    <tr>
            <td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['nome'];?></td>
            <td><?php echo number_format($linha['n1'], 1, ',', '.');?></td>
            <td><?php echo number_format($linha['n2'], 1, ',', '.');?></td>
            <td><?php echo number_format($linha['n3'], 1, ',', '.');?></td>
            <td><?php echo number_format($linha['n4'], 1, ',', '.');?></td>
            <td><?php echo number_format($media, 2, ',', '.');?></td>
            <td class="<?php echo $class;?>"><?php echo $resultado;?></td>
            <td><?php echo date("d/m/Y",strtotime($linha['nascimento']));?></td>
            <td><?php echo $hoje - $nasc;?></td>
	    </tr>
            <?php } ?>       
        </table>
    </fieldset>
    </form>
</body>
</html>
