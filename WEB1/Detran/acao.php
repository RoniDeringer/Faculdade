<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    // Se foi enviado via GET para acao entra aqui
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $con_cod = isset($_GET['con_cod']) ? $_GET['con_cod'] : 0;
        excluir($con_cod);
    }

    // Se foi enviado via POST para acao entra aqui
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $con_cod = isset($_POST['con_cod']) ? $_POST['con_cod'] : "";
        if ($con_cod == 0)
            inserir($con_cod);
        else
            editar($con_cod);
    }

    // Métodos para cada operação
    function inserir($con_cod){
        $dados = dadosForm();
        //var_dump($dados);
        
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO condutor (con_nome,con_num_multas,con_pontos,con_categoria) VALUES
        (:con_nome,:con_num_multas,:con_pontos,:con_categoria)');
        
        $con_nome = $dados['con_nome'];
        $con_num_multas = $dados['con_num_multas'];
        $con_pontos =$dados['con_pontos'];
        $con_categoria =  $dados['con_categoria'];

        $stmt->bindParam(':con_nome', $con_nome, PDO::PARAM_STR);
        $stmt->bindParam(':con_num_multas', $con_num_multas, PDO::PARAM_STR);  //BOTEI STR E NAO DEU ERRO
        $stmt->bindParam(':con_pontos', $con_pontos, PDO::PARAM_STR);
        $stmt->bindParam(':con_categoria', $con_categoria, PDO::PARAM_STR);

        
        $stmt->execute();
        header("location:adm.php");
        
    }
  
        

    function editar($con_cod){  
        $dados = dadosForm();
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE condutor SET con_nome = :con_nome, con_num_multas = :con_num_multas,
        con_pontos = :con_pontos, con_categoria = :con_categoria  WHERE con_cod = :con_cod');
        $con_nome = $dados['con_nome'];
        $con_num_multas = $dados['con_num_multas'];
        $con_pontos = $dados['con_pontos'];
        $con_categoria = $dados['con_categoria'];
        $con_cod = $dados['con_cod'];
        
        $stmt->bindParam(':con_cod', $con_cod, PDO::PARAM_INT);
        $stmt->bindParam(':con_nome', $con_nome, PDO::PARAM_STR);
        $stmt->bindParam(':con_num_multas', $con_num_multas, PDO::PARAM_INT); 
        $stmt->bindParam(':con_pontos', $con_pontos, PDO::PARAM_INT);
        $stmt->bindParam(':con_categoria', $con_categoria, PDO::PARAM_STR);
        
        $stmt->execute();
        header("location:adm.php");
    }
   
    
 
    function excluir($con_cod){   
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE from condutor WHERE con_cod = :con_cod');
        $codigoD = $con_cod;
        $stmt->bindParam(':con_cod', $codigoD, PDO::PARAM_INT);
        $stmt->execute();
        header("location:adm.php");
    }
 


    // Busca um item pelo código no BD
    function buscarDados($con_cod){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM condutor WHERE con_cod = $con_cod");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['con_cod']        = $linha['con_cod'];
            $dados['con_nome']       = $linha['con_nome']; 
            $dados['con_num_multas'] = $linha['con_num_multas']; 
            $dados['con_pontos']     = $linha['con_pontos']; 
            $dados['con_categoria']  = $linha['con_categoria']; 
        }
        //var_dump($dados);
        return $dados;
    }

    // Busca as informações digitadas no form
    function dadosForm(){
        $dados = array();
        $dados['con_cod'] = $_POST['con_cod'];
        $dados['con_nome'] = $_POST['con_nome'];
        $dados['con_num_multas'] = $_POST['con_num_multas'];
        $dados['con_pontos'] = $_POST['con_pontos'];
        $dados['con_categoria'] = $_POST['con_categoria'];
        return $dados;
    }

?>