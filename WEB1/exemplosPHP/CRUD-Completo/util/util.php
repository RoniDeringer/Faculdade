<?php     	
 	header('Content-Type: text/html; charset=UTF-8');
     
     function dataTracoToPadrao($data){
 		$DataSeparada = EXPLODE("-",$data);
 		return $DataSeparada[2]."/".$DataSeparada[1].
          "/".$DataSeparada[0];
 	}
 	
 	function dataPadraoToMySQL($data){
 		$DataSeparada = EXPLODE("/",$data);
 		return $DataSeparada[2]."-".$DataSeparada[1].
          "-".$DataSeparada[0];
 	}
 	
 	function addDayToDate($date,$days) {
     	$thisyear = substr ( $date, 0, 4 );
     	$thismonth = substr ( $date, 4, 2 );
     	$thisday =  substr ( $date, 6, 2 );
     	$nextdate = mktime ( 0, 0, 0, $thismonth, $thisday + $days, $thisyear );
     	return strftime("%Y-%m-%d", $nextdate);
	}

	function subDayIntoDate($date,$days) {
     	$thisyear = substr ( $date, 0, 4 );
     	$thismonth = substr ( $date, 4, 2 );
     	$thisday =  substr ( $date, 6, 2 );
     	$nextdate = mktime ( 0, 0, 0, $thismonth, $thisday - $days, $thisyear );
     	return strftime("%Y-%m-%d", $nextdate);
	}
 		
?>