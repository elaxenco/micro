<?php
	
		require_once("../utilidades/Funciones.php");

	class Reportes extends Funciones{


 				public function listaDesembolsos($fecha_inicial,$fecha_final,$cartera_id,$tipo_id){
							$res=array();
							$datos=array();
							$i=0;
							$respuesta=0;
							 

							 $sql="SELECT cte.id,CONCAT(cte.nombre,' ',cte.appaterno,' ',cte.apmaterno) cliente ,ct.descripcion cartera,d.capital desembolso,d.fecha,t.descripcion tipo,CONCAT(u.nombre,' ',u.appaterno,' ',u.apmaterno)capturista 
								FROM desembolsos d
								JOIN clientes cte ON cte.id=d.cliente_id
								JOIN  carteras ct ON ct.id=cte.cartera_id
								JOIN tipo_prestamo t ON t.id=d.tipo_id
								JOIN usuarios u ON u.id=d.capturista_id";   
							$resultado = mysqli_query($this->con(), $sql); 
						    while ($res = mysqli_fetch_row($resultado)) {

						       $datos[$i]['cliente_id'] 	= $res[0];
						       $datos[$i]['cliente'] 		= $res[1];
						       $datos[$i]['cartera'] 		= $res[2]; 
						       $datos[$i]['desembolso'] 	= $res[3]; 
						       $datos[$i]['fecha'] 			= $res[4]; 
						       $datos[$i]['tipo'] 			= $res[5]; 
						       $datos[$i]['capturista'] 	= $res[6]; 

						       $i++;
						    }   
							return $datos;    
					} 



	}