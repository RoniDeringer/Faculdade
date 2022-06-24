<!DOCTYPE html>
<?php 
     include_once "conf/default.inc.php";
     require_once "conf/Conexao.php";
     $title = "Lista de Atletas";
     $id = isset($_GET['id']) ? $_GET['id'] : "1";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
</head>
<body>
<?php
   
    $sql = "SELECT * FROM atleta WHERE id = $id";
   
    $pdo = Conexao::getInstance(); 
    $consulta = $pdo->query($sql);
    while ($linha = $consulta->fetch(PDO::FETCH_BOTH)){
        echo "Código: {$linha['id']} - Nome: {$linha['nome']}</br></br>";
        echo "-------------- NOTAS --------------</br>";
        echo "Nota 1: {$linha['nota1']}</br>";
        echo "Nota 2: {$linha['nota2']}</br>";
        echo "Nota 3: {$linha['nota3']}</br>";
        echo "Nota 4: {$linha['nota4']}</br>";
        echo "Nota 5: {$linha['nota5']}</br></br>";
        $maior = max($linha['nota1'],$linha['nota2'],$linha['nota3'],$linha['nota4'],$linha['nota5']);
        $menor = min($linha['nota1'],$linha['nota2'],$linha['nota3'],$linha['nota4'],$linha['nota5']);
        echo "-------- NOTAS DESCARTADAS --------</br>";
        echo "Maior: {$maior}</br>";
        echo "Menor: {$menor}</br></br>";
        echo "-------- RESULTADO FINAL -----------</br>";
        $soma = ($linha['nota1']+$linha['nota2']+$linha['nota3']+$linha['nota4']+$linha['nota5']-$maior-$menor);
        echo "Soma: ".number_format($soma, 2, '.', ',')."</br>";
        $media = ($linha['nota1']+$linha['nota2']+$linha['nota3']+$linha['nota4']+$linha['nota5']-$maior-$menor)/3;
        echo "Média: ".number_format($media, 2, '.', ',')."</br>";
    }
?>
</body>
</html>