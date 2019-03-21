
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
     document.getElementById('saldoActual').innerHTML=`$ ${arregloClientes[cliente_id][4]}`;
 
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
  
          let contenido=''  

          for(var i=0; i<data.length; i++){

          	
          	  
              if(data[i].desembolso>0){ 
              	//generamos un arreglo con todos los clientes que traiga la cartera 0-> ID 1->NOMBRE 2->PRESTAMO 3->PAGOS  ACTUAL 4->SALDO
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

