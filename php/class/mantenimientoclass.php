<?php
	
	require_once("../conexion/conexion.php");

	class Mantenimientoclass extends Conectar{


 				public function iniciarSesion($user,$pass){
							$res=array();
							$datos=array();
							$i=1;
							$respuesta=0;
							 

							$sql="SELECT id,CONCAT(nombre,' ',appaterno,' ',apmaterno) nombre,autorizacion,admin,autorizacion_esp 
										FROM usuarios WHERE usuario='$user' AND PASSWORD=MD5('$pass') AND estatus_id=5"; 
							$resultado = mysqli_query($this->con(), $sql); 
						    while ($res = mysqli_fetch_row($resultado)) {

						       $datos[$i]['usuario_id'] 		= $res[0];
						       $datos[$i]['nombre'] 			= $res[1];
						       $datos[$i]['autorizacion'] 		= $res[2];
						       $datos[$i]['autorizacion_admin'] = $res[3];
						       $datos[$i]['autorizacion_esp'] 	= $res[4];

						       $i++;
						    } 
							 
							if(empty($datos)){ 
							    $datos[0]['respuesta'] 		= 0; 
								return $datos; 
							}
							else{
								$datos[0]['respuesta'] 		= 1; 
							    return $datos; 
							} 
					}

				public function guardarCartera($cartera,$encargado_id){
							$res=array();
							$datos=array();
							$i=0;
							$respuesta=0;
							 

							$sql="INSERT INTO carteras (descripcion,encargado_id)
												VALUES('$cartera',$encargado_id)";  
							 mysqli_query($this->con(), $sql); 


							$sql="SELECT carteras.id,carteras.descripcion,CONCAT(usuarios.nombre,' ',usuarios.appaterno,' ',usuarios.apmaterno) usuario FROM carteras
                                    JOIN usuarios ON usuarios.id=carteras.encargado_id"; 
							$resultado = mysqli_query($this->con(), $sql); 
						    while ($res = mysqli_fetch_row($resultado)) {

						       $datos[$i]['cartera_id'] 		= $res[0];
						       $datos[$i]['nombre'] 			= $res[1];
						       $datos[$i]['encargado'] 		= $res[2]; 

						       $i++;
						    } 
							 
							return $datos; 
					}

				public function buscarCarteras(){
							$res=array();
							$datos=array();
							$i=0;
							$respuesta=0; 

							$sql="SELECT id, descripcion FROM carteras"; 
							$resultado = mysqli_query($this->con(), $sql); 
						    while ($res = mysqli_fetch_row($resultado)) {

						       $datos[$i]['cartera_id'] 		= $res[0];
						       $datos[$i]['cartera'] 		= $res[1]; 

						       $i++;
						    } 
							 
							return $datos; 
					}



	}