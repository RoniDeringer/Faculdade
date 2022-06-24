
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>TESTE</title>
    <style>
        body {
            background-color: #0d0d0d;
            margin: 0 auto;
            color: white;
        }

        .container { 
            width: 1100px;
            margin: 0 auto;
            height: 950px;
            background-color: #001a24;
        }   
              
    </style>
</head>
<body>
    <div class="container">
    <center>    

        <h1>DATA ATUAL:</H1>
        <?php
        
            echo date('d/m/y'); 
            echo "<br>";
            echo date('D/M/Y');     
            echo "<br>";
            echo date ('Y-m-d H:i:s');
            
            
         ?>
        <br>
        <br>

        <h1>DATAS FUTURAS:</H1>
        <?php
            echo 'O proximo MÊS é: ' . date('M', strtotime('+1month'));  
            echo "<br>"; //lembrando q pode ser m ou d maiusculo
            echo 'O proximo DIA é: ' . date('d', strtotime('+1day'));
            echo "<br>"; 
            echo 'O proximo ANO é: ' . date('Y', strtotime('+1years'));
         ?>
        <br>

        <h1>DIFERENÇA DE DATAS:</H1>
        <?php

        $data1 = strtotime ('2021-11-17 10:20:00');
        $data2 = strtotime ('2021-11-16 10:20:00');
        $diferencaSegundos = $data1 - $data2;
        echo $diferencaSegundos;                    //Segundos
        echo "<br>";
        $diferencaMinutos = $diferencaSegundos / 60;  //minutos
        echo $diferencaMinutos;
        echo "<br>";
        $diferencaHoras = $diferencaSegundos / 60 /60;  //Horas
        echo $diferencaHoras;
        echo "<br>";
        $diferencaDias = $diferencaSegundos / 60 /60 /24; //Dias
        echo $diferencaDias;
            ?>


        <br>
        <h1>DIFERENÇA DA DATA ATUAL:</H1>
        <?php
        $dataOntem = strtotime('2021-11-15');
        $dataHoje = time();
        echo 'primeira data: ' .date('15/11/2021');
        echo "<br>";
        echo 'Segunda data: ' .date('d/m/Y'); 
        echo "<br>";
        echo ("<br> dias que passou:<br>" );
        $diferenca = $dataHoje - $dataOntem;
        $diferenca = $diferenca /60 /60 /24;
        echo $diferenca;  //ta em float
        echo "<br>";
        echo round($diferenca);
        ?>

        <br>
        <h1> DIAS QUE FALTAM PRO MEU CASAMENTO COM A CREMOSA </h1>
        <?php
        echo 'DATA DO CASÓRIO: ' . date('2028-10-28 ');
        echo "<br>";
        $dataCasamento= strtotime ('2028-10-28');
        $dataHoje = time();
        $diff = $dataCasamento - $dataHoje;  //ta em seg
        $diff = $diff /60 / 60 / 24;
        echo round ($diff);

         ?>
        
        <br>
        <br>
        <h1> strftime </h1>
        <?php
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');  //deixar strftime em ptbr
        $dataAtual = strftime('%A, %d de %B de %Y às %Hh%M', TIME());
        echo 'data atual:<br>'  . $dataAtual;
        echo "<br>";
        echo "exemplo de mostrar data: <br>";
        $dataQualquer = '2010-10-11 11:25:00';
        echo  strftime('%A, %d de %B de %Y às %Hh%M', strtotime($dataQualquer));

         ?>
        
            
            
        </center>
        

 
        
</body>


</html>