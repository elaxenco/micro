<?php 
	
	require_once("../class/cliente.php");
	$cliente = new Cliente();  
	//opciones a  ejecutar en el swich
	$opcion=$_REQUEST['opcion']; 
 
 	switch ($opcion) { 
  			case 1: 
		 			   echo (json_encode($cliente->guardarCliente($_REQUEST['c_id'],$_REQUEST['c_nombre'],$_REQUEST['c_appaterno'],$_REQUEST['c_apmaterno'],$_REQUEST['c_fecha'],$_REQUEST['c_sexo'],$_REQUEST['c_ife'],$_REQUEST['c_cp'],$_REQUEST['c_colonia'],$_REQUEST['c_calle'],$_REQUEST['c_referencia'],$_REQUEST['c_cartera'])));
		 		break; 
 	
 		 
 	}

	/*$response = array('id' =>'aa',  'nombre' => 'Juan perez');

	echo(json_encode($response));*/
?>