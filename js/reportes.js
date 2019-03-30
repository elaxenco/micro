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

          console.log(data)
        let contenido = ''
         for(var i=0; i<data.length; i++){
            
             contenido +=`<tr><td>${data[i].cliente_id}</td><td>${data[i].cliente}</td><td>${data[i].cartera}</td><td>${data[i].desembolso}</td><td>${data[i].fecha}</td><td>${data[i].tipo}</td><td>${data[i].capturista}</td></tr>`
          } 
        //incrustamos el codigo html en la tabla 
        document.getElementById('tb_rep_desembolsos').innerHTML=contenido;
}

//respuesta de pagos
var resReportePagos = function(data){
    if (!data && data == null) 
            return;   

          console.log(data)
        let contenido = ''
         for(var i=0; i<data.length; i++){
            
              contenido +=`<tr><td>${data[i].cliente_id}</td><td>${data[i].cliente}</td><td>${data[i].fecha}</td><td>${data[i].pago_completo}</td><td>${data[i].pago_capital}</td><td>${data[i].pago_interes}</td><td>${data[i].pago_seguro}</td><td>${data[i].capturista}</td><td>${data[i].cartera}</td></tr>`
         
          } 
        //incrustamos el codigo html en la tabla 
        document.getElementById('tb_rep_pagos').innerHTML=contenido;
}
 
    
