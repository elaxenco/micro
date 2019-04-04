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

		 //checamos el estado de cuenta del cliente
		public function estadoDeCuentDeCliente($cliente_id){
					$res=array();
					$datos=array();  
					$i=0; 
					 $sql="SELECT * FROM v_estadodecuentacliente WHERE cliente_id=$cliente_id"; 
					//return $sql;
					$resultado= mysqli_query($this->con(), $sql); 
					while ($res = mysqli_fetch_row($resultado)){
						$datos[$i]['desembolso_id'] 	= $res[0]; 
						$datos[$i]['cliente_id'] 		= $res[1];  
						$datos[$i]['capital'] 		= $res[2];
						$datos[$i]['pagoNormal'] 	= $res[3];  
						$datos[$i]['saldoVencido']	= $res[4];  
						$datos[$i]['saldoExigible']	= $res[5];
						$datos[$i]['saldoTotal']	= $res[6];
						$datos[$i]['tipo_prestamo_id']		= $res[7];

						$i++;
					} 

					return $datos;
				       		  
		}	

		//checamos el estado de cuenta del cliente
		public function guardarPagoDeCliente($cliente_id,$pago,$capturista_id){
					$res=array();
					$datos=array();  
					$i=0; 
					$sql="SELECT id,tipo_id FROM desembolsos WHERE cliente_id=$cliente_id AND estatus_id=5"; 
					$resultado= mysqli_query($this->con(), $sql); 
					while ($res = mysqli_fetch_row($resultado)){
						$desembolso_id =$res[0];
						$tipo_id =$res[1]; 
					} 

					if($tipo_id==3){
						$respuesta = $this-> pagoDesembolsoDeDiez($cliente_id,$pago,$capturista_id,$desembolso_id);
					}else{
						$respuesta = $this-> pagoDesembolsoSemanalQuincenal($cliente_id,$pago,$capturista_id,$desembolso_id);
					}

					$saldo =$respuesta[0]['saldoTotal'];

					//return($saldo);

					if($saldo<=0){
						$sql="UPDATE desembolsos SET estatus_id=2 WHERE cliente_id=$cliente_id AND id=".$respuesta[0]['desembolso_id'] ;  

						//return $sql;
						$resultado= mysqli_query($this->con(), $sql); 
					} 


					return $respuesta;
				       		  
		}


		public function pagoDesembolsoDeDiez($cliente_id,$pago,$capturista_id,$desembolso_id){
			
					$capital=0;
					$interes=0;
					$pago_completo=0;
					//consultamos el saldo del cliente 
					$sql="SELECT capital-pago_capital capital, interes-pago_interes interes FROM corridas_tipo_c WHERE cliente_id=$cliente_id AND desembolso_id=$desembolso_id AND estatus_id=5"; 
					$resultado= mysqli_query($this->con(), $sql); 
					while ($res = mysqli_fetch_row($resultado)){
						$capital =$res[0];
						$interes =$res[1]; 
					} 
					//calculamos el pago completo que el cliente tiene que dar
					$pago_completo=$capital+$interes;
					// si el pago del cliente es igual al pago completo liquidamos el prestamo
					if($pago==$pago_completo){
						//insertamos el pago del cliente
						$sql="INSERT INTO pagos (fecha,pago_completo,pago_capital,pago_interes,cliente_id,desembolso_id,tipo_pago,capturista_id,fecha_registro,hora_registro)
										VALUES(CURDATE(),$pago,$capital,$interes,$cliente_id,$desembolso_id,'P',$capturista_id,CURDATE(),CURTIME())";
						//validamos que la consulta se efectue para proseguir a actualizar la corrida	 
						if($resultado= mysqli_query($this->con(), $sql)) 
						{	//query para actualizar corrida de pago de diez
							$sql="UPDATE corridas_tipo_c SET pago_capital=pago_capital+$capital, pago_interes=pago_interes+$interes, estatus_id=2, saldo=0 WHERE cliente_id=$cliente_id AND desembolso_id=$desembolso_id"; 
							$resultado= mysqli_query($this->con(), $sql); 

							//query para actualizar corrida de pago de diez
							$sql="UPDATE desembolsos SET estatus_id=2 WHERE cliente_id=$cliente_id AND desembolso_id=$desembolso_id"; 
							$resultado= mysqli_query($this->con(), $sql);

								return $this -> estadoDeCuentDeCliente($cliente_id); //retornamosel estado de cuenta 


						}else{
							return 1;//regresa 1 que indica error al guardar el pago
						}

					}else{

						//verificamos que el pago es mayor que el interes 
						if($pago>$interes){
							//insertamos el pago del cliente
							$sql="INSERT INTO pagos (fecha,pago_completo,pago_capital,pago_interes,cliente_id,desembolso_id,tipo_pago,capturista_id,fecha_registro,hora_registro)
											VALUES(CURDATE(),$pago,$pago-$interes,$interes,$cliente_id,$desembolso_id,'A',$capturista_id,CURDATE(),CURTIME())";
							//validamos que la consulta se efectue para proseguir a actualizar la corrida	 
							if($resultado= mysqli_query($this->con(), $sql)) 
							{	//query para actualizar corrida de pago de diez
								$sql="UPDATE corridas_tipo_c SET pago_capital=pago_capital+$pago-$interes, pago_interes=pago_interes+$interes, saldo=saldo-$pago WHERE cliente_id=$cliente_id AND desembolso_id=$desembolso_id"; 
								$resultado= mysqli_query($this->con(), $sql); 
								return $this -> estadoDeCuentDeCliente($cliente_id); //retornamosel estado de cuenta  


							}else{
								return 1;//regresa 1 que indica error al guardar el pago
							}
							
						}else{
							//insertamos el pago del cliente
								$sql="INSERT INTO pagos (fecha,pago_completo,pago_capital,pago_interes,cliente_id,desembolso_id,tipo_pago,capturista_id,fecha_registro,hora_registro)
												VALUES(CURDATE(),$pago,0,$pago,$cliente_id,$desembolso_id,'A',$capturista_id,CURDATE(),CURTIME())";  
								//validamos que la consulta se efectue para proseguir a actualizar la corrida	 
								if($resultado= mysqli_query($this->con(), $sql)) 
								{	//query para actualizar corrida de pago de diez
									$sql="UPDATE corridas_tipo_c SET  pago_interes=pago_interes+$pago, saldo=saldo-$pago WHERE cliente_id=$cliente_id AND desembolso_id=$desembolso_id"; 
									$resultado= mysqli_query($this->con(), $sql); 
									return $this -> estadoDeCuentDeCliente($cliente_id); //retornamosel estado de cuenta 
								}else{
									return 1;//regresa 1 que indica error al guardar el pago
								} 
							 
						}
					} 


			return 1;

		}
		public function pagoDesembolsoSemanalQuincenal($cliente_id,$pago,$capturista_id,$desembolso_id){

			$fecha_actual=date('Y-m-d');  
	    	$y=1;
	    	$abono=$pago;
	    	$res=array();
	    	$res2=array();
	    	//////////////////////////////////////////////CLIENTESSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS/////////////////////////////////   
	    	//OBTENEMOS LA INFORMACION DEL CLIENTE SU ESTADO DE CUENTA
 
            $sqla = "SELECT saldo,(capital-pago_capital) AS capital, (interes-pago_interes) AS interes, (seguro-pago_seguro) AS seguro ,np FROM corridas WHERE desembolso_id =$desembolso_id AND saldo>0";   
            $resultado= mysqli_query($this->con(), $sqla); 
			while ($res = mysqli_fetch_row($resultado))
		    { 

 			 		 $nsaldo= $res[0];
 			 		 $ncapital= $res[1];
 			 		 $ninteres= $res[2];
 			 		 $nseguro = $res[3];
 			 		 $nnp = $res[4]; 

 			 		 	// SI EL ABONO ES  IGUAL A 0 SE TERMINA EL SICLO
                        if($abono<=0)break;

                        //CHECAMOS QUE EL ABONO SEA IGUAL AL SALDO Y NO MAYOR AL SALDO TOTAL
                            if($abono>=$nsaldo)
                            {	// GUARDAMOS EL PAGO
                                $sqlk="INSERT INTO  pagos ( fecha, pago_completo, pago_capital, pago_interes, pago_seguro, cliente_id, desembolso_id, tipo_pago, capturista_id, fecha_registro, hora_registro,np)
								VALUES (  CURDATE(), $nsaldo, $ncapital,  $ninteres, $nseguro,$cliente_id, $desembolso_id, 'N', $capturista_id, CURDATE(), CURTIME(),$nnp) "; 
								                                    
								    mysqli_query($this->con(), $sqlk);     
                                    //ACTUALIZAMOS LA CORRIDA
                                    $sqlq="UPDATE corridas SET pago_capital=capital,pago_interes=interes,pago_seguro=seguro,saldo=0 WHERE desembolso_id=$desembolso_id AND cliente_id=$cliente_id AND np=$nnp"; 
                                    mysqli_query($this->con(), $sqlq);   
                                    
                                $abono=$abono-$nsaldo;
                            }
                            else
                            { 

                            	// comprobamos que el abono sea mayor al capital para realizar la siguiente operacion
                                if($abono>$ncapital )
                                {  			
                                            //restamos el capital del pago actual al abono
                                            $abono=$abono-$ncapital; 
                                            // comparamos si el resto del abono es mayor al interes ya que el sobrante se abonara al seguro
                                            if($abono>$ninteres )
                                            { 		//RESTAMOS EL INTERES  AL ABANO YA QUE SERA EL CAPITAL INGRESADO 
                                                    $abono=$abono-$ninteres;
                                                    // calculamos el pago total del cliente
                                                    $loquepago=$ncapital+$ninteres+$abono;

                                                    $sqlk="INSERT INTO  pagos ( fecha, pago_completo, pago_capital, pago_interes, pago_seguro, cliente_id, desembolso_id, tipo_pago, capturista_id, fecha_registro, hora_registro,np)
														VALUES (  CURDATE(),$loquepago, $ncapital,  $ninteres,$abono,$cliente_id, $desembolso_id, 'A', $capturista_id, CURDATE(), CURTIME(),np)";  
                                                    mysqli_query($this->con(), $sqlk);  
                                                    //ACTUALIZAMOS LA CORRIDA 
                                                    $sqlq="UPDATE corridas SET pago_capital=capital,pago_interes=interes,pago_seguro=pago_seguro+$abono,saldo=saldo-$loquepago WHERE desembolso_id=$desembolso_id AND cliente_id=$cliente_id AND np=$nnp"; 
                                                     
                                                     mysqli_query($this->con(), $sqlq);  
                                                     //el abono queda en 0
                                                    $abono=0; 
                                            }
                                            else
                                            {//calculamos el pago completo
                                                   $loquepago=$ncapital+$abono; 
                                                    $sqlk="INSERT INTO  pagos ( fecha, pago_completo, pago_capital, pago_interes, pago_seguro, cliente_id, desembolso_id, tipo_pago, capturista_id, fecha_registro, hora_registro,np)
														VALUES (  CURDATE(),$loquepago, $ncapital,  $abono,0,$cliente_id, $desembolso_id, 'A', $capturista_id, CURDATE(), CURTIME(),$npp)";  
                                                    mysqli_query($this->con(), $sqlk);  
                                                    $sqlq="UPDATE corridas SET pago_capital=capital,pago_interes=pago_interes+$abono,pago_seguro=0,saldo=saldo-$loquepago WHERE desembolso_id=$desembolso_id AND cliente_id=$cliente_id AND np=$nnp"; 
                                                    mysqli_query($this->con(), $sqlq);  

                                                    $abono=0;
                                            } 

                                }
                                else{
                                	// SI EL ABONO ES CERO SE SALE DEL CICLO
                                    if($abono<=0)break; 

                                   	  $sqlk="INSERT INTO  pagos ( fecha, pago_completo, pago_capital, pago_interes, pago_seguro, cliente_id, desembolso_id, tipo_pago, capturista_id, fecha_registro, hora_registro,np)
											VALUES (  CURDATE(),$abono,$abono,  0,0,$cliente_id, $desembolso_id, 'A', $capturista_id, CURDATE(), CURTIME(),$nnp)";  
                                       mysqli_query($this->con(), $sqlk);  
                                       //SOLO AGREGAMOS AL CAPITAL 
                                    $sqlq="UPDATE corridas SET pago_capital=pago_capital+$abono,saldo=saldo-$abono WHERE desembolso_id=$desembolso_id AND cliente_id=$cliente_id AND np=$nnp"; 
                                    mysqli_query($this->con(), $sqlq);   
                                    $abono=0;

                                }
                            } 
            }
 
  
			return $this -> estadoDeCuentDeCliente($cliente_id); 
		} 

		//buscar todas las carteras y oficinas
		public function cargarCajasYOficinas(){
					$res=array();
					$datos=array();  
					$i=0; 
					 $sql="SELECT id,CONCAT('O','-',id) compuesto, descripcion caja,'2' tipo_caja FROM oficinas
							UNION
							SELECT id,CONCAT('C','-',id) compuesto,descripcion caja,'1' tipo_caja FROM carteras"; 
					$resultado= mysqli_query($this->con(), $sql); 
					while ($res = mysqli_fetch_row($resultado)){
						$datos[$i]['id_real'] 			= $res[0]; 
						$datos[$i]['id_compuesto'] 		= $res[1];  
						$datos[$i]['descripcion'] 		= $res[2]; 
						$datos[$i]['tipo_caja'] 				= $res[3]; 
						$datos[$i]['identificador_gen'] = $i+1;

						$i++;
					} 

					return $datos;
				       		  
		}

		// guardar o actualizar movimiento de caja ya sea entrada o salida
		public function guardarMovimientoCaja($caja_id,$movimiento_id,$descripcion,$tipo,$fecha,$importe,$tipo_caja){
				$datos=array(); 
				$capturista_id=$_COOKIE["micro_id"]; 

				$corte = $this->corte($caja_id,$tipo_caja,$fecha)

				if($corte=='S'){
						$datos[0]['respuesta'] ='4';  
				}else{

					if($movimiento_id>0){
						$sql="UPDATE caja SET descripcion = '$descripcion',importe=$importe,tipo='$tipo' WHERE id=$movimiento_id";   
		                $resp =  mysqli_query($this->con(), $sql); 
					}
					else{

						$sql=" INSERT INTO caja(descripcion,fecha,importe,caja_id,tipo,capturista_id,transferencia_id,tipo_caja,fecha_captura,hora_captura)
							VALUES ( '$descripcion','$fecha',$importe,$caja_id,'$tipo',$capturista_id,0,$tipo_caja,CURDATE(),CURTIME())";   
		                $resp =  mysqli_query($this->con(), $sql);  
		            }

	                if($resp>0){
						$datos[0]['respuesta'] 		='2'; 
					}else{
						$datos[0]['respuesta'] 		='3'; 
					}
				}

				return $datos;
		}

		//buscar los movimientos de la caja seleccionada
		public function buscarMovimientoPorCaja($caja_id,$tipo_caja){
					$res=array();
					$datos=array();  
					$i=0; 
					 $sql="SELECT caja.id,descripcion,fecha,importe,IF(tipo='E','ENTRADA','SALIDA') tipo,CONCAT(usuarios.nombre,' ',usuarios.appaterno,' ',usuarios.apmaterno) capturista FROM caja
								JOIN usuarios ON usuarios.id=caja.capturista_id
							WHERE caja_id=$caja_id AND tipo_caja=$tipo_caja"; 
					$resultado= mysqli_query($this->con(), $sql); 
					while ($res = mysqli_fetch_row($resultado)){
						$datos[$i]['movimiento_id'] = $res[0]; 
						$datos[$i]['descripcion'] 	= $res[1];  
						$datos[$i]['fecha'] 		= $res[2]; 
						$datos[$i]['importe'] 		= $res[3]; 
						$datos[$i]['tipo']			= $res[4];
						$datos[$i]['capturista']	= $res[5];

						$i++;
					} 

					return $datos;
				       		  
		}

		//public function verificarEstatusCorridaDiez($desembols_id,$cliente_id){
			/*	//consultamos el saldo del cliente 
				$sql="SELECT capital-pago_capital capital, interes-pago_interes interes,fecha_pago FROM corridas_tipo_c WHERE cliente_id=$cliente_id AND desembolso_id=$desembolso_id AND estatus_id=5"; 
				$resultado= mysqli_query($this->con(), $sql); 
				while ($res = mysqli_fetch_row($resultado)){
					$capital =$res[0];
					$interes =$res[1]; 
					$fecha_pago =$res[2]; 
				} 

				list($anio, $mes, $dia) = explode('-', $fecha_pago);

	            if ( $dia >= 1 && $dia <= 15 )
	            {
	                // OBTENER LOS DIAS QUE TIENE UN MES //
	                $dias_mes = $this->diasMes($mes,$anio); 
	                $fecha_pago=$this->DateAdd($fecha_pago,($dias_mes-15) );
	            }
	            else
	            {
	                $fecha_pago=$this->DateAdd($fecha_pago,15);
	            }

				if($interes>0){
						//query para actualizar corrida de pago de diez
						$sql="UPDATE corridas_tipo_c SET  estatus_id=2 WHERE cliente_id=$cliente_id AND desembolso_id=$desembolso_id"; 
						$resultado= mysqli_query($this->con(), $sql);  

						$sql="INSERT INTO corridas_tipo_c(cliente_id,desembolso_id,fecha_pago,pago_completo,capital,interes,pago_capital,pago_interes,estatus_id,saldo)
								VALUES ($cliente_id,$desembols_id,'fecha_pago',($capital*1.1)+$interes,$capital,($capital*0.1)+$interes,0,0,5,($capital*1.1)+$interes);"; 
						$resultado= mysqli_query($this->con(), $sql); 
				}else{
						//query para actualizar corrida de pago de diez
						$sql="UPDATE corridas_tipo_c SET  estatus_id=2 WHERE cliente_id=$cliente_id AND desembolso_id=$desembolso_id"; 
						$resultado= mysqli_query($this->con(), $sql);  

						$sql="INSERT INTO corridas_tipo_c(cliente_id,desembolso_id,fecha_pago,pago_completo,capital,interes,pago_capital,pago_interes,estatus_id,saldo)
								VALUES ($cliente_id,$desembols_id,'fecha_pago',($capital*1.1),$capital,($capital*0.1),0,0,5,($capital*1.1));"; 
						$resultado= mysqli_query($this->con(), $sql); 

				}*/
		//}


	}

	?>