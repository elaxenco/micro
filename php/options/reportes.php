<?php 
	
	require_once("../class/reporte.php");
	$reportes = new Reportes();  
	//opciones a  ejecutar en el swich
	$opcion=$_REQUEST['opcion']; 
 
 	switch ($opcion) { 
  				case 1: 
			 			   echo (json_encode($reportes->listaDesembolsos($_REQUEST['fecha_inicial'],$_REQUEST['fecha_final'],$_REQUEST['cartera_id'],$_REQUEST['tipo_id'])));
			 		break;  
 
 		 
 	}

	/*$response = array('id' =>'aa',  'nombre' => 'Juan perez');

	echo(json_encode($response));*/
?>