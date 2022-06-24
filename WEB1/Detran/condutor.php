<!DOCTYPE html>
<?php 
     include_once "conf/default.inc.php";
     require_once "conf/Conexao.php";
     $procurar = isset($_POST['procurar']) ? $_POST['procurar'] : "";
?>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Detran SC</title>
</head>

<body>
<center>
    <header>
        <h1>Condutor</h1><br><br><br><br>
    </header>
    <center>
       <h1> </h1>
       
   

    <form method="post" action="condutor_leitura.php">
    
    <label for="username">Informe seu ID:</label><br>
    <input type="text" name="procurar" id="procurar" ><br>
   <br><br><button type="submit" class="btn btn-primary"value="Consultar">Consultar</button>

  
</form>


            
      




<br>

</body>

</html>