<?php 
	
	require_once("../class/reporte.php");
	$reportes = new Reportes();  
	//opciones a  ejecutar en el swich
	$opcion=$_REQUEST['opcion']; 
 
 	switch ($opcion) { 
  				case 1: 
			 			   echo (json_encode($reportes->listaDesembolsos($_REQUEST['fecha_inicial'],$_REQUEST['fecha_final'],$_REQUEST['cartera_id'],$_REQUEST['tipo_id'])));
			 		break;  
			 	case 2: 
			 			   echo (json_encode($reportes->listaDePagos($_REQUEST['fecha_inicial'],$_REQUEST['fecha_final'],$_REQUEST['cartera_id'],$_REQUEST['tipo_id'])));
			 		break;  
			 	case 3: 
			 			   echo (json_encode($reportes->calcularColocado($_REQUEST['fecha_inicial'],$_REQUEST['fecha_final'],$_REQUEST['cartera_id'],$_REQUEST['tipo_id'])));
			 		break;  
			 	case 4: 
			 			   echo (json_encode($reportes->calcularMovimientos($_REQUEST['fecha_inicial'],$_REQUEST['fecha_final'])));
			 		break;
			 	case 5: 
			 			   echo (json_encode($reportes->clientesPendienteDePago($_REQUEST['cartera_id'],$_REQUEST['fecha'] )));
			 		break;
 
 		 
 	}

	/*$response = array('id' =>'aa',  'nombre' => 'Juan perez');

	echo(json_encode($response));*/
?>