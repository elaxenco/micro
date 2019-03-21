<?php
	
	require_once("../utilidades/Funciones.php");

	class Banco extends Funciones{

		 	//buscar monstos dependiendo el tipo de cartera
		public function buscarMontosPorTipoId($tipo_id){
					$res=array();
					$datos=array();  
					$i=0; 
					 $sql="SELECT id,importe,semanas,quincenas,pago_completo FROM importes WHERE tipo_id=$tipo_id"; 
					$resultado= mysqli_query($this->con(), $sql); 
					while ($res = mysqli_fetch_row($resultado)){
						$datos[$i]['importe_id'] 	= $res[0]; 
						$datos[$i]['importe'] 		= $res[1];  
						$datos[$i]['semanas'] 		= $res[2];
						$datos[$i]['quincenas'] 	= $res[3];  
						$datos[$i]['pago_completo']	= $res[4];  

						$i++;
					} 

					return $datos;
				       		  
		}	

		public function calcularPrimerDiaDePago($tipoDesembolso_id){
					$res=array();
			 		$datos=array();  
					$i=0; 
					//sacamos la fecha actual
					$fechaActual = date('Y-m-d');
					$fechaPrimerPago = $this->fechaPrimerPago( $fechaActual,$tipoDesembolso_id );

					$datos[0]['fecha'] 		=$fechaPrimerPago; 

				return $datos;  

		}


		public function gurdarDesembolsoDeDiez($cliente_id,$importe,$tipo_id,$capturista_id,$fechaPrimerPago,$cartera_id){
					$res=array();
			 		$datos=array();  
					$i=0; 
					$desembolso_id=0;
					// validamos que el cliente no tenga un desembolsos activo
					$sqldesembolsosactivo="SELECT id FROM desembolsos WHERE cliente_id=$cliente_id AND estatus_id=5"; 
						$resUltimoDesActivo= mysqli_query($this->con(), $sqldesembolsosactivo); 
						while ($res = mysqli_fetch_row($resUltimoDesActivo)) 
								$desembolso_id 	= $res[0]; 

					
					if ($desembolso_id>0) { 
					   //si el cliente tiene un desembolso activo arrojamos una alerta al usuario
							$datos[0]['resultado'] 		=3; 
					}
					else{
							$sql="INSERT INTO  desembolsos  (fecha, primer_pago,capital,   pago_completo,pago_capital , tipo_id,cliente_id, capturista_id,fecha_registro,hora_registro)
													VALUES ( CURDATE(),'$fechaPrimerPago',$importe,$importe*1.1,$importe ,$tipo_id,$cliente_id,$capturista_id,CURDATE(),CURTIME())"; 							
							 
							$resultado= mysqli_query($this->con(), $sql); 
							if($resultado){
								$sql2="SELECT id FROM desembolsos WHERE cliente_id=$cliente_id AND estatus_id=5"; 
								$resUltimoDesActivo= mysqli_query($this->con(), $sql2); 
								while ($res = mysqli_fetch_row($resUltimoDesActivo)) 
										$desembolso_id 	= $res[0];  

									$sql3="INSERT INTO  corridas_tipo_c (cliente_id, desembolso_id,fecha_pago,pago_completo,capital,interes)
										VALUES ( $cliente_id,$desembolso_id,'$fechaPrimerPago',$importe*1.1,$importe,$importe*0.1)"; 							
									 	mysqli_query($this->con(), $sql3); 

									 	$datos[0]['resultado'] 		=1; 
 
							}else{
									$datos[0]['resultado'] 		=2; 
							}
					}




				return $datos;  

		}

		public function calcularPrimerDiaDePagoSemanal(){
					$res=array();
			 		$datos=array();  
					$i=0; 
					//sacamos la fecha actual
					$fechaActual = date('Y-m-d');
					//calculamos el dia de la semana 1=domingo ,2= lunes etc, y agregamos los dias que sean necesarios
					//para conocer el proximo dia de pago
					$dia = $this->diaSemana($fechaActual); 

						switch ($dia) {
							case 2:
									$fechaPrimerPago=$this -> DateAdd($fechaActual,4);
								break;
							case 3:
									$fechaPrimerPago=$this -> DateAdd($fechaActual,3);
								break;	 
							case 4:
									$fechaPrimerPago=$this -> DateAdd($fechaActual,9);
								break;
							case 5:
									$fechaPrimerPago=$this -> DateAdd($fechaActual,8);
								break;
							case 6:
									$fechaPrimerPago=$this -> DateAdd($fechaActual,7);
								break;
							case 7:
									$fechaPrimerPago=$this -> DateAdd($fechaActual,6);
								break;
							case 1:
									$fechaPrimerPago=$this -> DateAdd($fechaActual,5);
								break;
							
							default:
									$fechaPrimerPago=$this -> DateAdd($fechaActual,7);
								break;
						} 

				$datos[0]['fecha'] 		=$fechaPrimerPago; 

				return $datos;  

		}


		public function gurdarDesembolso($cliente_id,$importe,$tipo_id,$capturista_id,$fechaPrimerPago,$cartera_id){
							$res=array();
							$resDetalle=array();
					 		$datos=array();  
							$i=0; 
							$semanasquincenas=0;
							$dias=0;
							$x = 1;
  								


							

							$desembolso_id=0;
							// validamos que el cliente no tenga un desembolsos activo
							$sqldesembolsosactivo="SELECT id FROM desembolsos WHERE cliente_id=$cliente_id AND estatus_id=5"; 
								$resUltimoDesActivo= mysqli_query($this->con(), $sqldesembolsosactivo); 
								while ($res = mysqli_fetch_row($resUltimoDesActivo)) 
										$desembolso_id 	= $res[0]; 

							
							if ($desembolso_id>0) { 
							   //si el cliente tiene un desembolso activo arrojamos una alerta al usuario
									$datos[0]['resultado'] 		=3; 
							}
							else{
								$sqlPagosDetalle="SELECT pago_capital,pago_interes, seguro FROM importes WHERE importe=$importe AND tipo_id=$tipo_id"; 
								//return $sqlPagosDetalle;
								$resPagosDetalle= mysqli_query($this->con(), $sqlPagosDetalle); 
								while ($resDetalle = mysqli_fetch_row($resPagosDetalle)){
									$pago_capital 	= $resDetalle[0];  
									$pago_interes 	= $resDetalle[1]; 
									$pago_seguro 	= $resDetalle[2];   
								} 

									$sql="INSERT INTO  desembolsos  (fecha, primer_pago,capital,   pago_completo,pago_capital,pago_interes,pago_seguro , tipo_id,cliente_id, capturista_id,fecha_registro,hora_registro)
															VALUES ( CURDATE(),'$fechaPrimerPago',$importe,$pago_capital+$pago_interes+$pago_seguro,$pago_capital,$pago_interes,$pago_seguro ,$tipo_id,$cliente_id,$capturista_id,CURDATE(),CURTIME())"; 							
									 
									$resultado= mysqli_query($this->con(), $sql); 
									if($resultado){
										
												

										$sql2="SELECT id FROM desembolsos WHERE cliente_id=$cliente_id AND estatus_id=5"; 
										$resUltimoDesActivo= mysqli_query($this->con(), $sql2); 
										while ($res = mysqli_fetch_row($resUltimoDesActivo)) 
												$desembolso_id 	= $res[0];  



										if($tipo_id==1){
											$semanasquincenas=14;
											$dias=7;

											for($i=1;$i<=$semanasquincenas;$i++){

												$sql3="INSERT INTO  corridas  (cliente_id,  desembolso_id,fecha_pago,np,pago_completo,capital,interes,seguro,saldo)
														VALUES ( $cliente_id,$desembolso_id, '$fechaPrimerPago', $i, $pago_capital+$pago_interes+$pago_seguro , $pago_capital, $pago_interes,$pago_seguro , $pago_capital+$pago_interes+$pago_seguro );"; 							
												 
												 mysqli_query($this->con(), $sql3); 

												 $fechaPrimerPago = $this->DateAdd($fechaPrimerPago,$dias);
											}
										}
										else{
											$semanasquincenas=8;
											$dias=15;

											 while ($x <= $semanasquincenas){
										       
	 												$sql3="INSERT INTO  corridas  (cliente_id, desembolso_id,fecha_pago,np,pago_completo,capital,interes,seguro,saldo)
														VALUES ($cliente_id, $desembolso_id, '$fechaPrimerPago', $x, $pago_capital+$pago_interes+$pago_seguro , $pago_capital, $pago_interes,$pago_seguro , $pago_capital+$pago_interes+$pago_seguro );"; 							
												 
													mysqli_query($this->con(), $sql3); 

  													list($anio, $mes, $dia) = explode('-', $fechaPrimerPago);

										            if ( $dia >= 1 && $dia <= 15 )
										            {
										                // OBTENER LOS DIAS QUE TIENE UN MES //
										                $dias_mes = $this->diasMes($mes,$anio); 
										                $fechaPrimerPago=$this->DateAdd($fechaPrimerPago,($dias_mes-15) );
										            }
										            else
										            {
										                $fechaPrimerPago=$this->DateAdd($fechaPrimerPago,15);
										            }

										            $x ++; 
										     }
										} 


										/**/


										
									
									$datos[0]['resultado'] 		=1; 
		 
									}else{
											$datos[0]['resultado'] 		=2; 
									}
							}




						return $datos;  

				}


	}

	?>