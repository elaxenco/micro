/// funciones
function cargarControlesReportes(){
	onRequestMant({ opcion :10,usuario_id:USUARIO_ID,rol_id:ROL_ID },resRegCarterasPorUsuario);
}
// BUSCAR DESEMBOLSOS
function generarReporteDesembolsos(){
  let fechaInicial = document.getElementById('fecha_inicial').value;
  let fechaFinal = document.getElementById('fecha_final').value;
  let cartera_id = document.getElementById('r_cartera').value;
  let tipo_id = document.getElementById('r_tipo').value;  
  let rol_id = leerCookie('micro_rol_id');

  if(fechaInicial=='' || fechaFinal=='' || fechaFinal<fechaInicial){
      mensajeAlerta('EL rango de fechas no es valido.','error')
      return;
  }

  if(rol_id>1){
    if(cartera_id<=0){
      mensajeAlerta('Es necesario seleccionar una cartera.','error')
      return;
    } 
  }

 // console.log(fechaInicial+' '+fechaFinal+' '+cartera_id+' '+tipo_id)

  onRequestReportes({ opcion :1,fecha_inicial:fechaInicial,fecha_final:fechaFinal,cartera_id:cartera_id,tipo_id:tipo_id },resReporteDesembolsos);
}
// BUSCAR PAGOS
function generarReportePagos(){
  let fechaInicial = document.getElementById('fecha_inicial').value;
  let fechaFinal = document.getElementById('fecha_final').value;
  let cartera_id = document.getElementById('r_cartera').value;
  let tipo_id = document.getElementById('r_tipo').value;  
  let rol_id = leerCookie('micro_rol_id');

  if(fechaInicial=='' || fechaFinal=='' || fechaFinal<fechaInicial){
      mensajeAlerta('EL rango de fechas no es valido.','error')
      return;
  }

  if(rol_id>1){
    if(cartera_id<=0){
      mensajeAlerta('Es necesario seleccionar una cartera.','error')
      return;
    } 
  } 
 // console.log(fechaInicial+' '+fechaFinal+' '+cartera_id+' '+tipo_id)

  onRequestReportes({ opcion :2,fecha_inicial:fechaInicial,fecha_final:fechaFinal,cartera_id:cartera_id,tipo_id:tipo_id },resReportePagos);
}


  //reportes colocado
 
function generarReporteColocado(){ 
  let cartera_id = document.getElementById('r_cartera').value;
  let tipo_id = document.getElementById('r_tipo').value;  
  let rol_id = leerCookie('micro_rol_id');


  if(rol_id>1){
    if(cartera_id<=0){
      mensajeAlerta('Es necesario seleccionar una cartera.','error')
      return;
    } 
  }

 // console.log(fechaInicial+' '+fechaFinal+' '+cartera_id+' '+tipo_id)

  onRequestReportes({ opcion :3,fecha_inicial:'2019-04-01',fecha_final:'2019-04-01',cartera_id:cartera_id,tipo_id:tipo_id },resReporteColocado);
}

//reportes movimeintos
 
function generarReporteMovimientos(){ 
  let fecha_inicial = document.getElementById('m_fecha_inicial').value;
  let fecha_final = document.getElementById('m_fecha_final').value;   

 
    if(fecha_inicial>fecha_final || fecha_inicial=='' || fecha_final =='' ){
      mensajeAlerta('El rango de fechas no es valido.','error')
      return;
    }  

 // console.log(fechaInicial+' '+fechaFinal+' '+cartera_id+' '+tipo_id)

  onRequestReportes({ opcion :4,fecha_inicial:fecha_inicial,fecha_final:fecha_final },resReporteMovimientos);
}

//funcion de pendiente de pagos
function generarReportePendientesPago(){
    let rol_id = leerCookie('micro_rol_id');
    let fecha_inicial = document.getElementById('p_fecha_inicial').value;
    let cartera_id = document.getElementById('r_cartera').value;

    if(rol_id>1){
        if(cartera_id<=0){
          mensajeAlerta('Es necesario seleccionar una cartera.','error')
          return;
        } 
    }

    if (fecha_inicial==''){
         mensajeAlerta('Es necesario seleccionar una fecha correcta.','error')
          return;
    }
    onRequestReportes({ opcion :5,cartera_id:cartera_id,fecha:fecha_inicial },resReportePendientesPago);
}

