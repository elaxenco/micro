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
				 case 12: 
						   echo (json_encode($mantenimientoclass->editarCartera($_REQUEST['id'],$_REQUEST['descripcion'])));
			  		break;
 
 		 
 	}

	/*$response = array('id' =>'aa',  'nombre' => 'Juan perez');

	echo(json_encode($response));
	$mysqli = new mysqli("localhost", "root", "", "micro");

		/* comprobar la conexión */
	/*	if ($mysqli->connect_errno) {
			printf("Falló la conexión: %s\n", $mysqli->connect_error);
			exit();
		}

		if (!$mysqli->query("UPDATE carteras SET descripcion ='CARTERA BEATRIZ A' WHERE id=8")) {
			printf("Código de error: %d\n", $mysqli->errno);
		}

		/* cerrar la conexión */
	//	$mysqli->close();
?>