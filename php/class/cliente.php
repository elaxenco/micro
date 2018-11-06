<?php
	
	require_once("../conexion/conexion.php");

	class Cliente extends Conectar{

				// registro de clientes
 				public function guardarCliente($c_id,$c_nombre,$c_appaterno,$c_apmaterno,$c_fecha,$c_sexo,$c_ife,$c_cp,$c_colonia,$c_calle,$c_referencia,$c_cartera,$c_tel){
							$res=array();
							$datos=array(); 
							$capturista_id=$_COOKIE["micro_id"]; 
							$ife=0;
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

							if($c_id>0){
									$sql="UPDATE clientes SET appaterno='$c_appaterno',appmaterno='$c_apmaterno',nombre='$c_nombre',IFE='$c_ife',cp='$c_cp',colonia='$c_colonia',calle='$c_calle',dom_ref='$c_referencia' WHERE id=$c_id";  
									$resp=mysqli_query($this->con(), $sql); 

									//$resp=$this->insertar($sql);

							}
							else{
									$sqlinsert="INSERT INTO clientes (appaterno,apmaterno,nombre,sexo,IFE,cp,colonia,calle,domicilio_ref,cartera_id,telefono,capturista_id,fecha_registro,hora_registro)
									VALUES('$c_appaterno','$c_apmaterno','$c_nombre','$c_sexo','$c_ife','$c_cp','$c_colonia','$c_calle','$c_referencia',$c_cartera,'$c_tel',$capturista_id,CURDATE(),CURTIME())";  
									$resp= mysqli_query($this->con(), $sqlinsert);  

									//$resp= $this->insertar($sqlinsert);
									  

							}
							

							if($resp>0){
								$datos[0]['respuesta'] 		='3'; 
							}else{
								$datos[0]['respuesta'] 		='2'; 
							}
						 
		          		 
							return $datos;

								  
							    
				}

				//buscar los clientes de la cartera
				public function clientesCartera($c_cartera){
							$res=array();
							$datos=array();  
							$i=0;
							 
 
							 $sql="SELECT id, CONCAT(nombre,' ',appaterno,' ',apmaterno) nombre,IFNULL((SELECT capital FROM desembolsos WHERE cliente_id=clientes.id),0) desembolso FROM clientes WHERE cartera_id=$c_cartera"; 
							$resultado= mysqli_query($this->con(), $sql); 
							while ($res = mysqli_fetch_row($resultado)){
								$datos[$i]['cliente_id'] 	= $res[0]; 
								$datos[$i]['nombre'] 		= $res[1]; 
								$datos[$i]['desembolso']	= $res[2]; 

								$i++;
							} 

							return $datos;
						       		  
				}	

				public function clienteCartera($nombre,$c_cartera){
							$res=array();
							$datos=array();  
							$i=0;
							 
 
							 $sql="SELECT id, CONCAT(nombre,' ',appaterno,' ',apmaterno) nombre,IFNULL((SELECT capital FROM desembolsos WHERE cliente_id=clientes.id),0) desembolso FROM clientes WHERE cartera_id=$c_cartera AND appaterno LIKE '%$nombre%' OR apmaterno LIKE'%$nombre%' OR nombre LIKE '%$nombre%' "; 
							$resultado= mysqli_query($this->con(), $sql); 
							while ($res = mysqli_fetch_row($resultado)){
								$datos[$i]['cliente_id'] 	= $res[0]; 
								$datos[$i]['nombre'] 		= $res[1]; 
								$datos[$i]['desembolso']	= $res[2]; 

								$i++;
							} 

							return $datos;
						       		  
				}



	}

	?>