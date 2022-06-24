<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>RESPOSTA</title>
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

        .voceJogou {
            color: rgb(194, 194, 194);
            font-size: 70px;
            text-align: center;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;

        }

        .pcJogou {
            color: rgb(194, 194, 194);
            font-size: 70px;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            text-align: center;
        }

        .imgPC {
            text-align: right;

            text-align: center;
        }

        .imgVC {
            text-align: left;

            text-align: center;
        }

        .vocePrincipal {

            width: 50%;
            float: left;
            text-align: left;
        }

        .pcPrincipal {

            width: 50%;
            float: right;
            text-align: right;
        }

        .principal {  
            height: 600px;  

        }

        .empate {

            color: rgb(194, 194, 194);
            font-size: 70px;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            text-align: center;
        }

        .respostaWin {
            color: green;
            font-size: 70px;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            text-align: center;
        }

        .respostaLoser {
            color: red;
            font-size: 70px;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            text-align: center;
        }

        .button1 {
            margin-top: 10px;
            background-color: white;
            background-color: rgb(30, 30, 30);
            border: 4px solid rgb(109, 22, 22);
        }

        .button1:hover {
            background-color: rgb(109, 22, 22);
            color: white;
        }

        a {
            color: rgb(194, 194, 194);
            font-size: 40px;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            text-align: center;

        }
    </style>

</head>

<body>
    <div class="container">
        <?php


        $vjogada   = $_GET["jogada"];   //ele pegar o valor 1,2,3 pra saber qual o valor recebido do radio


        $aleatorio = rand(1, 3);     //ele gera um valor aleatorio pra combater o usuario
        ?>


        <div class="principal">     <!-- div que pega os 2 textos e as 2 imagens superiores-->
            <div class="vocePrincipal">  <!-- div do texto e img esquerda-->
                <div class="voceJogou">VOCE JOGOU:</div><br>

                <div class="imgVC">
                    <?php echo "<img src='img/velha/$vjogada.png' alt=''>"; ?>
                </div>
            </div>

            <div class="pcPrincipal"> <!-- div do texto e img DIREITA-->
                <div class="pcJogou">PC JOGOU:</div><br>
                <div class="imgPC">
                    <?php echo "<img src='img/velha/$aleatorio.png' alt=''>"; ?>
                </div>
            </div>
        </div>
        <CENTER>


            <?php

            if (($vjogada == 1) && ($aleatorio == 1) ||     //EMPATE
                ($vjogada == 2) && ($aleatorio == 2) ||     //EMPATE
                ($vjogada == 3) && ($aleatorio == 3)        //EMPATE
            ) {
            ?>
                <div class="empate"> <marquee scrollamount="30" behavior="alternate">DEU EMPATE</marquee></div>

            <?php


            } elseif (($vjogada == 1) && ($aleatorio == 2)) {      //usuario jogou papel    e o random tesoura
            //   echo "vc perdeu PAPEL COM TESOURA";
            ?><div class="respostaLoser">VOCÊ PERDEU</div><?php
            echo "<img src='img/velha/12.png' alt=''>";

             } elseif (($vjogada == 1) && ($aleatorio == 3)) {  //usuario jogou papel    e o random pedra
            //    echo "vc ganhou PAPEL COM PEDRA";
            ?><div class="respostaWin">VOCÊ GANHOU</div><?php
            echo "<img src='img/velha/13.png' alt=''>";

            } elseif (($vjogada == 2) && ($aleatorio == 1)) {  //usuario jogou tesoura  e o random papel
            //  echo "vc ganhou TESOURA COM PAPEL";
            ?><div class="respostaWin">VOCÊ GANHOU</div><?php
            echo "<img src='img/velha/12.png' alt=''>";

            } elseif (($vjogada == 2) && ($aleatorio == 3)) {  //usuario jogou tesoura  e o random pedra
            //   echo "vc PERDEU TESOURA COM PEDRA";
            ?><div class="respostaLoser">VOCÊ PERDEU</div><?php
            echo "<img src='img/velha/11.png' alt=''>";
            
            } elseif (($vjogada == 3) && ($aleatorio == 1)) {  //usuario jogou pedra    e o random pepel
            // echo "vc PERDEU PEDRA COM PAPEL";
            ?><div class="respostaLoser">VOCÊ PERDEU</div><?php
            echo "<img src='img/velha/13.png' alt=''>";

            } elseif (($vjogada == 3) && ($aleatorio == 2)) {  //usuario jogou pedra    e o random tesoura
            // echo "vc GANHROU PEDRA COM TESOURA";
            ?><div class="respostaWin">VOCÊ GANHOU</div><?php
            echo "<img src='img/velha/11.png' alt=''>";
             }


             ?>
</body>
<footer>

    <br>
    <button class="button button1">
        <a href="velha.php" style="text-decoration:none" target="_blank">JOGAR OUTRA VEZ</a>
    </button>

</footer>

</html>