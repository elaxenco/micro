
///funciones 

//funcion para inicializar controles
function cargarControles(){
  onRequestMant({ opcion :10,usuario_id:USUARIO_ID,rol_id:ROL_ID },resRegCarterasPorUsuario);
}
//funcion para inicializar controles de cajas
function cargarControlesCajas(){
  onRequestBanco({ opcion :8 },resRegCajas);
}
//
function buscarClientesPorCartera(cartera_id){
	onRequestCte({ opcion : 2 ,c_cartera:cartera_id},resClientesCartera);
}

//Buscar clientes por nombre
function buscarClientes(clt){ 
  var c_cartera = document.getElementById("c_cartera").value;
// buscamos clientes despues de que el usuario agrege almenos 3 caracteres
  if(clt.length>3){
      onRequestCte({ opcion : 3 ,nombre:clt,c_cartera:c_cartera},resClientesCartera);
  }else{

     onRequestCte({ opcion : 2 ,c_cartera:c_cartera},resClientesCartera);
  }

}


//
function seleccionarCliente(cliente_id){  
	 
	document.getElementById('b_cliente').innerHTML=`${arregloClientes[cliente_id][0]} - ${arregloClientes[cliente_id][1]} `; 

	 /*let id = $("#c_id_desembolso").val().split(' ', 1) 
       console.log(id[0])*/ 
   document.getElementById('desembolsoActual').innerHTML=`$ ${arregloClientes[cliente_id][2]}`;  
   document.getElementById('saldoTotal').innerHTML=`$ ${arregloClientes[cliente_id][4]}`;

   
   onRequestBanco({ opcion : 6 ,cliente_id:cliente_id},resEstadoCtaCliente);
 
}

//seleccionamos el tipo de pago
function seleccionarTipoPago(tipo_id){ 
     let pagoNormal = document.getElementById('pagoNormal').innerHTML;
     let saldoVencido = document.getElementById('saldoVencido').innerHTML;
     let saldoExigible= document.getElementById('saldoExigible').innerHTML;
     let saldoTotal= document.getElementById('saldoTotal').innerHTML;


     pagoNormal = pagoNormal.replace('$','')
     pagoNormal = pagoNormal.replace(' ','') 
     saldoVencido = saldoVencido.replace('$','')
     saldoVencido = saldoVencido.replace(' ','')
     saldoExigible = saldoExigible.replace('$','')
     saldoExigible = saldoExigible.replace(' ','')
     saldoTotal = saldoTotal.replace('$','')
     saldoTotal = saldoTotal.replace(' ','')
 
  switch(tipo_id){

      case '1':
            document.getElementById('b_monto').value = saldoExigible;
            document.getElementById('b_monto').readOnly =true
        break;
      case '2':
            document.getElementById('b_monto').value = pagoNormal;
            document.getElementById('b_monto').readOnly =true
        break;
      case '3':
            document.getElementById('b_monto').value = '';
            document.getElementById('b_monto').readOnly =false
        break;
      case '4':
            document.getElementById('b_monto').value = saldoTotal;
            document.getElementById('b_monto').readOnly =true
        break;

      default:
          document.getElementById('b_monto').value = '';
          document.getElementById('b_monto').readOnly =true
        break;

  }

}
//guardamos el pago
function guardarPago(){

  let saldo= document.getElementById('saldoTotal').innerHTML;
  saldo = saldo.replace('$',''); 
  saldo = saldo.replace(' ','');
  //parseamos el numero  en entero
  saldo = parseInt(saldo);

  let b_cliente_id =  document.getElementById('b_cliente').innerHTML.split(' ',1); 
  let monto =  document.getElementById('b_monto').value;
   /*let id = $("#c_id_desembolso").val().split(' ', 1) 
       console.log(id[0])*/ 
  //verificamos que el saldo no sea menor al monto que el usuario desea abonar
  if(saldo<monto){
     mensajeAlerta('¡El monto ingresado no puede ser mayor al saldo total.!','error');
     return;
  }
  //verificamos que el abono no sea 0
   if(monto<=0){
      mensajeAlerta('¡El monto ingresado no es correcto.!','error')
   }else{ //preguntamos si esta seguro de realizar el mocimiento
        swal({ 
              title: `¿Seguro de realizar el siguiente movimiento? Pago de ${monto} al cliente ${document.getElementById('b_cliente').innerHTML}`,
              icon: "warning",
              buttons: true,  
            })
            .then((respuesta) => {
               if(respuesta){
                    onRequestBanco({ opcion : 7 ,cliente_id:b_cliente_id[0],pago:monto,capturista_id:USUARIO_ID},resEstadoCtaCliente);
               }else{
                    mensajeAlerta('¡El movimiento fue cancelado.!','error')
               }
            });
   }

}
///////////////////////////////////////////////////////////apartado de cajas/////////////////////////////////////////
//funcion para guardar movimiento e/s
function guardarMovimiento(){
  // inicializamos las variables
  let caja_id = document.getElementById('c_caja_id').value;
  let movimiento_id = document.getElementById('c_movimiento_id').value;
  let descripcion = document.getElementById('c_descripcion_movimiento').value.toUpperCase();
  let tipo_id = document.getElementById('c_tipo_id').value;
  let fecha = document.getElementById('c_fecha').value;
  let importe = document.getElementById('c_importe').value;
  
  //validamos que los campos esten correctamente llenados
  if(caja_id<1)
      return mensajeAlerta('Lacaja seleccionada no es valida','error')

  if(descripcion.length<5)
      return mensajeAlerta('La descripcion no es correcta','error')

  if(tipo_id<1)
      return mensajeAlerta('No se espesifico el tipo de movimiento', 'error')

  if(fecha=='')
      return mensajeAlerta('La fecha ingresada no es valida','error')

  if(importe<1)
      return mensajeAlerta('El importe ingresado no es valido','error')

    //extraemos del arreglo de cajas el tipo de caja ya sea cartera o oficina
  let tipo_caja =arregloCajas[caja_id][0].tipo_caja;

  onRequestBanco({ opcion :9,caja_id:caja_id,movimiento_id:movimiento_id,descripcion:descripcion,tipo_id:tipo_id,fecha:fecha,importe:importe,tipo_caja:tipo_caja },resGuardarMovimiento);
}

