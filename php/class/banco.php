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


				public function gurdarDesembolso($cliente_id,$importe,$tipo_id,$capturista_id,$fechaPrimerPago,$cartera_id){
							$res=array();
					 		$datos=array();  
							$i=0; 
							//sacamos la fecha actual
							$fechaActual = date('Y-m-d');
							$fechaPrimerPago = $this->fechaPrimerPago( $fechaActual,$tipoDesembolso_id );

							$datos[0]['fecha'] 		=$fechaPrimerPago; 

						return $datos;  

				}


	}

	?>