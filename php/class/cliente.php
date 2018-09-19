<?php
	
	require_once("../conexion/conexion.php");

	class Cliente extends Conectar{


 				public function guardarCliente($c_id,$c_nombre,$c_appaterno,$c_apmaterno,$c_fecha,$c_sexo,$c_ife,$c_cp,$c_colonia,$c_calle,$c_referencia,$c_cartera){
							$res=array();
							$datos=array();

							if($c_id>0){
									$sql="UPDATE clientes SET appaterno='$c_appaterno',appmaterno='$c_apmaterno',nombre='$c_nombre',IFE='$c_ife',cp=$c_cp,colonia='$c_colonia',calle='$c_calle',dom_ref='$c_referencia' WHERE id=$c_id"; 
									 mysqli_query($this->con(), $sql); 
							}else{
									$sql="INSERT INTO clientes ()"; 
									 mysqli_query($this->con(), $sql); 
							}
						
				}



	}