// funcion para limpiar los campos
function limpiarCamposCaja(){
    document.getElementById('c_caja_id').value=0;
    document.getElementById('c_movimiento_id').value=0;
    document.getElementById('c_descripcion_movimiento').value="";
    document.getElementById('c_tipo_id').value=0;
    document.getElementById('c_fecha').value="";
    document.getElementById('c_importe').value=0;
    document.getElementById('tb_movimientos').innerHTML=''; 
} 

//buscar movimiento dependiendo de la cartera seleccionada
function buscarMovimientosPorCaja(caja_id){

    if(caja_id<1){
      document.getElementById('tb_movimientos').innerHTML=''; 
    }else{

      let tipo_caja =arregloCajas[caja_id][0].tipo_caja;
      onRequestBanco({ opcion :10,caja_id:caja_id,tipo_caja:tipo_caja},resMovimientosPorCaja);
    }
}
//nos posicionamos en el movimiento seleccionado
function seleccionarMovimiento(movimiento_id){
  let tipo_movimiento= ''
  if(arregloMovimientos[movimiento_id][0].tipo=='ENTRADA')
      tipo_movimiento='E'
  else
      tipo_movimiento='S'
   
  document.getElementById('c_movimiento_id').value=movimiento_id;
  document.getElementById('c_descripcion_movimiento').value=arregloMovimientos[movimiento_id][0].descripcion;
  document.getElementById('c_tipo_id').value=tipo_movimiento;
  document.getElementById('c_fecha').value=arregloMovimientos[movimiento_id][0].fecha;
  document.getElementById('c_importe').value=arregloMovimientos[movimiento_id][0].importe;
}
//funcion para cancelar movimiento de caja
function cancelarMovimiento(){
   // inicializamos las variables 
  let movimiento_id = document.getElementById('c_movimiento_id').value; 
  let caja_id = document.getElementById('c_caja_id').value;
  //validamos que los campos esten correctamente llenados
  if(movimiento_id<1)
      return mensajeAlerta('Es necesario seleccionar un movimiento para su cancelacion.','error')
 

  onRequestBanco({ opcion :11,movimiento_id:movimiento_id},buscarMovimientosPorCaja(caja_id));

}
/////////////////////////////////////////////////////////////////////////////// respuestas pagos//////////////////////////////
//respuesta de carteras por usuario
var resRegCarterasPorUsuario = function(data){
    if (!data && data == null) 
            return;   
          console.log(data)

     let contenido='<option selected value="0">Seleccione una cartera</option>' 

          for(var i=0; i<data.length; i++){
            //generamos  codigo html en el cual creamos parte de la tabla con los datos necesarios 
              contenido += `<option value="${data[i].cartera_id}">${data[i].nombre}</option>` 
          }
          //incrustamos el codigo html en la tabla
          //$("#c_cartera").html(contenido);  
          document.getElementById('c_cartera').innerHTML =contenido;

}
//inicializamos arreglo para los clientes que posterior mente llenaremos
var arregloClientes =[]
//respuesta con los clientes de cada cartera
var resClientesCartera = function(data){
    if (!data && data == null) 
            return   
    
    //console.log(data)
          let contenido=''  

          for(var i=0; i<data.length; i++){

          	
          	  
              if(data[i].desembolso>0){ 
              	//generamos un arreglo con todos los clientes que traiga la cartera 0-> ID 1->NOMBRE 2->PRESTAMO 3->PAGOS  ACTUAL 4->SALDO 5-> TIPO_ID
                arregloClientes[data[i].cliente_id] = [ data[i].cliente_id ,data[i].nombre , data[i].desembolso ,data[i].pagos, data[i].saldo];
                //generamos  codigo html en el cual creamos parte de la tabla con los datos necesarios 
              	contenido += `<tr data-toggle="modal" data-target="#modalBanco" class="subrallar-tabla" onclick="seleccionarCliente(${data[i].cliente_id})"><td> ${data[i].cliente_id}</td><td>${data[i].nombre}</td><td>${data[i].desembolso}</td>
                              </tr> `
              }  

          }
          //incrustamos el codigo html en la tabla
          $("#tb_clientes").html(contenido); 
          // inicializamos algunos valores para que funcionen correctamente
          $('[data-toggle="tooltip"]').tooltip() 
}