//respuesta de carteras por usuario
var resRegCarterasPorUsuario = function(data){
    if (!data && data == null) 
            return;    

     let contenido='<option selected value="0">Seleccione una cartera</option>' 

          for(var i=0; i<data.length; i++){
            //generamos  codigo html en el cual creamos parte de la tabla con los datos necesarios 
              contenido += `<option value="${data[i].cartera_id}">${data[i].nombre}</option>` 

          }
          //incrustamos el codigo html 
          document.getElementById('r_cartera').innerHTML=contenido;

}

//respuesta de desembolsos
var resReporteDesembolsos = function(data){
    if (!data && data == null) 
            return;   
 
        let contenido = ''
         for(var i=0; i<data.length; i++){
            
             contenido +=`<tr><td>${data[i].cliente_id}</td><td>${data[i].cliente}</td><td>${data[i].cartera}</td><td class='texto-derecha'>${data[i].desembolso}</td><td class='texto-derecha'>${data[i].fecha}</td><td>${data[i].tipo}</td><td>${data[i].capturista}</td></tr>`
          } 
        //incrustamos el codigo html en la tabla 
        document.getElementById('tb_rep_desembolsos').innerHTML=contenido;
}

//respuesta de pagos
var resReportePagos = function(data){
    if (!data && data == null) 
            return;   
 
        let contenido = ''
         for(var i=0; i<data.length; i++){
            
              contenido +=`<tr><td>${data[i].cliente_id}</td><td>${data[i].cliente}</td><td>${data[i].fecha}</td><td class='texto-derecha'>${data[i].pago_completo}</td><td class='texto-derecha'>${data[i].pago_capital}</td><td class='texto-derecha'>${data[i].pago_interes}</td><td class='texto-derecha'>${data[i].pago_seguro}</td><td>${data[i].cartera}</td><td>${data[i].capturista}</td></tr>`
         
          } 
        //incrustamos el codigo html en la tabla 
        document.getElementById('tb_rep_pagos').innerHTML=contenido;
}

//respuesta de colocado
var resReporteColocado = function(data){
    if (!data && data == null) 
            return;   
 
        let contenido = ''
         for(var i=0; i<data.length; i++){
            
              contenido +=`<tr><td>${data[i].cartera}</td><td class='texto-derecha'>${data[i].prestamos}</td><td class='texto-derecha'>${data[i].pagos}</td><td class='texto-derecha'>${data[i].colocado}</td><td class='texto-derecha'>${data[i].nc}</td></tr>`
         
          } 
        //incrustamos el codigo html en la tabla 
        document.getElementById('tb_rep_colocado').innerHTML=contenido;
}
 

//respuesta de movimientos

var resReporteMovimientos =function(data){ 
    let contenido = ''
         for(var i=0; i<data.length; i++){
            
              contenido +=`<tr><td>${data[i].caja}</td><td class='texto-derecha'>${data[i].saldo_inicial}</td><td class='texto-derecha'>${data[i].entradas}</td><td class='texto-derecha'>${data[i].pagos_capital}</td><td class='texto-derecha'>${data[i].pagos_interes}</td><td class='texto-derecha'>${data[i].pagos_seguro}</td><td class='texto-derecha'>${data[i].salidas}</td><td class='texto-derecha'>${data[i].desembolsos}</td><td class='texto-derecha'>${data[i].saldo_final}</td></tr>`
         
          } 
        //incrustamos el codigo html en la tabla 
        document.getElementById('tb_rep_movimientos').innerHTML=contenido;
}
  
var resReportePendientesPago = function(data){  

    let contenido = ''
         for(var i=0; i<data.length; i++){
            
              contenido +=`<tr><td>${data[i].cliente_id}</td><td>${data[i].cliente}</td><td>${data[i].fecha_mora}</td><td>${data[i].pagos_vencidos}</td><td>${data[i].dias_mora}</td><td class='texto-derecha'>${data[i].saldo_vencido}</td><td class='texto-derecha'>${data[i].saldo_total}</td><td>${data[i].cartera}</td></tr>`;
          } 
        //incrustamos el codigo html en la tabla 
        document.getElementById('tb_rep_vencidos').innerHTML=contenido;
}
