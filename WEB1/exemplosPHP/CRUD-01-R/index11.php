<!DOCTYPE html>
<?php 
     include_once "conf/default.inc.php";
     require_once "conf/Conexao.php";
     $title = "Lista de Marcas";
?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <script>
    function excluir(url) {
        if (confirm("Confirmar Exclusão?"))
            location.href = url;
    }
    </script>
</head>
<body>
<?php include "menu.php"; ?>
    
    <?php 
         $pdo = Conexao::getInstance();
         $consulta = $pdo->query("SELECT * FROM marca");
         while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
           $codigo = $linha['codigo'];  
           echo "{$linha['codigo']} - {$linha['descricao']} - "; ?>
           <a href="javascript:excluir('index11_acao.php?codigo=<?php echo $linha['codigo'];?>')">Excluir</a><br>
       <?php }   
       ?>
</body>
</html>