<?php 
	
	require_once("../class/banco.php");
	$banco = new Banco();  
	//opciones a  ejecutar en el swich
	$opcion=$_REQUEST['opcion']; 
 
 	switch ($opcion) { 
  			 case 1: 

		 	  echo (json_encode($banco->buscarMontosPorTipoId($_REQUEST['tipo_id']))); 

		 		break;
		 	case 2: 

		 	  echo (json_encode($banco->calcularPrimerDiaDePago($_REQUEST['tipoDesembolso_id']))); 

		 		break;
		 	case 3: 

		 	  echo (json_encode($banco->gurdarDesembolsoDeDiez($_REQUEST['cliente_id'],$_REQUEST['importe'],$_REQUEST['tipo_id'],$_REQUEST['capturista_id'],$_REQUEST['fechaPrimerPago'],$_REQUEST['cartera_id']))); 

		 		break;
		 	case 4: 

		 	  echo (json_encode($banco->calcularPrimerDiaDePagoSemanal())); 

		 		break;
		 	case 5: 

		 	  echo (json_encode($banco->gurdarDesembolso($_REQUEST['cliente_id'],$_REQUEST['importe'],$_REQUEST['tipo_id'],$_REQUEST['capturista_id'],$_REQUEST['fechaPrimerPago'],$_REQUEST['cartera_id']))); 

		 		break;
		 	case 6: 

		 	  echo (json_encode($banco->estadoDeCuentDeCliente($_REQUEST['cliente_id']))); 

		 		break;
 	
 		 
 	}

	/*$response = array('id' =>'aa',  'nombre' => 'Juan perez');

	echo(json_encode($response));*/
?>