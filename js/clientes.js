$(document).ready(function(){ //FUNCION PRINCIPAL DE JQUERY PARA MONITORIAR LA WEB


    $( "#btnCgClientes" ).click(function() { 

        var c_id = $("#c_id").val();
        var c_nombre = $("#c_nombre").val().toUpperCase();
        var c_appaterno = $("#c_appaterno").val().toUpperCase();
        var c_apmaterno = $("#c_apmaterno").val().toUpperCase();
        var c_fecha = $("#c_fecha").val();
        var c_sexo = $("#c_sexo").val(); 
        var c_ife = $("#c_ife").val();
        var c_cp = $("#c_cp").val();
        var c_colonia = $("#c_colonia").val().toUpperCase(); 
        var c_calle = $("#c_calle").val().toUpperCase();
        var c_referencia = $("#c_referencia").val().toUpperCase();
        var c_cartera = $("#c_cartera").val();
        var c_tel = $("#c_tel").val();


        if (c_nombre==""){$("#c_nombre").addClass('is-invalid')}
        if (c_appaterno==""){$("#c_appaterno").addClass('is-invalid')}
        if (c_colonia==""){$("#c_colonia").addClass('is-invalid')}
        if (c_referencia==""){$("#c_referencia").addClass('is-invalid')}
        if (c_cartera==""){$("#c_cartera").addClass('is-invalid')}

        if(c_nombre=="" || c_appaterno=="" || c_colonia=="" ||  c_referencia=="" || c_cartera==0){
            $("#alertClientes").html(
                                '<div class="alert alert-danger" role="alert">'+
                                '<button type="button" onClick="limpiarCampos()" class="close" data-dismiss="alert">&times;</button>'+
                                'Los campos no pueden estar vacios.'+
                                '</div>');
            return;
        }


          //funcion ajax para comunicarnos con php (url,arreglo con datos,funcion de respuest, funcion loading)
          onRequestCte({ opcion : 1,c_id:c_id,c_nombre:c_nombre,c_appaterno:c_appaterno,c_apmaterno:c_apmaterno,c_fecha:c_fecha,c_sexo:c_sexo,c_ife:c_ife,c_cp:c_cp,c_colonia:c_colonia,c_calle:c_calle,c_referencia:c_referencia,c_cartera:c_cartera,c_tel:c_tel},resRegClientes);
          //onRequestCte({ opcion : 1 ,c_id:c_id,c_nombre:c_nombre,c_appaterno:c_appaterno,c_apmaterno:c_apmaterno,c_fecha:c_fecha,c_sexo:c_sexo,c_ife:c_ife,c_cp:c_cp,c_colonia:c_colonia,c_calle:c_calle,c_referencia:c_referencia,c_tel:c_tel,c_cartera:c_cartera},resRegClientes);
 
    });

    $( "#c_cartera" ).change(function() { 
      var c_cartera = $( "#c_cartera" ).val(); 

      onRequestCte({ opcion : 2 ,c_cartera:c_cartera},resClientesCartera);
  });

	 
	 
});
///RESPUESTAS
var resRegClientes = function(data){
    if (!data && data == null) 
            return;  

          console.log(data);

     if(data[0].respuesta=='2'){
         $("#alertClientes").html(
          '<div class="alert alert-danger" role="alert">'+
          '<button type="button" onClick="limpiarCampos(1)" class="close" data-dismiss="alert">&times;</button>'+
          'Ocurrio un error al intentar guardar los datos, favor de intentarlo nueva mente si el problema persiste llamar al administrador.'+
          '</div>');
     }

      if(data[0].respuesta=='3'){
         $("#alertClientes").html(
          '<div class="alert alert-success" role="alert">'+
          '<button type="button" onClick="limpiarCampos(2)" class="close" data-dismiss="alert">&times;</button>'+
          'El cliente fue registrado correctamente.'+
          '</div>');
         limpiarCampos(2)
     }

     if(data[0].respuesta=='1'){
         $("#alertClientes").html(
          '<div class="alert alert-danger" role="alert">'+
          '<button type="button" onClick="limpiarCampos(1)" class="close" data-dismiss="alert">&times;</button>'+
          'Ocurrio un error al intentar guardar los datos ya que le cliente esta registrado.'+
          '</div>');
     }


 

}

var resClientesCartera = function(data){
    if (!data && data == null) 
            return;  
 
          var contenido='';

          for(var i=0; i<data.length; i++){

              contenido+='<tr><td>'+data[i].cliente_id+'</td><td>'+data[i].nombre+'</td><td>'+data[i].desembolso+'</td>'+
              '<td><button onclick="buscarCliente('+data[i].cliente_id+')" class="mr-1 ml-1" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit "></i></button>'+
              '<span data-toggle="modal" data-target="#modalDesembolso"><button onclick="desembolsoCliente('+data[i].cliente_id+')"   class="mr-1 ml-1" data-toggle="tooltip,modal" data-placement="top" title="Desembolsar"><i class="fas fa-hand-holding-usd "></i></button></span>'+
              '<button  class="mr-1 ml-1" data-toggle="tooltip" data-placement="top" title="Historial"><i class="fas fa-align-justify "></i></button>'+
              '</td></tr>';

          }
 
          $("#tb_clientes").html(contenido);

        
           $('[data-toggle="tooltip"]').tooltip()
 

}

///FUNCIONES 

function limpiarCampos(flag){
 
       $("#c_id").val('0');
       $("#c_nombre").val('');
       $("#c_appaterno").val('');
       $("#c_apmaterno").val('');
       $("#c_fecha").val('');
       $("#c_ife").val('');
       $("#c_cp").val('');
       $("#c_colonia").val(''); 
       $("#c_calle").val('');
       $("#c_referencia").val('');
       $("#c_cartera").val();
       $("#c_tel").val();

       $("#c_nombre").removeClass('is-invalid');
       $("#c_appaterno").removeClass('is-invalid');
       $("#c_colonia").removeClass('is-invalid');
       $("#c_referencia").removeClass('is-invalid');
       $("#c_cartera").removeClass('is-invalid');
      
      if(flag==1){ $("#alertClientes").html('');}
 }
// Buscar clientes por id
function buscarCliente(c_id){
  console.log(c_id)
}
//Buscar clientes por nombre
function buscarClientes(){
  var cliente = $("#b_cliente").val();
  var c_cartera = $("#c_cartera").val();

  if(cliente.length>3){
      onRequestCte({ opcion : 3 ,nombre:cliente,c_cartera:c_cartera},resClientesCartera);
  }else{

     onRequestCte({ opcion : 2 ,c_cartera:c_cartera},resClientesCartera);
  }

}

function buscarClientes(id){
  $("#b_cliente").val();
  $("#c_cartera").val();

 console.log(id+'-'+cliente)

}

function desembolsoCliente(){

}