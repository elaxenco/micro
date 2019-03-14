$(document).ready(function(){ //FUNCION PRINCIPAL DE JQUERY PARA MONITORIAR LA WEB
    //declaraciones principales
     
    //agregamos clic al boton con el id 
    $( "#btnCgClientes" ).click(function() { 

        // volvemos mayusculas  y asignamos a variables 
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

        // verificamos que algunos campos no este vacios
        if (c_nombre==""){$("#c_nombre").addClass('is-invalid')}
        if (c_appaterno==""){$("#c_appaterno").addClass('is-invalid')}
        if (c_colonia==""){$("#c_colonia").addClass('is-invalid')}
        if (c_referencia==""){$("#c_referencia").addClass('is-invalid')}
        if (c_cartera==""){$("#c_cartera").addClass('is-invalid')}

        //lanzamos una advertencia  al usuario
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

    // agregamos el evento cambio al id espesificado
    $( "#c_cartera" ).change(function() { 
      // tomamos el valor actual del elemento cartera
      let c_cartera = $( "#c_cartera" ).val(); 
      // corremos la funcion para buscar los clientes de la cartera selecciona
      onRequestCte({ opcion : 2 ,c_cartera:c_cartera},resClientesCartera);
    });

     // agregamos el evento cambio al id espesificado
    $( "#tipo_prestamo_id" ).change(function() {  
      // corremos la funcion para buscar los importes con los que cuenta el tipo seleccionado
        let tipo_id = $( "#tipo_prestamo_id" ).val(); 
        // corremos la funcion para buscar los importes 

        if(tipo_id==3){
          document.getElementById('divMontoNormal').style.display="none";
          document.getElementById('divMontoDiez').style.display="block";
          document.getElementById('importeDiez').value="";
          document.getElementById('pagoSemanal').value="";
        }else{
          document.getElementById('divMontoNormal').style.display="block";
          document.getElementById('divMontoDiez').style.display="none";
          document.getElementById('importeDiez').value="";
          document.getElementById('pagoSemanal').value="";
          onRequestBanco({ opcion : 1 ,tipo_id:tipo_id},resBuscarImportePorTipoId);
        }
        
    }); 

    // agregamos el evento cambio al id espesificado
    $( "#importe_id" ).change(function() {  
      // corremos la funcion para buscar los importes con los que cuenta el tipo seleccionado
        let importe_id = $( "#importe_id" ).val(); 
        // corremos la funcion para buscar los importes

        if(importes[importe_id][2]>0) 
          $("#pagoSemanal").val(`${importes[importe_id][2]} semanas de $${importes[importe_id][4]}`)
        else
          $("#pagoSemanal").val(`${importes[importe_id][3]} quincenas de $${importes[importe_id][4]}`)

    });

     //guardar desembolso
    $( "#btnGuardarDesembolso" ).click(function() { 
        //mostramos una advertencia para el operador
          swal({
              title:"¿Seguro de realizar el movimiento?",
              text: "Una vez guardado tendra que contactar aun administrador para cancelar.",
              icon: "warning",
              buttons: true,  
            })
            .then((willDelete) => {
              if (willDelete) { 
                //comprovamos la respuesta en caso de aceptar validamos que los campos necesarios esten seleccionados de lo contrario lanzara otro alert
                if($( "#tipo_prestamo_id" ).val()>0 ){
                  //ejecutamos la siguiente funcion
                    guardarDesembolso()
                  }else{
                    swal({
                          title:"¡Los campos seleccionado no son correctos!",
                          text: "Verifique bien los datos",
                          icon: "error",
                          buttons: true,  
                        });
                  }
                
                   
              } else {
                swal({
                          title:"¡Se cancelaron los movimientos", 
                          icon: "error",
                          buttons: true,  
                });
              }
            });
    });
	 
});
///RESPUESTAS

// respuestas  al seleccionar una cartera
var resRegClientes = function(data){
    if (!data && data == null) 
            return;   
 
          //creamos un switch para las posibles respuestas
        switch(data[0].respuesta){
              case '1':
                      $("#alertClientes").html(
                      '<div class="alert alert-danger" role="alert">'+
                      '<button type="button" onClick="limpiarCampos(1)" class="close" data-dismiss="alert">&times;</button>'+
                      'Ocurrio un error al intentar guardar los datos ya que le cliente esta registrado.'+
                      '</div>');
              break

              case '2':
                      $("#alertClientes").html(
                      '<div class="alert alert-danger" role="alert">'+
                      '<button type="button" onClick="limpiarCampos(1)" class="close" data-dismiss="alert">&times;</button>'+
                      'Ocurrio un error al intentar guardar los datos, favor de intentarlo nueva mente si el problema persiste llamar al administrador.'+
                      '</div>');
              break

              case '3':
                      $("#alertClientes").html(
                      '<div class="alert alert-success" role="alert">'+
                      '<button type="button" onClick="limpiarCampos(2)" class="close" data-dismiss="alert">&times;</button>'+
                      'El cliente fue registrado correctamente.'+
                      '</div>');
                     limpiarCampos(2)
              break

              case '4':
                      $("#alertClientes").html(
                      '<div class="alert alert-success" role="alert">'+
                      '<button type="button" onClick="limpiarCampos(2)" class="close" data-dismiss="alert">&times;</button>'+
                      'Los datos se actualizaron correctamente.'+
                      '</div>');
                     limpiarCampos(2)
              break

        } 

    //seleccionamos la cartera actual y actualizamos los clientes   
     onRequestCte({ opcion : 2 ,c_cartera:$( "#c_cartera" ).val()},resClientesCartera);
 

}
//respuesta con los clientes de cada cartera
var resClientesCartera = function(data){
    if (!data && data == null) 
            return   
  
          let contenido='' 

          for(var i=0; i<data.length; i++){
            //generamos  codigo html en el cual creamos parte de la tabla con los datos necesarios 
              contenido += `<tr><td>${data[i].cliente_id}</td><td>${data[i].nombre}</td><td>${data[i].desembolso}</td>
                            <td><button onclick="buscarClientePorId(${data[i].cliente_id})" class="mr-1 ml-1" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit "></i></button>
                            <span data-toggle="modal" data-target="#modalDesembolso"><button onclick="buscarClientePorIdDesembolso(${data[i].cliente_id})"   class="mr-1 ml-1" data-toggle="tooltip" data-placement="top" title="Desembolsar"><i class="fas fa-hand-holding-usd "></i></button></span>
                            <span data-toggle="modal" data-target="#modalHistial"><button  class="mr-1 ml-1" data-toggle="tooltip" data-placement="top" title="Historial"><i class="fas fa-file-alt "></i></button>
                            </td></tr>`

          }
          //incrustamos el codigo html en la tabla
          $("#tb_clientes").html(contenido); 
          // inicializamos algunos valores para que funcionen correctamente
          $('[data-toggle="tooltip"]').tooltip()
 

}
//respuesta de buscar cliente por id en la cual agregamos los campos a cada uno de los input que pertenece
var resBuscarClientePorId = function(data){
    if (!data && data == null) 
            return;  
 
       $("#c_id").val(data[0].cliente_id);
       $("#c_nombre").val(data[0].nombre);
       $("#c_appaterno").val(data[0].appaterno);
       $("#c_apmaterno").val(data[0].apmaterno);
       $("#c_fecha").val(data[0].fecha_nacimiento);
       $("#c_ife").val(data[0].IFE);
       $("#c_cp").val(data[0].cp);
       $("#c_colonia").val(data[0].colonia); 
       $("#c_calle").val(data[0].calle);
       $("#c_referencia").val(data[0].domicilio_ref); 
       $("#c_tel").val(data[0].telefono);
       $("#c_sexo").val(data[0].sexo);
 

}
//respuesta de buscar clientes por id en la cual visualizamos unicamente le nombre y id de cliente y los agregamos al input del modal
var resBuscarClientePorIdDesembolso = function(data){
    if (!data && data == null) 
            return;  
 
       $("#c_id_desembolso").val(`${data[0].cliente_id} - ${data[0].nombre} ${data[0].appaterno} ${data[0].apmaterno}`); 
       $("#tipo_prestamo_id").val(0); 
       $("#pagoSemanal").val("");

       onRequestBanco({ opcion : 1 ,tipo_id:$("#tipo_prestamo_id").val()},resBuscarImportePorTipoId);

       /*let id = $("#c_id_desembolso").val().split(' ', 1) 
       console.log(id[0])*/

}

//decalaramos un arreglo para guardar los importes
var importes = []
//respuesta de buscar importes por id del tipo
var resBuscarImportePorTipoId = function(data){
    if (!data && data == null) 
            return;   

   
     let contenido='<option selected value="0">Monto Solicitado</option>' 

          for(var i=0; i<data.length; i++){
            //generamos  codigo html en el cual creamos parte de la tabla con los datos necesarios 
              contenido += `<option value="${data[i].importe_id}">${data[i].importe}</option>`

             importes[data[i].importe_id] = [ data[i].importe_id,data[i].importe, data[i].semanas, data[i].quincenas,data[i].pago_completo]

          }
          //incrustamos el codigo html en la tabla
          $("#importe_id").html(contenido);  

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
          //incrustamos el codigo html en la tabla
          $("#c_cartera").html(contenido);  

}
///FUNCIONES 

// cargamos controles iniciales
function cargarControlesUsuario(){
  onRequestMant({ opcion :10,usuario_id:USUARIO_ID,rol_id:ROL_ID },resRegCarterasPorUsuario);
}
// funcion para  inicializar los valores de todos los campos
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
function buscarClientePorId(c_id){
  onRequestCte({ opcion : 4 ,cliente_id:c_id},resBuscarClientePorId);
}
//Buscar clientes por nombre
function buscarClientes(){
  var cliente = $("#b_cliente").val();
  var c_cartera = $("#c_cartera").val();
// buscamos clientes despues de que el usuario agrege almenos 3 caracteres
  if(cliente.length>3){
      onRequestCte({ opcion : 3 ,nombre:cliente,c_cartera:c_cartera},resClientesCartera);
  }else{

     onRequestCte({ opcion : 2 ,c_cartera:c_cartera},resClientesCartera);
  }

}
//funcion para buscar cliente por id
function buscarClientePorIdDesembolso(c_id){
     onRequestCte({ opcion : 4 ,cliente_id:c_id},resBuscarClientePorIdDesembolso);
}
//
function guardarDesembolso(){
  //console.log('se guardo el mensaje')
  let cliente_id = document.getElementById('c_id_desembolso').value.split(' ', 1)
  let tipo_id = document.getElementById('tipo_prestamo_id').value;
  let fecha   =fechaActual();

  if(tipo_id==3){
      let importe = document.getElementById('importeDiez').value;
      if(importe>499){
        console.log('CLIENTE : '+cliente_id+' IMPORTE : '+importe+' TIPO : '+tipo_id+' USUARIO : '+USUARIO_ID+' FECHA : '+fecha)
        // onRequestBanco({ opcion : 2  },resBuscarClientePorId);
      }else{
        mensajeAlerta('El monto ingresado no es correcto.','error')
      }
  }else{

  }
  // swal("Su prestamo esta siendo guardado", { icon: "success" })
 }
//
function calcularPagoDiez(valor){ 
  if(valor>=100)
    document.getElementById('pagoSemanal').value=`${Math.round(valor*1.10)} para proxima quincena.`;
}
//