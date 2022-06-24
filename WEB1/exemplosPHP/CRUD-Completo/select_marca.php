<?php include 'connect/connect.php'; ?>








<select name="marca" id="marca">
        <?php 
            $sql = 'SELECT * FROM '.$tb_marca.' ORDER by descricao';
            echo $sql;
            $result = mysqli_query($conexao,$sql);
            while ($row = mysqli_fetch_array($result)){
                echo '<option value="'.$row['codigo'].'"'.
                     '>'.$row['descricao'].'</option>';
            }
        ?>	    
</select>

