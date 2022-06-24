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
</head>
<body>
<?php include "menu.php"; ?>
<?php 
  $pdo = Conexao::getInstance();
  $consulta = $pdo->prepare("SELECT * FROM marca
                             WHERE descricao
                             LIKE :descricao
                             ORDER BY descricao;");
  $valor = "S";
  $consulta->bindValue(':descricao', $valor."%", PDO::PARAM_STR);
  $consulta->execute();
  echo "Iniciados com ".$valor."<br>";
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) 
    echo "Código: {$linha['codigo']} - 
          Descrição: {$linha['descricao']}<br />";

  $valor = "M";
  $consulta->bindValue(':descricao', $valor."%", PDO::PARAM_STR);
  $consulta->execute();
  echo "<br>Iniciados com ".$valor."<br>";
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) 
    echo "Código: {$linha['codigo']} - 
          Descrição: {$linha['descricao']}<br />";
?>          
</body>
</html>