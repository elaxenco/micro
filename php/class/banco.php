<?php
	
	require_once("../conexion/conexion.php");

	class Banco extends Conectar{

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


	}

	?>