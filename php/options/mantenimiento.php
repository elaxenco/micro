<?php 
	
	require_once("../class/mantenimientoclass.php");
	$mantenimientoclass = new Mantenimientoclass();  
	//opciones a  ejecutar en el swich
	$opcion=$_REQUEST['opcion']; 
 
 	switch ($opcion) { 
  				case 1: 
			 			   echo (json_encode($mantenimientoclass->iniciarSesion($_REQUEST['user'],$_REQUEST['pass'])));
			 		break;  
			 	case 2: 
			 			   echo (json_encode($mantenimientoclass->guardarCartera($_REQUEST['c_cartera'],$_REQUEST['c_responsable'])));
			 		break;
			  
 
 		 
 	}

	/*$response = array('id' =>'aa',  'nombre' => 'Juan perez');

	echo(json_encode($response));*/
?>