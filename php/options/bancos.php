<?php 
	
	require_once("../class/banco.php");
	$banco = new Banco();  
	//opciones a  ejecutar en el swich
	$opcion=$_REQUEST['opcion']; 
 
 	switch ($opcion) { 
  			 case 1: 

		 	  echo (json_encode($banco->buscarMontosPorTipoId($_REQUEST['tipo_id']))); 

		 		break;
 	
 		 
 	}

	/*$response = array('id' =>'aa',  'nombre' => 'Juan perez');

	echo(json_encode($response));*/
?>