<?php
	
	require_once("../utilidades/Funciones.php");

	class Cliente extends Funciones{

				// registro de clientes
 				public function guardarCliente($c_id,$c_nombre,$c_appaterno,$c_apmaterno,$c_fecha,$c_sexo,$c_ife,$c_cp,$c_colonia,$c_calle,$c_referencia,$c_cartera,$c_tel){
							$res=array();
							$datos=array(); 
							$capturista_id=$_COOKIE["micro_id"]; 
							$ife=0; 

							if($c_id>0){
									$sql="UPDATE clientes SET appaterno='$c_appaterno',apmaterno='$c_apmaterno',nombre='$c_nombre',IFE='$c_ife',cp='$c_cp',colonia='$c_colonia',calle='$c_calle',domicilio_ref='$c_referencia' WHERE id=$c_id";   
									$resp=mysqli_query($this->con(), $sql); 

									//$resp=$this->insertar($sql);
									if($resp>0){
										$datos[0]['respuesta'] 		='4'; 
									}else{
										$datos[0]['respuesta'] 		='2'; 
									}

							}
							else{
								//validamos que no este el ife 
								    $sql="SELECT * FROM clientes WHERE IFE='$c_ife'"; 
									$resultado= mysqli_query($this->con(), $sql); 
									while ($res = mysqli_fetch_row($resultado)) 
								       		$ife 		= $res[0];

								    //si el ife existe retorna un error
									if($ife >0){
										 $datos[0]['respuesta'] 		='1'; 
										return $datos; 
									}


									$sqlinsert="INSERT INTO clientes (appaterno,apmaterno,nombre,sexo,IFE,cp,colonia,calle,domicilio_ref,cartera_id,telefono,capturista_id,fecha_registro,hora_registro,fecha_nacimiento)
									VALUES('$c_appaterno','$c_apmaterno','$c_nombre','$c_sexo','$c_ife','$c_cp','$c_colonia','$c_calle','$c_referencia',$c_cartera,'$c_tel',$capturista_id,CURDATE(),CURTIME(),'$c_fecha')";  
									$resp= mysqli_query($this->con(), $sqlinsert);  

									//$resp= $this->insertar($sqlinsert);
									if($resp>0){
										$datos[0]['respuesta'] 		='3'; 
									}else{
										$datos[0]['respuesta'] 		='2'; 
									}
									  

							}
							

							
						 
		          		 
							return $datos;

								  
							    
				}

				//buscar los clientes de la cartera
				public function clientesCartera($c_cartera){
							$res=array();
							$datos=array();  
							$i=0;
							 
 
							 $sql="SELECT id, CONCAT(nombre,' ',appaterno,' ',apmaterno) nombre,IFNULL((SELECT capital FROM desembolsos WHERE cliente_id=clientes.id AND estatus_id=5),0) desembolso ,IFNULL((SELECT SUM(pago_completo) FROM pagos WHERE cliente_id=clientes.id AND desembolso_id = (SELECT id FROM desembolsos WHERE cliente_id=clientes.id AND estatus_id=5)),0.00) pagos,IFNULL((SELECT SUM(saldo) FROM corridas WHERE cliente_id=clientes.id ),0) saldo FROM clientes WHERE cartera_id=$c_cartera ORDER BY desembolso ASC"; 
							$resultado= mysqli_query($this->con(), $sql); 
							while ($res = mysqli_fetch_row($resultado)){
								$datos[$i]['cliente_id'] 	= $res[0]; 
								$datos[$i]['nombre'] 		= $res[1]; 
								$datos[$i]['desembolso']	= $res[2];
								$datos[$i]['pagos']			= $res[3]; 
								$datos[$i]['saldo']			= $res[4];  

								$i++;
							} 

							return $datos;
						       		  
				}
				public function clienteCartera($nombre,$c_cartera){
							$res=array();
							$datos=array();  
							$i=0;
							 
 
							 $sql="SELECT id, CONCAT(nombre,' ',appaterno,' ',apmaterno) nombre,IFNULL((SELECT capital FROM desembolsos WHERE cliente_id=clientes.id AND estatus_id=5),0) desembolso,IFNULL((SELECT SUM(pago_completo) FROM pagos WHERE cliente_id=clientes.id AND desembolso_id = (SELECT id FROM desembolsos WHERE cliente_id=clientes.id AND estatus_id=5)),0.00) pagos, IFNULL((SELECT SUM(saldo) FROM corridas WHERE cliente_id=clientes.id ),0) saldo FROM clientes WHERE cartera_id=$c_cartera AND appaterno LIKE '%$nombre%' OR apmaterno LIKE'%$nombre%' OR nombre LIKE '%$nombre%' OR CONCAT(nombre,' ',appaterno,' ',apmaterno) LIKE'%$nombre%'";  
							$resultado= mysqli_query($this->con(), $sql); 
							while ($res = mysqli_fetch_row($resultado)){
								$datos[$i]['cliente_id'] 	= $res[0]; 
								$datos[$i]['nombre'] 		= $res[1]; 
								$datos[$i]['desembolso']	= $res[2];
								$datos[$i]['pagos']			= $res[3];  
								$datos[$i]['saldo']			= $res[4];  

								$i++;
							} 

							return $datos;
						       		  
				}

				public function buscarClientePorId($cliente_id){
							$res=array();
							$datos=array();  
							$i=0;
							 
 
							 $sql="SELECT  id,appaterno,apmaterno,nombre,fecha_nacimiento,sexo,IFE,cp,colonia,calle,domicilio_ref,telefono FROM  clientes	WHERE id=$cliente_id";  
							$resultado= mysqli_query($this->con(), $sql); 
							while ($res = mysqli_fetch_row($resultado)){
								$datos[$i]['cliente_id']= $res[0]; 
								$datos[$i]['appaterno'] = $res[1]; 
								$datos[$i]['apmaterno']	= $res[2];
								$datos[$i]['nombre'] 	= $res[3]; 
								$datos[$i]['fecha_nacimiento']		= $res[4]; 
								$datos[$i]['sexo']		= $res[5]; 
								$datos[$i]['IFE'] 		= $res[6]; 
								$datos[$i]['cp']		= $res[7]; 
								$datos[$i]['colonia'] 	= $res[8]; 
								$datos[$i]['calle']		= $res[9]; 
								$datos[$i]['domicilio_ref']	= $res[10]; 
								$datos[$i]['telefono']	= $res[11];  

								$i++;
							} 

							return $datos;
						       		  
				}

				public function buscarHistoricoCte($cliente_id){
							$res=array();
							$datos=array();  
							$i=0;
							 
 							$sql="SELECT * FROM estatusActualCliente WHERE  id=$cliente_id";  
							$resultado= mysqli_query($this->con(), $sql); 
							while ($res = mysqli_fetch_row($resultado)){
								$datos[$i]['cliente_id']= $res[0]; 
								$datos[$i]['cliente']= $res[1]; 
								$datos[$i]['desembolso']= $res[2]; 
							}
							  

							return $datos;
						       		  
				}

				public function buscarPagosDesmbolsoActual($cliente_id){
							$res=array();
							$datos=array();  
							$i=0;
							 
 							$sql="SELECT * FROM estatusActualCliente WHERE  id=$cliente_id";  
							$resultado= mysqli_query($this->con(), $sql); 
							while ($res = mysqli_fetch_row($resultado)){
								$datos[$i]['cliente_id']= $res[0]; 
								$datos[$i]['cliente']= $res[1]; 
								$datos[$i]['desembolso']= $res[2]; 
							}
							  

							return $datos;
				}
				public function buscarCorridaActual($cliente_id){
							$res=array();
							$datos=array();  
							$i=0;
							 
 							$sql="SELECT id,tipo_id  FROM desembolsos d WHERE d.estatus_id=5 AND d.cliente_id=$cliente_id";  
							$resultado= mysqli_query($this->con(), $sql); 
							while ($res = mysqli_fetch_row($resultado)){
								$desembolso_id= $res[0]; 
								$tipo_id= $res[1];  
							} 

							if($tipo_id==3){
								$query = "SELECT id ,fecha_pago,pago_completo,saldo FROM corridas_tipo_c WHERE desembolso_id=$desembolso_id";
							}else{
								$query = "SELECT id ,fecha_pago,pago_completo,saldo FROM corridas WHERE desembolso_id=$desembolso_id";
							}
								 
							$resultado= mysqli_query($this->con(), $query); 
							while ($res = mysqli_fetch_row($resultado)){
								$datos[$i]['id']= $res[0]; 
								$datos[$i]['fecha']= $res[1]; 
								$datos[$i]['pago']= $res[2]; 
								$datos[$i]['saldo']= $res[3]; 

								$i++;
							}
							  

							return $datos;
				}

				public function cancelarDesembolsoCliente($cliente_id){
							$res=array();
							$datos=array();  
							$i=0;
							 
 							$sql="SELECT desembolsos.id,desembolsos.tipo_id,desembolsos.fecha,clientes.cartera_id FROM desembolsos
									JOIN clientes ON clientes.id=desembolsos.cliente_id
									 WHERE desembolsos.cliente_id=$cliente_id AND desembolsos.estatus_id=5 LIMIT 1";   
							$resultado= mysqli_query($this->con(), $sql); 
							while ($res = mysqli_fetch_row($resultado)){
								$desembolso_id	= $res[0]; 
								$tipo_id		= $res[1]; 
								$fecha 			= $res[2]; 
								$cartera_id 	= $res[3]; 
							}

							if($desembolso_id<=0){
								$datos[0]['respuesta'] 		='5'; 
								return $datos;
							}

							$sql2="SELECT COUNT(*) FROM pagos WHERE desembolso_id=$desembolso_id";   
							$resultado2= mysqli_query($this->con(), $sql2); 
							while ($res2 = mysqli_fetch_row($resultado2)){
								$pagos	= $res2[0];  
							}
							  
							if($pagos>0){
								$datos[0]['respuesta'] ='4'; 
							}else{

								$corte = $this->corte($cartera_id,1,$fecha); 

								if($corte=='S'){
										$datos[0]['respuesta'] ='2';  
								}else{

									if($tipo_id==3){
										$sql="DELETE FROM corridas_tipo_c WHERE desembolso_id=$desembolso_id";  
									}else{
										$sql="DELETE FROM corridas WHERE desembolso_id=$desembolso_id";   
									}
										$resp =  mysqli_query($this->con(), $sql); 

									if($resp<=0){
										$datos[0]['respuesta'] 		='3'; 
										return $datos;
									}else{
										$sql="DELETE FROM desembolsos WHERE id=$desembolso_id"; 
										$resp =  mysqli_query($this->con(), $sql);  
										$datos[0]['respuesta'] 		='1';
									} 
								}
							}

							return $datos;
				}

 




	}

	?>