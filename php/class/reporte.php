<?php
	
		require_once("../utilidades/Funciones.php");

	class Reportes extends Funciones{


 				public function listaDesembolsos($fecha_inicial,$fecha_final,$cartera_id,$tipo_id){
							$res=array();
							$datos=array();
							$i=0;
							$respuesta=0;
							$rol_id = $_COOKIE["micro_rol_id"];
							$qc =" ";
							$qt=" ";
							$totalDesembolsos=0;

							if($rol_id==1){

								if($cartera_id>0)
									$qc=" AND cte.cartera_id=$cartera_id";
								else
									$qc=" ";

								if($tipo_id>0)
									$qt=" AND d.tipo_id=$tipo_id";
								else
									$qt=" ";

								$sql="SELECT cte.id,CONCAT(cte.nombre,' ',cte.appaterno,' ',cte.apmaterno) cliente ,ct.descripcion cartera,d.capital desembolso,d.fecha,t.descripcion tipo,CONCAT(u.nombre,' ',u.appaterno,' ',u.apmaterno) capturista 
								FROM desembolsos d
								JOIN clientes cte ON cte.id=d.cliente_id
								JOIN  carteras ct ON ct.id=cte.cartera_id
								JOIN tipo_prestamo t ON t.id=d.tipo_id
								JOIN usuarios u ON u.id=d.capturista_id WHERE d.fecha BETWEEN '$fecha_inicial' AND '$fecha_final' ".$qc.$qt." ORDER BY d.fecha DESC";
								
							}else{

								if($tipo_id>0)
									$qt=" AND d.tipo_id=$tipo_id";

								$sql="SELECT cte.id,CONCAT(cte.nombre,' ',cte.appaterno,' ',cte.apmaterno) cliente ,ct.descripcion cartera,d.capital desembolso,d.fecha,t.descripcion tipo,CONCAT(u.nombre,' ',u.appaterno,' ',u.apmaterno) capturista 
								FROM desembolsos d
								JOIN clientes cte ON cte.id=d.cliente_id
								JOIN  carteras ct ON ct.id=cte.cartera_id
								JOIN tipo_prestamo t ON t.id=d.tipo_id
								JOIN usuarios u ON u.id=d.capturista_id WHERE d.fecha BETWEEN '$fecha_inicial' AND '$fecha_final' AND cte.cartera_id=$cartera_id ".$qt." ORDER BY d.fecha DESC";
							} 

							 
							    
							$resultado = mysqli_query($this->con(), $sql); 
						    while ($res = mysqli_fetch_row($resultado)) {

						       $datos[$i]['cliente_id'] 	= $res[0];
						       $datos[$i]['cliente'] 		= $res[1];
						       $datos[$i]['cartera'] 		= $res[2]; 
						       $datos[$i]['desembolso'] 	= $res[3]; 
						       $datos[$i]['fecha'] 			= $res[4]; 
						       $datos[$i]['tipo'] 			= $res[5]; 
						       $datos[$i]['capturista'] 	= $res[6]; 

						       $totalDesembolsos +=$res[3];

						       $i++;
						    }   
						       $datos[$i]['cliente_id'] 	= "";
						       $datos[$i]['cliente'] 		= "";
						       $datos[$i]['cartera'] 		= ""; 
						       $datos[$i]['desembolso'] 	= '<b>$ '.number_format($totalDesembolsos,2)."</b>";  
						       $datos[$i]['fecha'] 			= ""; 
						       $datos[$i]['tipo'] 			= "";
						       $datos[$i]['capturista'] 	= ""; 

							return $datos;    
				} 
				// funcion para buscar pagos
				public function listaDePagos($fecha_inicial,$fecha_final,$cartera_id,$tipo_id){
							$res=array();
							$datos=array();
							$i=0;
							$respuesta=0;
							$rol_id = $_COOKIE["micro_rol_id"];
							$qc =" ";
							$qt=" ";

							   $total_pcompleto =0;
						       $total_pcapital =0;
						       $total_pinteres =0;
						       $total_pseguro =0;

							if($rol_id==1){

								if($cartera_id>0)
									$qc=" AND cte.cartera_id=$cartera_id";
								else
									$qc=" ";

								if($tipo_id>0)
									$qt=" AND d.tipo_id=$tipo_id";
								else
									$qt=" ";

								$sql="SELECT cte.id,CONCAT(cte.nombre,' ',cte.appaterno,' ',cte.apmaterno) cliente,p.fecha,p.pago_completo,p.pago_capital,p.pago_interes,p.pago_seguro,CONCAT(cap.nombre,' ',cap.appaterno,' ',cap.apmaterno) capturista, ct.descripcion FROM
									pagos p
									JOIN clientes cte ON cte.id=p.cliente_id
									JOIN usuarios cap ON cap.id=p.capturista_id 
									JOIN desembolsos d ON d.cliente_id= cte.id
									JOIN carteras ct ON ct.id=cte.cartera_id
									WHERE p.fecha BETWEEN '$fecha_inicial' AND '$fecha_final' ".$qc.$qt." ORDER BY p.fecha DESC";
																
							}else{

								if($tipo_id>0)
									$qt=" AND d.tipo_id=$tipo_id";

								$sql="SELECT cte.id,CONCAT(cte.nombre,' ',cte.appaterno,' ',cte.apmaterno) cliente,p.fecha,p.pago_completo,p.pago_capital,p.pago_interes,p.pago_seguro,CONCAT(cap.nombre,' ',cap.appaterno,' ',cap.apmaterno) capturista , ct.descripcion FROM
									pagos p
									JOIN clientes cte ON cte.id=p.cliente_id
									JOIN usuarios cap ON cap.id=p.capturista_id 
									JOIN desembolsos d ON d.cliente_id= cte.id
									JOIN carteras ct ON ct.id=cte.cartera_id
									WHERE p.fecha BETWEEN '$fecha_inicial' AND '$fecha_final' AND cte.cartera_id=$cartera_id ".$qt." ORDER BY p.fecha DESC";;
							} 

							 
							    
							$resultado = mysqli_query($this->con(), $sql); 
						    while ($res = mysqli_fetch_row($resultado)) {

						       $datos[$i]['cliente_id'] 	= $res[0];
						       $datos[$i]['cliente'] 		= $res[1];
						       $datos[$i]['fecha'] 			= $res[2]; 
						       $datos[$i]['pago_completo'] 	= $res[3]; 
						       $datos[$i]['pago_capital'] 	= $res[4]; 
						       $datos[$i]['pago_interes'] 	= $res[5]; 
						       $datos[$i]['pago_seguro'] 	= $res[6]; 
						       $datos[$i]['capturista'] 	= $res[7]; 
						       $datos[$i]['cartera'] 		= $res[8]; 


						       $total_pcompleto+=$res[3];
						       $total_pcapital+=$res[4];
						       $total_pinteres+=$res[5];
						       $total_pseguro+=$res[6];

						       $i++;
						    }   

						      
						       $datos[$i]['cliente_id'] 	= "";
						       $datos[$i]['cliente'] 		= "";
						       $datos[$i]['fecha'] 			= ""; 
						       $datos[$i]['pago_completo'] 	= '<b>$ '.number_format($total_pcompleto,2)."</b>";  
						       $datos[$i]['pago_capital'] 	= '<b>$ '.number_format($total_pcapital,2)."</b>"; 
						       $datos[$i]['pago_interes'] 	= '<b>$ '.number_format($total_pinteres,2)."</b>"; 
						       $datos[$i]['pago_seguro'] 	= '<b>$ '.number_format($total_pseguro,2)."</b>"; 
						       $datos[$i]['capturista'] 	= ""; 
						       $datos[$i]['cartera'] 		= ""; 
						 
						       


							return $datos;    
				} 

				// funcion para buscar pagos
				public function calcularColocado($fecha_inicial,$fecha_final,$cartera_id,$tipo_id){
							$res=array();
							$datos=array();
							$i=0;
							$respuesta=0;
							$rol_id = $_COOKIE["micro_rol_id"];
							$qc =" ";
							$qt=" ";
							$total_prestamos=0;
							$total_pcapital=0;
							$total_colocado=0;
							$total_cte=0;


							if($rol_id==1){

								if($cartera_id>0)
									$qc=" AND clientes.cartera_id=$cartera_id";
								else
									$qc=" ";

								if($tipo_id>0)
									$qt=" AND desembolsos.tipo_id=$tipo_id";
								else
									$qt=" ";

								$sql="SELECT carteras.descripcion,SUM(capital) capital,
										(
										--
										SELECT COUNT(d.id) FROM desembolsos  d
										 JOIN clientes  c ON c.id=d.cliente_id
										 WHERE d.estatus_id=5 AND c.cartera_id = clientes.cartera_id
										 --
										 ) nc ,
											 (SELECT IFNULL(SUM(pago_capital),0) pagos FROM pagos
												 JOIN clientes cte ON cte.id=pagos.cliente_id
												 WHERE cte.cartera_id=clientes.cartera_id
												 )pagos
										  
										FROM desembolsos 
										JOIN clientes ON clientes.id=desembolsos.cliente_id $qc
										JOIN carteras ON carteras.id=clientes.cartera_id
										 GROUP BY clientes.cartera_id";
																									
							}else{

								if($tipo_id>0)
									$qt=" AND desembolsos.tipo_id=$tipo_id";

								$sql="SELECT carteras.descripcion,SUM(capital) capital,
											(
											--
											SELECT COUNT(d.id) FROM desembolsos  d
											 JOIN clientes  c ON c.id=d.cliente_id
											 WHERE d.estatus_id=5 AND c.cartera_id = clientes.cartera_id
											 --
											 ) nc ,
											 (SELECT IFNULL(SUM(pago_capital),0) pagos FROM pagos
												 JOIN clientes cte ON cte.id=pagos.cliente_id
												 WHERE cte.cartera_id=clientes.cartera_id
												 )pagos
																							  
											FROM desembolsos 
											JOIN clientes ON clientes.id=desembolsos.cliente_id
											JOIN carteras ON carteras.id=clientes.cartera_id
											WHERE clientes.cartera_id=$cartera_id ".$qt." GROUP BY clientes.cartera_id";
							} 

							 
							    
							$resultado = mysqli_query($this->con(), $sql); 
						    while ($res = mysqli_fetch_row($resultado)) {

						       $datos[$i]['cartera'] 	= $res[0];
						       $datos[$i]['prestamos'] 		= '$ '.number_format($res[1],2); 
						       $datos[$i]['pagos'] 			= '$ '.number_format($res[3],2);  
						       $datos[$i]['colocado'] 	= '$ '.number_format($res[1]-$res[3],2); 
						       $datos[$i]['nc'] 	= $res[2]; 

						       $total_prestamos+=$res[1];
						       $total_pcapital+=$res[3];
						       $total_colocado+=$res[1]-$res[3];
						       $total_cte+=$res[2];

						       $i++;
						    }
						       $datos[$i]['cartera'] 	= "";
						       $datos[$i]['prestamos'] 		= '<b>$ '.number_format($total_prestamos,2)."</b>"; 
						       $datos[$i]['pagos'] 			= '<b>$ '.number_format($total_pcapital,2)."</b>";  
						       $datos[$i]['colocado'] 	= '<b>$ '.number_format($total_colocado,2)."</b>"; 
						       $datos[$i]['nc'] 	= "<b>".$total_cte."</b>";  
   
							return $datos;    
				} 
				// funcion para buscar movimientos
				public function calcularMovimientos($fecha_inicial,$fecha_final){
						$res=array();
						$datos=array();
						$i=0;
						$respuesta=0;
						$rol_id = $_COOKIE["micro_rol_id"];
						$total_saldo_inicial=0;
						$total_entradas=0;
						$total_pago_capital=0;
						$total_pago_interes=0;
						$total_pago_seguro=0;
						$total_salidas=0;
						$total_desembolsos=0;
						$total_saldo_final=0;
						


						 $sql=" SELECT c.id,
								c.descripcion caja,
								IFNULL((SELECT saldo_inicial FROM cortes WHERE caja_id=c.id AND tipo_caja=1 AND fecha='$fecha_inicial'),0) saldo_incial,
								IFNULL((SELECT SUM(importe) FROM caja WHERE caja_id=c.id AND tipo_caja=1 AND tipo='E' AND fecha BETWEEN '$fecha_inicial' AND '$fecha_final'),0) entradas ,
								IFNULL((SELECT SUM(pago_capital) FROM pagos WHERE cliente_id IN (SELECT id FROM clientes WHERE cartera_id=c.id) AND fecha BETWEEN '$fecha_inicial' AND '$fecha_final'),0) capital,
							 	IFNULL((SELECT SUM(pago_interes) FROM pagos WHERE cliente_id IN (SELECT id FROM clientes WHERE cartera_id=c.id) AND fecha BETWEEN '$fecha_inicial' AND '$fecha_final'),0) interes,
							 	IFNULL((SELECT SUM(pago_seguro) FROM pagos WHERE cliente_id IN (SELECT id FROM clientes WHERE cartera_id=c.id) AND fecha BETWEEN '$fecha_inicial' AND '$fecha_final'),0) seguro,
							 	IFNULL((SELECT SUM(importe) FROM caja WHERE caja_id=c.id AND tipo_caja=1 AND tipo='S' AND fecha BETWEEN '$fecha_inicial' AND '$fecha_final'),0) salidas,
							 	IFNULL((SELECT SUM(capital) FROM desembolsos WHERE cliente_id IN (SELECT id FROM clientes WHERE cartera_id=c.id) AND fecha BETWEEN '$fecha_inicial' AND '$fecha_final'),0) desembolsos ,
							 	IFNULL((SELECT saldo_final FROM cortes WHERE caja_id=c.id AND tipo_caja=1 AND fecha='$fecha_final'),0) saldo_final
							FROM carteras c  
							UNION 
							SELECT c.id,
								c.descripcion caja,
								IFNULL((SELECT saldo_inicial FROM cortes WHERE caja_id=c.id AND tipo_caja=2 AND fecha='$fecha_inicial'),0) saldo_incial,
								IFNULL((SELECT SUM(importe) FROM caja WHERE caja_id=c.id AND tipo_caja=2 AND tipo='E' AND fecha BETWEEN '$fecha_inicial' AND '$fecha_final'),0) entradas ,
								'0' capital,
							 	'0' interes,
							 	'0' seguro,
							 	IFNULL((SELECT SUM(importe) FROM caja WHERE caja_id=c.id AND tipo_caja=2 AND tipo='S' AND fecha BETWEEN '$fecha_inicial' AND '$fecha_final'),0) salidas,
							 	'0' desembolsos ,
							 	IFNULL((SELECT saldo_final FROM cortes WHERE caja_id=c.id AND tipo_caja=2 AND fecha='$fecha_final'),0) saldo_final
							FROM oficinas c   ";
											
						    
						$resultado = mysqli_query($this->con(), $sql); 
					    while ($res = mysqli_fetch_row($resultado)) {
					    	$datos[$i]['id'] 			= $res[0];
					    	$datos[$i]['caja'] 			= $res[1];
					    	$datos[$i]['saldo_inicial'] = "$ ".number_format($res[2],2);
					    	$datos[$i]['entradas'] 		= "$ ".number_format($res[3],2);
					    	$datos[$i]['pagos_capital'] = "$ ".number_format($res[4],2);
					    	$datos[$i]['pagos_interes'] = "$ ".number_format($res[5],2);
					    	$datos[$i]['pagos_seguro'] 	= "$ ".number_format($res[6],2);
					    	$datos[$i]['salidas'] 		= "$ ".number_format($res[7],2);
					    	$datos[$i]['desembolsos'] 	= "$ ".number_format($res[8],2); 
					    	$datos[$i]['saldo_final'] 	= "$ ".number_format($res[9],2);
					       	

					       	$total_saldo_inicial+=$res[2];
							$total_entradas+=$res[3];
							$total_pago_capital+=$res[4];
							$total_pago_interes+=$res[5];
							$total_pago_seguro+=$res[6];
							$total_salidas+=$res[7];
							$total_desembolsos+=$res[8];
							$total_saldo_final+=$res[9];

					       $i++;
					    } 

					    	$datos[$i]['id'] 			= "";
					    	$datos[$i]['caja'] 			= "";
					    	$datos[$i]['saldo_inicial'] = '<b>$ '.number_format($total_saldo_inicial,2)."</b>"; 
					    	$datos[$i]['entradas'] 		= '<b>$ '.number_format($total_entradas,2)."</b>"; 
					    	$datos[$i]['pagos_capital'] = '<b>$ '.number_format($total_pago_capital,2)."</b>"; 
					    	$datos[$i]['pagos_interes'] = '<b>$ '.number_format($total_pago_interes,2)."</b>"; 
					    	$datos[$i]['pagos_seguro'] 	= '<b>$ '.number_format($total_pago_seguro,2)."</b>"; 
					    	$datos[$i]['salidas'] 		= '<b>$ '.number_format($total_salidas,2)."</b>"; 
					    	$datos[$i]['desembolsos'] 	= '<b>$ '.number_format($total_desembolsos,2)."</b>"; 
					    	$datos[$i]['saldo_final'] 	= '<b>$ '.number_format($total_saldo_final,2)."</b>"; 

					     
					       

						return $datos;    
				} 

				// funcion para buscar movimientos
				public function clientesPendienteDePago($cartera_id,$fecha){
					 	$res=array();
						$datos=array();
						$i=0;
						$respuesta=0;  
						$total_vencido=0;
						$total_saldo=0;

						if($cartera_id>0){
							$ql=' AND carteras.id='.$cartera_id;
						}else{
							$ql='';
						}

						 $sql="SELECT cliente_id,
									CONCAT(clientes.nombre,' ',clientes.appaterno,' ',clientes.apmaterno) cliente,
									MIN(fecha_pago) fecha_mora,
									COUNT(corridas.id) pagos_vencidos,
									DATEDIFF(CURDATE(),MIN(fecha_pago)) dias_mora, 
									SUM(saldo) saldo_vencido,
									(SELECT SUM(c.saldo) FROM corridas  c WHERE c.cliente_id=corridas.cliente_id AND saldo>0) saldo_total,
									carteras.descripcion cartera
									FROM corridas
								JOIN clientes ON clientes.id=corridas.cliente_id
								JOIN carteras ON carteras.id=clientes.cartera_id 
								 WHERE saldo>0 AND fecha_pago<='$fecha' $ql GROUP BY cliente_id 
								UNION
								 SELECT cliente_id,
									CONCAT(clientes.nombre,' ',clientes.appaterno,' ',clientes.apmaterno) cliente,
									MIN(fecha_pago) fecha_mora,
									COUNT(corridas_tipo_c.id) pagos_vencidos,
									DATEDIFF(CURDATE(),MIN(corridas_tipo_c.fecha_pago)) dias_mora, 
									SUM(interes-pago_interes) saldo_vencido,
									(SELECT SUM(c.saldo) FROM corridas_tipo_c  c WHERE c.cliente_id=corridas_tipo_c.cliente_id AND c.saldo>0 AND c.estatus_id=5) saldo_total,
									carteras.descripcion
									
									FROM corridas_tipo_c
								JOIN clientes ON clientes.id=corridas_tipo_c.cliente_id
								JOIN carteras ON carteras.id=clientes.cartera_id 
								 
								 WHERE interes>pago_interes AND fecha_pago<='$fecha' AND corridas_tipo_c.estatus_id=5 $ql  GROUP BY cliente_id
								 ";
											 
						    
						$resultado = mysqli_query($this->con(), $sql); 
					    while ($res = mysqli_fetch_row($resultado)) {
					    	$datos[$i]['cliente_id'] 		= $res[0];
					    	$datos[$i]['cliente'] 			= $res[1];
					    	$datos[$i]['fecha_mora'] 		= $res[2]; 
					    	$datos[$i]['pagos_vencidos'] 	= $res[3];
					    	$datos[$i]['dias_mora'] 		= $res[4];
					    	$datos[$i]['saldo_vencido'] 	= "$ ".number_format($res[5],2);
					    	$datos[$i]['saldo_total'] 		= "$ ".number_format($res[6],2);
					    	$datos[$i]['cartera'] 			= $res[7]; 
					       	
					       	$total_vencido+=$res[5];
							$total_saldo+=$res[6];
 							$i++;
					    } 

					    	$datos[$i]['cliente_id'] 		= "";
					    	$datos[$i]['cliente'] 			= "";
					    	$datos[$i]['fecha_mora'] 		= ""; 
					    	$datos[$i]['pagos_vencidos'] 	= "";
					    	$datos[$i]['dias_mora'] 		= "";
					    	$datos[$i]['saldo_vencido'] 	= '<b>$ '.number_format($total_vencido,2)."</b>"; 
					    	$datos[$i]['saldo_total'] 		= '<b>$ '.number_format($total_saldo,2)."</b>"; 
					    	$datos[$i]['cartera'] 			= ""; 

					     
					       

						return $datos;     
				} 



	}