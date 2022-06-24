<!DOCTYPE html>
<?php 
     include_once "conf/default.inc.php";
     require_once "conf/Conexao.php";
     $title = "Lista de Clientes";
     $id = isset($_GET['id']) ? $_GET['id'] : "1";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
</head>
<body>
<?php
   
    $sql = "SELECT * FROM cliente WHERE id = $id";
   
    $pdo = Conexao::getInstance(); 
    $consulta = $pdo->query($sql);
    while ($linha = $consulta->fetch(PDO::FETCH_BOTH)){
        echo "Código: {$linha['id']} - Nome: {$linha['nome']}<br />";
        if ($linha['sexo'] == 1){
            echo "Sexo: Masculino";
        }
        else{
            echo "Sexo: Feminino";
        }
        echo " - CPF: {$linha['cpf']} - RG: {$linha['rg']}</br>";
        echo "Fone: {$linha['fone']} - Celular: {$linha['celular']} - E-mail: {$linha['email']}</br>";
        echo "Usuário: {$linha['usuario']} - Senha: {$linha['senha']} - Data de Nascimento: {$linha['dataNascimento']}</br>";
        if ($linha['ativo'] == 1){
            echo "Usuário: Habilitado";
        }
        else{
            echo "Usuário: Desabilitado";
        }
    }
?>
</body>
</html>