<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>JOGO DA VELHA</title>
    <style>
        body {
            background-color: rgb(109, 22, 22);
            margin: 0 auto;
        }

        .container { 
            width: 1100px;
            margin: 0 auto;
            height: 950px;
            background-color: rgb(30, 30, 30);
        }
    </style>

</head>

<body>
    <div class="container">
        <?php include "menu.php"; ?>

        <center>
            
            <!-- a classe 'resposta' pega o name e compara o value, tipo se jogada==1 entao é papel -->

            <form name="formulario" method="get" action="resposta.php">
                <h1> ESCOLHA SUA MÃO</h1>
                <input type="radio" name="jogada" value="1" > 
                <!--//papel -->
                <label><img src='img/velha/1.png' width="50" height="50"></label><br>

                <input type="radio" name="jogada" value="2" >                 <!-- FORMULARIO -->
                <!--//tesoura -->
                <label><img src='img/velha/2.png' width="50" height="50"></label><br>

                <input type="radio" name="jogada" value="3" >
                <!--//pedra -->
                <label ><img src='img/velha/3.png' width="50" height="50"></label><br>

                <br>

                <input type="submit" value="ENVIAR"> 

          
            </form>

            <br>

        </center>
        

 
        
</body>


</html>