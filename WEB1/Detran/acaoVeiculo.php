<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    // Se foi enviado via GET para acao entra aqui
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $vei_cod = isset($_GET['vei_cod']) ? $_GET['vei_cod'] : 0;
        excluir($vei_cod);
    }

    // Se foi enviado via POST para acao entra aqui
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $vei_cod = isset($_POST['vei_cod']) ? $_POST['vei_cod'] : "";
        if ($vei_cod == 0)
            inserir($vei_cod);
        else
            editar($vei_cod);
    }

    // Métodos para cada operação
    function inserir($vei_cod){
        $dados = dadosForm();
        //var_dump($dados);
        
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO veiculo (vei_placa, vei_modelo, vei_marca, vei_ano,con_cod) VALUES
        (:vei_placa,:vei_modelo,:vei_marca,:vei_ano,:con_cod)');
        
        $vei_placa =  $dados['vei_placa'];
        $vei_modelo = $dados['vei_modelo'];
        $vei_marca = $dados['vei_marca'];
        $vei_ano =$dados['vei_ano'];
        $con_cod =$dados['con_cod'];

        $stmt->bindParam(':vei_placa', $vei_placa, PDO::PARAM_STR);
        $stmt->bindParam(':vei_modelo', $vei_modelo, PDO::PARAM_STR); 
        $stmt->bindParam(':vei_marca', $vei_marca, PDO::PARAM_STR);
        $stmt->bindParam(':vei_ano', $vei_ano, PDO::PARAM_INT);    
        $stmt->bindParam(':con_cod', $con_cod, PDO::PARAM_INT);    
        $stmt->execute();
        header("location:adm.php");
        
    }
  

    function editar($vei_cod){  
        $dados = dadosForm();
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE veiculo SET vei_placa = :vei_placa, vei_marca = :vei_marca, vei_modelo = :vei_modelo,
        vei_ano = :vei_ano  WHERE vei_cod = :vei_cod');
        $vei_marca =  $dados['vei_marca'];
        $vei_modelo = $dados['vei_modelo'];
        $vei_ano =    $dados['vei_ano'];
        $vei_placa =  $dados['vei_placa'];
        $con_cod =    $dados['con_cod'];
        $vei_cod =    $dados['vei_cod'];

        $stmt->bindParam(':con_cod',   $con_cod,    PDO::PARAM_INT);
        $stmt->bindParam(':vei_placa', $vei_placa,  PDO::PARAM_STR);
        $stmt->bindParam(':vei_marca', $vei_marca,  PDO::PARAM_STR); 
        $stmt->bindParam(':vei_modelo',$vei_modelo, PDO::PARAM_STR);
        $stmt->bindParam(':vei_ano',   $vei_ano,    PDO::PARAM_INT);
        $stmt->bindParam(':vei_cod',   $vei_cod,    PDO::PARAM_INT);
        
        $stmt->execute();
        header("location:adm.php");
    }
   
    
 
    function excluir($vei_cod){    // fazer pro veiculo
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE from veiculo WHERE vei_cod = :vei_cod');
        $codigoD = $vei_cod;
        $stmt->bindParam(':vei_cod', $codigoD, PDO::PARAM_INT);
        $stmt->execute();
        header("location:adm.php");
    }
 


    // Busca um item pelo código no BD
    function buscarDados($vei_cod){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM veiculo WHERE vei_cod = $vei_cod");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['vei_placa']  = $linha['vei_placa'];
            $dados['vei_marca']  = $linha['vei_marca']; 
            $dados['vei_modelo'] = $linha['vei_modelo']; 
            $dados['vei_ano']    = $linha['vei_ano']; 
            $dados['con_cod']    = $linha['con_cod'];
            $dados['vei_cod']    = $linha['vei_cod'];
           
        }
        //var_dump($dados);
        return $dados;
    }


    
     // Busca as informações digitadas no form
     function dadosForm(){
        $dados = array();
        $dados['vei_placa'] = $_POST['vei_placa'];
        $dados['vei_modelo'] = $_POST['vei_modelo'];
        $dados['vei_ano'] = $_POST['vei_ano'];
        $dados['vei_marca'] = $_POST['vei_marca'];
        $dados['vei_cod'] = $_POST['vei_cod'];
        $dados['con_cod'] = $_POST['con_cod'];
        return $dados;
    }

?>