<?php
	
	session_start();
	
	include 'connect/connect.php';
	require_once "pChart/class/pDraw.class.php";
	require_once "pChart/class/pImage.class.php";
	require_once "pChart/class/pData.class.php";
	require_once "pChart/class/pPie.class.php";


	
	
	$acao = '';
	if (isset($_GET["acao"]))
		  $acao = $_GET["acao"];

    if ($acao == "relMarca"){
		relatorioMarca();
	}else if ($acao == "relPosVencimento"){
		relatorioPosVencimento();
	}else if ($acao == "relNoVencimento"){
		relatorioNoVencimento();
	}



	function relatorioMarca(){
		//
		$conexao = $GLOBALS['conexao'];
		//
		$sqlMarca= "select 
  			m.descricao,
  			sum(vhp.quantidade) qtde_vendida,
  			sum(p.preco*vhp.quantidade) total_vendido
		from
  			venda v,
  			venda_has_produto vhp,
  			produto p,
  			marca m  
		where
  			(v.codigo=vhp.venda_codigo)
		and
  			(p.codigo=vhp.produto_codigo)
		and
  			(p.marca_codigo=m.codigo)
		group by 
   			m.codigo";

   		$myDataset = array();
   		$legendas = array();
		//fazer a consulta		
		$result = mysqli_query($conexao,$sqlMarca);
    	$cont = 0;
  		while ($row = mysqli_fetch_array($result)){ 
  			$myDataset[] = $row['total_vendido'];
  			$legendas[] = $row['descricao'];
  		}
  		//
		$myData = new pData(); 
		$myData->addPoints($myDataset, "vendas");
		$myData->addPoints($legendas, "legenda");
		$myData->setAbscissa("legenda");
		//
		$myImage = new pImage(500, 300, $myData);
		$myImage->setFontProperties(array(
    		"FontName" => "libs/pchart/fonts/GeosansLight.ttf",
    		"FontSize" => 15));

		$myImage->setGraphArea(40,40, 460,260);

		$pieChart = new pPie($myImage,$myData);
		$pieChart->draw3DPie(250,200,array("Radius"=>80,"DrawLabels"=>TRUE,"DataGapAngle"=>10,"DataGapRadius"=>6,"Border"=>TRUE));


		$myImage->Stroke();
	}

	function relatorioPosVencimento(){
	}
	function relatorioNoVencimento(){
		//
		$conexao = $GLOBALS['conexao'];
		//
		$sqlNoVencimento = "select  v.*, vhp.*,  p.*,  m.* ".
		" from  venda v, venda_has_produto vhp, produto p, marca m  ".
		" where  (v.codigo=vhp.venda_codigo) and ".
  		" (p.codigo=vhp.produto_codigo) ".
		" and (p.marca_codigo=m.codigo) ".
    	" and v.dataPagamento <= v.dataVencimento";

		$myDataset = array();
		//fazer a consulta		
		$result = mysqli_query($conexao,$sqlNoVencimento);
    	$cont = 0;
  		while ($row = mysqli_fetch_array($result)){ 
  			$myDataset[] = $row['preco'];
  			$myDataset2[] = $row['quantidade'];
  		}
  		//
		$myData = new pData(); 
		$myData->addPoints($myDataset, "Preço");
		$myData->addPoints($myDataset2, "Quantidade");
		//
		$myImage = new pImage(500, 300, $myData);
		$myImage->setFontProperties(array(
    		"FontName" => "libs/pchart/fonts/GeosansLight.ttf",
    		"FontSize" => 15));

		$myImage->setGraphArea(40,40, 460,260);

		$myImage->drawScale();

		$myImage->drawBarChart();

		//header("Content-Type: image/png");		
		//$myImage->Render(null);

		$myImage->Stroke();

	}
?>
