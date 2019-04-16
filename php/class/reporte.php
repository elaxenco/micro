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
								JOIN usuarios u ON u.id=d.capturista_id WHERE d.fecha BETWEEN '$fecha_inicial' AND '$fecha_final' ".$qc.$qt;
								
							}else{

								if($tipo_id>0)
									$qt=" AND d.tipo_id=$tipo_id";

								$sql="SELECT cte.id,CONCAT(cte.nombre,' ',cte.appaterno,' ',cte.apmaterno) cliente ,ct.descripcion cartera,d.capital desembolso,d.fecha,t.descripcion tipo,CONCAT(u.nombre,' ',u.appaterno,' ',u.apmaterno) capturista 
								FROM desembolsos d
								JOIN clientes cte ON cte.id=d.cliente_id
								JOIN  carteras ct ON ct.id=cte.cartera_id
								JOIN tipo_prestamo t ON t.id=d.tipo_id
								JOIN usuarios u ON u.id=d.capturista_id WHERE d.fecha BETWEEN '$fecha_inicial' AND '$fecha_final' AND cte.cartera_id=$cartera_id ".$qt;
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

						       $i++;
						    }   
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
									WHERE p.fecha BETWEEN '$fecha_inicial' AND '$fecha_final' ".$qc.$qt;
																
							}else{

								if($tipo_id>0)
									$qt=" AND d.tipo_id=$tipo_id";

								$sql="SELECT cte.id,CONCAT(cte.nombre,' ',cte.appaterno,' ',cte.apmaterno) cliente,p.fecha,p.pago_completo,p.pago_capital,p.pago_interes,p.pago_seguro,CONCAT(cap.nombre,' ',cap.appaterno,' ',cap.apmaterno) capturista , ct.descripcion FROM
									pagos p
									JOIN clientes cte ON cte.id=p.cliente_id
									JOIN usuarios cap ON cap.id=p.capturista_id 
									JOIN desembolsos d ON d.cliente_id= cte.id
									JOIN carteras ct ON ct.id=cte.cartera_id
									WHERE p.fecha BETWEEN '$fecha_inicial' AND '$fecha_final' AND cte.cartera_id=$cartera_id ".$qt;
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

						       $i++;
						    }   
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



	}