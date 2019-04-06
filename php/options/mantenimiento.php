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
			 			   echo (json_encode($mantenimientoclass->guardarCartera($_REQUEST['c_cartera'])));
			 		break; 
			 	case 3: 
			 			   echo (json_encode($mantenimientoclass->buscarCarteras()));
			 		break; 
			 	case 4: 
			 			   echo (json_encode($mantenimientoclass->guardarUsuario($_REQUEST['usuario_id'],$_REQUEST['usuario_nombre'],$_REQUEST['usuario_app'],$_REQUEST['usuario_apm'],$_REQUEST['usuario_rol'],$_REQUEST['nombre_usuario'],$_REQUEST['usuario_pwd'])));
			 		break; 
			 	case 5: 
			 			   echo (json_encode($mantenimientoclass->agregarCarteraTemporal($_REQUEST['cartera_id'])));
			 		break; 
			 	case 6: 
			 			   echo (json_encode($mantenimientoclass->truncarAccesos()));
			 		break; 
			  	case 7: 
			 			   echo (json_encode($mantenimientoclass->cargarUsuarios()));
			 		break; 
			 	case 8: 
			 			   echo (json_encode($mantenimientoclass->buscarUsuario($_REQUEST['usuario_id'])));
			 		break; 
			 	case 9: 
			 			   echo (json_encode($mantenimientoclass->buscarCarterasUsuarios()));
			 		break; 
			 	case 10: 
			 			   echo (json_encode($mantenimientoclass->buscarCarterasDeUsuario($_REQUEST['usuario_id'],$_REQUEST['rol_id'])));
			 		break;  
			 	case 11: 
			 			   echo (json_encode($mantenimientoclass->menuPorRoles()));
			 		break; 
 
 		 
 	}

	/*$response = array('id' =>'aa',  'nombre' => 'Juan perez');

	echo(json_encode($response));*/
?>