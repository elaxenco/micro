<?php
include("conexion.php");

class Funciones extends Conectar{

    // OBTENER LOS DIAS ENTRE DOS FECHAS // 
    function dias_transcurridos($fecha_inicial,$fecha_final)
    {   
        $dias   = (strtotime($fecha_inicial)-strtotime($fecha_final))/86400;
        $dias   = abs($dias); $dias = floor($dias);     
        return $dias;
    }
 
    
    // OBTENER EL DIA SE LA SEMANA LUNES-MARTES-MIERCOLES-JUEVES... //

	function dia_semana($fecha)
    {
    	switch( $this->diaSemana($fecha) )
        {
            case 1: $dia_semana = "LUNES"; 	break;
            case 2: $dia_semana = "MARTES"; 	break;
            case 3: $dia_semana = "MIERCOLES"; 	break;
            case 4: $dia_semana = "JUEVES"; 	break;
            case 5: $dia_semana = "VIERNES"; 	break;
            case 6: $dia_semana = "SABADO"; 	break;
            case 7: $dia_semana = "DOMINGO"; 	break;
        }
        return $dia_semana;
    }

     // OBTENER EL DIA DE LA SEMANA PARA UNA FECHA CONCRETA. //
    function diaSemana($fecha)
    {       
        list($anio,$mes,$dia) = explode("-", $fecha);
        /*if( empty($mes) || empty($anio) )
            list($anio,$mes,$dia) = explode("/", $fecha);*/
        
        // 0->domingo    | 6->sabado
        $dia = date("w",mktime(0, 0, 0, $mes, $dia, $anio));
        if($dia == 0) $dia = 7;
        return $dia;
    }

     // OBTENER LOS DIAS QUE TIENE UN MES //
    function diasMes($mes,$anio)
    {
        $dias_mes = mktime( 0, 0, 0, $mes, 1, $anio );
        setlocale(LC_ALL,"es_ES");
        $dias_mes = date("t",$dias_mes);
        return $dias_mes;
    }
    
    // AGREGAR UN DIA O UN MES O UN AÑO A UNA FECHA //
    function DateAdd($givendate,$day=0,$mth=0,$yr=0) 
    {
        $cd = strtotime($givendate);
        $newdate = date('Y-m-d', mktime(date('h',$cd), //$newdate = date('Y-m-d h:i:s', mktime(date('h',$cd),
        date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
        date('d',$cd)+$day, date('Y',$cd)+$yr));
        return $newdate;
    }

     // FUNCION FECHA DEL PRIMER PAGO  //
    function fechaPrimerPago( $fecha_corrida,$tipoDesembolso_id )
    {
        $dia_corte1 = 0;
        $dia_corte2 = 0;
        $x = 0; 

        //list($anio, $mes, $dia) = explode('/', $fecha_corrida);
        //if (empty($anio) || empty($mes))
        list($anio, $mes, $dia) = explode('-', $fecha_corrida);

        $sql = "SELECT dia_mes FROM dias_corte WHERE tipo_id=$tipoDesembolso_id"; 
        $resultado= mysqli_query($this->con(), $sql); 
        while ($fila = mysqli_fetch_row($resultado)){
       
            if( $x==0 )
                $dia_corte1 = $fila[ 0 ];
            if( $x==1 )
                $dia_corte2 = $fila[ 0 ];

            $x++;
        }
        
        //Todos los vales que se cobren entre el primer dia de corte (8 de cada mes ) y 
        // un dia antes del ultimo dia de corte (23 de cada mes) empezaran a pagarce el ultimo dia 
        // de ese mes
        if( $dia>$dia_corte1 && $dia<=$dia_corte2 )
        {
            // OBTENER LOS DIAS QUE TIENE UN MES //
            $dias_mes = $this->diasMes($mes,$anio);

            $dia_p = $dias_mes;
            $fecha = "$anio-$mes-$dia_p"; //FECHA DEL PRIMER PAGO
        }

        //Todos los vales que se cobren antes del primer dia de corte (8 de cada mes)
        // empezaran a pagar el 15 de ese mes
        if( $dia<=$dia_corte1 )
        {
            $dia_p = 15;
            $fecha = "$anio-$mes-$dia_p"; //FECHA DEL PRIMER PAGO
        }

        //Todos los vales que se cobren despues del segundo dia de corte (23 de cada mes)
        // empezaran a pagar el 15 del mes que entra
        if( $dia>$dia_corte2 )
        {
            $dia_p = 15;
            //Sumarle un mes a la fecha para sacar el 15 del mes que sigue
            $sql = "SELECT DATE_ADD('$fecha_corrida', INTERVAL 1 MONTH)"; 
             $resultado= mysqli_query($this->con(), $sql); 
             while ($fila = mysqli_fetch_row($resultado)) 
                $fecha = $fila[ 0 ];

            list($anio, $mes, $dia) = explode('-', $fecha);
            $fecha = "$anio-$mes-$dia_p"; //FECHA DEL PRIMER PAGO
        }

        return $fecha;
    }

       // VERIFICAMOS EL ESTATUS DEL CORTE DE CAJA. //
    function corte($caja_id,$tipo_caja,$fecha)
    {       
        $sql = "SELECT corte_procesado FROM cortes WHERE caja_id=$caja_id AND tipo_caja=$tipo_caja AND fecha ='$fecha'";  
             $res= mysqli_query($this->con(), $sql); 
             while ($fila = mysqli_fetch_row($res)) 
                $corte = $fila[ 0 ];
        
        if(empty($corte))
            $corte='N'; 
        
        return $corte; 
    }


	
}


?>