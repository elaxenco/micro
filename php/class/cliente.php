<?php
	
	require_once("../conexion/conexion.php");

	class Cliente extends Conectar{


 				public function guardarCliente($c_id,$c_nombre,$c_appaterno,$c_apmaterno,$c_fecha,$c_sexo,$c_ife,$c_cp,$c_colonia,$c_calle,$c_referencia,$c_tel,$c_cartera){
							$res=array();
							$datos=array();
							$capturista_id=$_COOKIE["micro_id"]; 

						    $sql="SELECT * FROM clientes WHERE IFE='$c_ife'"; 
							$resultado= mysqli_query($this->con(), $sql); 
							while ($res = mysqli_fetch_row($resultado)) 
						       		$ife 		= $res[0];

							if($ife >0){
								 $datos[0]['respuesta'] 		='2'; 
								return $datos; 
							}
							else{
					 

								if($c_id>0){
										$sql="UPDATE clientes SET appaterno='$c_appaterno',appmaterno='$c_apmaterno',nombre='$c_nombre',IFE='$c_ife',cp=$c_cp,colonia='$c_colonia',calle='$c_calle',dom_ref='$c_referencia' WHERE id=$c_id"; 
										$resultado= mysqli_query($this->con(), $sql); 
								}else{
										$sql="INSERT INTO clientes (appaterno,apmaterno,nombre,sexo,IFE,cp,colonia,calle,domicilio_ref,cartera_id,telefono,capturista_id,fecha_registro,hora_registro)
															VALUES('$c_appaterno','$c_apmaterno','$c_nombre','$c_sexo','$c_ife',$c_cp,'$c_colonia','$c_calle','$c_referencia',$c_cartera,'$c_tel',$capturista_id,CURDATE(),CURTIME())"; 
										$resultado= mysqli_query($this->con(), $sql); 
								}
							}


							 
							 
							if($resultado>0){ 
							    $datos[0]['respuesta'] 		='1'; 
								return $datos; 
							}
							else{
								$datos[0]['respuesta'] 		= '0'; 
							    return $datos; 
							} 
						
				}



	}