
///funciones 

//funcion para inicializar controles
function cargarControles(){
  onRequestMant({ opcion :10,usuario_id:USUARIO_ID,rol_id:ROL_ID },resRegCarterasPorUsuario);
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

  let b_cliente_id =  document.getElementById('b_cliente').innerHTML.split(' ',1); 
  let monto =  document.getElementById('b_monto').value;
   /*let id = $("#c_id_desembolso").val().split(' ', 1) 
       console.log(id[0])*/ 

   if(monto<=0){
      mensajeAlerta('¡El monto ingresado no es correcto.!','error')
   }else{
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
          $("#c_cartera").html(contenido);  

}
var arregloClientes =[]
//respuesta con los clientes de cada cartera
var resClientesCartera = function(data){
    if (!data && data == null) 
            return   
    
    console.log(data)
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

          console.log(data)

          document.getElementById('desembolsoActual').innerHTML=`$ ${data[0].capital}`;
          document.getElementById('pagoNormal').innerHTML=`$ ${data[0].pagoNormal}`;
          document.getElementById('saldoVencido').innerHTML=`$ ${data[0].saldoVencido}`;
          document.getElementById('saldoExigible').innerHTML=`$ ${data[0].saldoExigible}`;
          document.getElementById('saldoTotal').innerHTML=`$ ${data[0].saldoTotal}`;

}

