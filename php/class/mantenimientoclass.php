<?php
	
		require_once("../utilidades/Funciones.php");

	class Mantenimientoclass extends Funciones{


 				public function iniciarSesion($user,$pass){
							$res=array();
							$datos=array();
							$i=1;
							$respuesta=0;
							 

							$sql="SELECT id,CONCAT(nombre,' ',appaterno,' ',apmaterno) nombre,rol_id 
										FROM usuarios WHERE usuario='$user' AND PASSWORD=MD5('$pass') AND estatus_id=5";  
							$resultado = mysqli_query($this->con(), $sql); 
						    while ($res = mysqli_fetch_row($resultado)) {

						       $datos[$i]['usuario_id'] 		= $res[0];
						       $datos[$i]['nombre'] 			= $res[1];
						       $datos[$i]['rol_id'] 			= $res[2]; 

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

				public function guardarCartera($cartera ){
							$res=array();
							$datos=array();
							$i=0;
							$respuesta=0;
							 

							$sql="INSERT INTO carteras (descripcion )
												VALUES('$cartera' )";  
							 mysqli_query($this->con(), $sql);  
							 
							return $this->buscarCarterasUsuarios(); 
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
				
				public function guardarUsuario($usuario_id,$nombre,$appaterno,$apmaterno,$rol_id,$nombreUsuario,$pwd){
							$res=array();
							$datos=array();
							$i=0;
							$resp=0;  
							$pwd=md5($pwd);
							$accesos=0;
							$sqlinsert='';

							if ($usuario_id>0) {
								//validamos que almenos exista una cartera para este usuario ya que no es admin
								if($rol_id>1){ 
									$sql="SELECT COUNT(*) FROM acceso_temporal"; 
									$resultado = mysqli_query($this->con(), $sql); 
								    while ($res = mysqli_fetch_row($resultado)) 
								        	  $accesos = $res[0];

								}else{
									$accesos=1;
								}	

								//agregamos los permisos al usuario
							    $sql="SELECT cartera_id FROM acceso_temporal"; 
								$resultado = mysqli_query($this->con(), $sql); 
							    while ($res = mysqli_fetch_row($resultado)){
							    		$cartera_id = $res[0];

							    		$sqlinsert="INSERT INTO detalles_usuario_cartera (usuario_id,cartera_id) VALUES($usuario_id,$cartera_id)"; 
										$resp = mysqli_query($this->con(), $sqlinsert); 
							    }      
							    // actualizamos los datos
							 	$sql = "UPDATE usuarios SET appaterno='$appaterno',apmaterno='$appaterno',nombre='$nombre',rol_id=$rol_id, password='$pwd' WHERE id=$usuario_id";
							 	$resp = mysqli_query($this->con(), $sql); 

							 	if($resp>0){
									$datos[0]['respuesta'] 		='3'; 
								}else{
									$datos[0]['respuesta'] 		='1'; 
								}


							}else{  


									//validamos que almenos exista una cartera para este usuario
								if($rol_id>1){ 
									$sql="SELECT COUNT(*) FROM acceso_temporal"; 
									$resultado = mysqli_query($this->con(), $sql); 
								    while ($res = mysqli_fetch_row($resultado)) 
								        	  $accesos = $res[0];

								}else{
									$accesos=1;
								}
									

								    if($accesos>0){
								    	//agregamos usuario
								    	$sql="INSERT INTO usuarios(appaterno,apmaterno,nombre,usuario,password,estatus_id,rol_id) VALUES('$appaterno','$apmaterno','$nombre','$nombreUsuario','$pwd',5,$rol_id)"; 
										mysqli_query($this->con(), $sql); 
										// obtenemos el id del usuario nuevo
										$sql="SELECT id FROM usuarios WHERE usuario='$nombreUsuario'"; 
										$resultado = mysqli_query($this->con(), $sql); 
									    while ($res = mysqli_fetch_row($resultado)) 
									        	  $usaurio_id = $res[0];
									    //agregamos los permisos al usuario
									    $sql="SELECT cartera_id FROM acceso_temporal"; 
										$resultado = mysqli_query($this->con(), $sql); 
									    while ($res = mysqli_fetch_row($resultado)){
									    		$cartera_id = $res[0];

									    		$sqlinsert="INSERT INTO detalles_usuario_cartera (usuario_id,cartera_id) VALUES($usaurio_id,$cartera_id)"; 
												$resp = mysqli_query($this->con(), $sqlinsert); 
									    } 
									        	 

										if($usaurio_id>0){
											$datos[0]['respuesta'] 		='2'; 
										}else{
											$datos[0]['respuesta'] 		='1'; 
										}
								    }else{
								    		$datos[0]['respuesta'] 		='4'; 
								    }

									
							}

 					return $datos; 
				}
				//agregamos un acceso ala cartera temporal mente para el proximo usuario que se generara
				public function agregarCarteraTemporal($cartera_id){
							$res=array();
							$datos=array();
							$i=0;
							$respuesta=0; 

							$sql="INSERT INTO acceso_temporal(cartera_id)VALUES($cartera_id)"; 
							 mysqli_query($this->con(), $sql);  
							 
							return $datos[0]['respuesta'] 		='1'; 
				}
				//truncamos los accesos
				public function truncarAccesos(){
							$res=array();
							$datos=array();
							$i=0;
							$respuesta=0; 

							$sql="TRUNCATE acceso_temporal"; 
							mysqli_query($this->con(), $sql);  
							 
							return $datos[0]['respuesta'] 		='1'; 
				}

				//cargamos los usuarios 
				public function cargarUsuarios(){
							$res=array();
							$datos=array();
							$i=0;
							$respuesta=0; 

							$sql="SELECT u.id,u.nombre,e.descripcion FROM usuarios  u
									JOIN estatus e ON e.id=u.estatus_id"; 
							$resultado = mysqli_query($this->con(), $sql); 
						    while ($res = mysqli_fetch_row($resultado)) {

						       $datos[$i]['usuario_id'] 	= $res[0];
						       $datos[$i]['nombre'] 		= $res[1]; 
						       $datos[$i]['estatus'] 		= $res[2]; 

						       $i++;
						    } 
					return $datos; 
				}

				//truncamos los accesos
				public function buscarUsuario($usuario_id){
							$res=array();
							$datos=array();
							$i=0;
							$respuesta=0; 

							$sql="SELECT id,appaterno,apmaterno,nombre,usuario,rol_id,password FROM usuarios WHERE id=$usuario_id"; 
							$resultado = mysqli_query($this->con(), $sql); 
						    while ($res = mysqli_fetch_row($resultado)) {

						       $datos[$i]['usuario_id'] 	= $res[0];
						       $datos[$i]['appaterno'] 		= $res[1]; 
						       $datos[$i]['apmaterno'] 		= $res[2]; 
						       $datos[$i]['nombre'] 		= $res[3];
						       $datos[$i]['usuario'] 		= $res[4]; 
						       $datos[$i]['rol_id'] 		= $res[5]; 
						       $datos[$i]['password'] 		= $res[6]; 

						       $i++;
						    } 
					return $datos; 
				}
				// buscamos las carteras por usuarios
				public function buscarCarterasUsuarios(){
							$res=array();
							$datos=array();
							$i=0;
							$respuesta=0; 

							$sql="SELECT c.id,c.descripcion,IFNULL(u.id,0) usuario_id,IFNULL(CONCAT(u.nombre,' ',u.appaterno),'SIN ASIGNAR') encargado FROM carteras c
									LEFT JOIN detalles_usuario_cartera duc ON duc.cartera_id=c.id
									LEFT JOIN usuarios u ON u.id=duc.usuario_id GROUP BY c.id ORDER BY c.id "; 
							$resultado = mysqli_query($this->con(), $sql); 
						    while ($res = mysqli_fetch_row($resultado)) {

						       $datos[$i]['cartera_id'] 		= $res[0];
						       $datos[$i]['nombre'] 			= $res[1];
						       $datos[$i]['encargado_id'] 		= $res[2];
						       $datos[$i]['encargado'] 			= $res[3]; 

						       $i++;
						    } 
							 
							return $datos; 
				}
				//funcion para buscar las carteras del cliente
				public function buscarCarterasDeUsuario($usuario_id,$rol_id){
							$res=array();
							$datos=array();
							$i=0;
							$respuesta=0; 


							if($rol_id==1){
								$ql="";
							}else{
								$ql="WHERE u.id=$usuario_id";
							}

							$sql="SELECT c.id,c.descripcion,IFNULL(u.id,0),IFNULL(CONCAT(u.nombre,' ',u.appaterno),'SIN ASIGNAR') encargado FROM carteras c
									LEFT JOIN detalles_usuario_cartera duc ON duc.cartera_id=c.id
									LEFT JOIN usuarios u ON u.id=duc.usuario_id $ql GROUP BY c.id ORDER BY c.id ";    
 
							$resultado = mysqli_query($this->con(), $sql); 
						    while ($res = mysqli_fetch_row($resultado)) {

						       $datos[$i]['cartera_id'] 		= $res[0];
						       $datos[$i]['nombre'] 			= $res[1];
						       $datos[$i]['encargado_id'] 		= $res[2];
						       $datos[$i]['encargado'] 			= $res[3]; 

						       $i++;
						    } 
							 
							return $datos; 
				}

				// buscamos las carteras por usuarios
				public function menuPorRoles(){
							$res=array();
							$datos=array();
							$i=0;
							$respuesta=0;  
							$rol_id = $_COOKIE['micro_rol_id'];

							if($rol_id>1){
								$sql="SELECT m.id,m.html_id FROM detalle_menu_roles mr
 										JOIN menu m ON m.id=mr.menu_id
 								  WHERE mr.rol_id=$rol_id";  
 							}else{
 								$sql="SELECT m.id,m.html_id FROM menu m ORDER BY id asc ";
 							} 

							$resultado = mysqli_query($this->con(), $sql); 
						    while ($res = mysqli_fetch_row($resultado)) {

						       $datos[$i]['m_id'] 		= $res[0];
						       $datos[$i]['m_html_id'] 			= $res[1]; 

						       $i++;
						    } 
							 
							return $datos; 
				}
 



	}