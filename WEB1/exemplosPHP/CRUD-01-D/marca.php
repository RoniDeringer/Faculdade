<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>Novo registro</title>
    <script>
        function validaPagina(){
            var objNome = document.getElementById("descricao");
            if(objNome.value ==""){
                alert("Não pode deixar o campo nulo");
                objNome.focus();  //cursor fica piscando na caixa
                return false;
            }
            return true;
        }
        </script>
</head>
<body>
<form method="post" action="acao.php">
    Descricao <input name="descricao" id="descricao" type="text">
    <button name="acao" value="salvar" id="acao" type="submit"
    onclick="return validaPagina();"> Salvar  
</button>
</form>

</br></br>
<a href="index.php"> VOLTAR</a>



</body>
</html>