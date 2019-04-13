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
		 		//acceder aun arreglo
		 		/*$total =  $banco->estadoDeCuentDeCliente($_REQUEST['cliente_id']);
		 		echo $total[0]['saldoTotal'];*/
		 		  
		 	   echo (json_encode($banco->estadoDeCuentDeCliente($_REQUEST['cliente_id']))); 

		 		break;
		 	case 7: 

		 	  echo (json_encode($banco->guardarPagoDeCliente($_REQUEST['cliente_id'],$_REQUEST['pago'],$_REQUEST['capturista_id']))); 

		 		break;
		 	case 8: 

		 	  echo (json_encode($banco->cargarCajasYOficinas())); 

		 		break;
 			case 9: 

		 	  echo (json_encode($banco->guardarMovimientoCaja($_REQUEST['caja_id'],$_REQUEST['movimiento_id'],$_REQUEST['descripcion'],$_REQUEST['tipo_id'],$_REQUEST['fecha'],$_REQUEST['importe'],$_REQUEST['tipo_caja'])));  
		 		break;
		 	case 10: 

		 	  echo (json_encode($banco->buscarMovimientoPorCaja($_REQUEST['caja_id'],$_REQUEST['tipo_caja']))); 

		 		break;
		 	case 11: 

		 	  echo (json_encode($banco->cancelarMovimientoDeCaja($_REQUEST['movimiento_id'] ))); 

		 		break;
		 	case 12: 

		 	  echo (json_encode($banco->verCorteDeCaja($_REQUEST['caja_id'],$_REQUEST['tipo_caja'],$_REQUEST['fecha']))); 

		 		break;
		 	case 13: 

		 	  echo (json_encode($banco->verCortesPorCaja($_REQUEST['caja_id'],$_REQUEST['tipo_caja']))); 

		 		break;
		 	case 14: 
 

		 	   echo (json_encode($banco->guardarCorteDeCaja($_REQUEST['caja_id'],$_REQUEST['tipo_caja'],$_REQUEST['fecha'],$_REQUEST['entradas'],$_REQUEST['capital'],$_REQUEST['interes'],$_REQUEST['seguro'],$_REQUEST['salidas'],$_REQUEST['desembolsos'],$_REQUEST['saldo_final'])));  

		 		break;
		 	case 15: 
 

		 	   echo (json_encode($banco->eliminarCorteDeCaja($_REQUEST['caja_id'],$_REQUEST['tipo_caja'],$_REQUEST['fecha'])));  

		 		break;
 		 
 	}

	/*$response = array('id' =>'aa',  'nombre' => 'Juan perez');

	echo(json_encode($response));*/
?>