//respuesta de carteras por usuario
var resEstadoCtaCliente = function(data){
    if (!data && data == null) 
            return;    

          //console.log(data)

          document.getElementById('desembolsoActual').innerHTML=`$ ${data[0].capital}`;
          document.getElementById('pagoNormal').innerHTML=`$ ${data[0].pagoNormal}`;
          document.getElementById('saldoVencido').innerHTML=`$ ${data[0].saldoVencido}`;
          document.getElementById('saldoExigible').innerHTML=`$ ${data[0].saldoExigible}`;
          document.getElementById('saldoTotal').innerHTML=`$ ${data[0].saldoTotal}`;
          // si el saldo es 0 quiere decir que es respuesta de un abono por lo tanto refrescamos los clientes
          if(data[0].saldoTotal<=0){
            onRequestCte({ opcion : 2 ,c_cartera:document.getElementById('c_cartera').value},resClientesCartera);
          }

}
/////////////////////////////////////////////////////////////////////////////respuestas de caja ////////////////////////////////////
//inicializamos arreglo de cajas que necesitaremos posterior mente
var arregloCajas =[]
//respuesta de cajas por usuario
var resRegCajas = function(data){
    if (!data && data == null) 
            return;    

     let contenido='<option selected value="0">Seleccione una caja</option>' 

          for(var i=0; i<data.length; i++){
            //generamos  codigo html en el cual creamos parte de la tabla con los datos necesarios 
             arregloCajas[data[i].identificador_gen] = [{ id_real: data[i].id_real , id_compuesto : data[i].id_compuesto  ,descripcion: data[i].descripcion ,tipo_caja:data[i].tipo_caja}];
              contenido += `<option value="${data[i].identificador_gen}">${data[i].descripcion}</option>`


          }
          //incrustamos el codigo html en la tabla
          document.getElementById('c_caja_id').innerHTML=contenido;
 

}

///respuesta de guardar movimiento
var resGuardarMovimiento = function(data){
    if (!data && data == null) 
            return;   

         // console.log(data)
        switch(data[0].respuesta){
            case '2':
                  mensajeAlerta('El movimiento se registro correctamente','success');
                 //  cargarMovimientosPorCaja();
                 limpiarCamposCaja();
              break
            case '3':
                  mensajeAlerta('Ocurrio un error al intentar guardar el movimiento','error')
              break
            case '4':
                  mensajeAlerta('El corte ya fue creado no es posible realizar el movimiento.','error')
              break
        }
}
//arreglo de movimientos
var arregloMovimientos =[]
///respuesta de guardar movimiento
var resMovimientosPorCaja = function(data){
    if (!data && data == null) 
            return;  

     let contenido='' 

          for(var i=0; i<data.length; i++){

            arregloMovimientos[data[i].movimiento_id] = [{ movimiento_id: data[i].movimiento_id , descripcion : data[i].descripcion  ,fecha: data[i].fecha ,importe:data[i].importe,tipo :data[i].tipo}];
            //generamos  codigo html en el cual creamos parte de la tabla con los datos necesarios 

            contenido += `<tr class="subrallar-tabla" onclick="seleccionarMovimiento(${data[i].movimiento_id})"><td>${data[i].movimiento_id}</td><td>${data[i].descripcion}</td><td>${data[i].fecha}</td><td>${data[i].importe}</td><td>${data[i].tipo}</td><td>${data[i].capturista}</td></tr>`
 
          }
          //incrustamos el codigo html en la tabla
          document.getElementById('tb_movimientos').innerHTML=contenido; 
}

   /*  let contenido='<option selected value="0">Seleccione una caja</option>' 

          for(var i=0; i<data.length; i++){
            //generamos  codigo html en el cual creamos parte de la tabla con los datos necesarios 
             arregloCajas[data[i].identificador_gen] = [{ id_real: data[i].id_real , id_compuesto : data[i].id_compuesto  ,descripcion: data[i].descripcion ,tipo_caja:data[i].tipo_caja}];
              contenido += `<option value="${data[i].identificador_gen}">${data[i].descripcion}</option>`


          }
          //incrustamos el codigo html en la tabla
          document.getElementById('c_caja_id').innerHTML=contenido;
 */

 