<?php
//http://localhost/index-debug/php/procesos/seguro_credito.php
require_once( '../utilidades/Funciones.php' );

/*set_include_path('/home/axenco/MIINVERSI/php/utilidades/');
require 'Funciones.php';*/
date_default_timezone_set('America/Chihuahua');
$con = new Funciones();


$fecha_actual= date('Y-m-d');  
$fechaantesde='';
$fecha_actual   =$con-> DateAdd($fecha_actual,-1); 
list($anio, $mes, $dia) = explode('-', $fecha_actual);

   // OBTENER LOS DIAS QUE TIENE UN MES //
    $dias_mes = $con->diasMes($mes,$anio); 


    if($dia==15)
        $dia_corte=5;
    else
        $dia_corte=20;


$fechaantesde = $anio.'-'.$mes.'-'.$dia;  

if ( $dia == 15 || $dia==$dias_mes )
{
   

$INTERES_QUINCENAL =.10;



$sql = "SELECT cliente_id,fecha,capital,id FROM desembolsos WHERE tipo_id=3 AND estatus_id=5 AND fecha<'$fechaantesde'"; 

$resultado= mysqli_query($con->con(), $sql); 
while ($fila = mysqli_fetch_row($resultado)){

    $cliente_id=  $fila[0];
    $fecha=  $fila[1];
    $capital=  $fila[2]; 
    $desembolso_id=  $fila[3]; 

    $nuevo_capital=0;
    $nuevo_interes =0;
    $nuevo_pago_completo=0;

    $sql2 = "SELECT capital, pago_capital,pago_interes ,interes interesReal ,interes-  pago_interes saldoInteres ,desembolso_id,fecha_pago 
            FROM corridas_tipo_c WHERE cliente_id=$cliente_id AND estatus_id=5 AND desembolso_id=$desembolso_id";  
 
    $resultado2= mysqli_query($con->con(), $sql2); 
    while ($fila2 = mysqli_fetch_row($resultado2)){

            $capital        = $fila2[0];
            $pago_capital   = $fila2[1];
            $pago_interes   = $fila2[2];
            $interesReal    = $fila2[3];
            $saldoInteres   = $fila2[4];
            $desembolso_id  = $fila2[5];
            $fechaPrimerPago  = $fila2[6];


            if($saldoInteres==0){
                $nuevo_capital=$capital-$pago_capital;
                $nuevo_interes=$nuevo_capital*$INTERES_QUINCENAL;
                $nuevo_pago_completo=$nuevo_capital+$nuevo_interes;
            }else{
                $nuevo_capital=$capital;
                $nuevo_interes=($capital*$INTERES_QUINCENAL)+$saldoInteres;
                $nuevo_pago_completo=$nuevo_capital+$nuevo_interes;
            }
 
             $sql3 = "UPDATE corridas_tipo_c SET estatus_id=2 WHERE cliente_id=$cliente_id AND desembolso_id=$desembolso_id AND estatus_id=5"; 
             $resultado3= mysqli_query($con->con(), $sql3); 
             
            
             list($anio, $mes, $dia) = explode('-', $fechaPrimerPago);

                if ( $dia >= 1 && $dia <= 15 )
                {
                    // OBTENER LOS DIAS QUE TIENE UN MES //
                    $dias_mes = $con->diasMes($mes,$anio); 
                    $fechaPrimerPago=$con->DateAdd($fechaPrimerPago,($dias_mes-15) );
                }
                else
                {
                    $fechaPrimerPago=$con->DateAdd($fechaPrimerPago,15);
                }


             $sql3 ="INSERT INTO  corridas_tipo_c (cliente_id,desembolso_id,fecha_pago,pago_completo,capital,interes,pago_capital,pago_interes,estatus_id,saldo)
                        VALUES ($cliente_id,$desembolso_id,'$fechaPrimerPago',$nuevo_pago_completo,$nuevo_capital,$nuevo_interes,0,0,5,$nuevo_pago_completo)";
            
             $resultado4= mysqli_query($con->con(), $sql3); 

             if( $resultado2 < 0 )
                { 
                    echo "Error al Insertar <br>$sql3";
                }
                else
                { 
                    echo "Proceso   Finalizado";
                }
 

            $capital        = 0;
            $pago_capital   = 0;
            $pago_interes   = 0;
            $interesReal    = 0;
            $saldoInteres   = 0;
            $desembolso_id  = 0;
            $fechaPrimerPago  = 0;

    }

}


}

?>