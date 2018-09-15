$(document).ready(function(){ //FUNCION PRINCIPAL DE JQUERY PARA MONITORIAR LA WEB

    $( "#btnCgClientes" ).click(function() { 

        var c_id = $("#c_id").val();
        var c_nombre = $("#c_nombre").val();
        var c_appaterno = $("#c_appaterno").val();
        var c_apmaterno = $("#c_apmaterno").val();
        var c_fecha = $("#c_fecha").val();
        var c_sexo = $("#c_sexo").val(); 
        var c_ife = $("#c_ife").val();
        var c_cp = $("#c_cp").val();
        var c_colonia = $("#c_colonia").val(); 
        var c_calle = $("#c_calle").val();
        var c_referencia = $("#c_referencia").val();
        var c_cartera = $("#c_cartera").val();


        if (c_nombre==""){$("#c_nombre").addClass('is-invalid')}
        if (c_appaterno==""){$("#c_appaterno").addClass('is-invalid')}
        if (c_colonia==""){$("#c_colonia").addClass('is-invalid')}
        if (c_referencia==""){$("#c_referencia").addClass('is-invalid')}
        if (c_cartera==""){$("#c_cartera").addClass('is-invalid')}

        if(c_nombre="" || c_appaterno=="" || c_colonia=="" ||  c_referencia=="" || c_cartera==""){
            $("#alertClientes").html(
                                '<div class="alert alert-danger" role="alert">'+
                                '<button type="button" onClick="limpiarCampos()" class="close" data-dismiss="alert">&times;</button>'+
                                'Los campos no pueden estar vacios.'+
                                '</div>');
            return;
        }


          //funcion ajax para comunicarnos con php (url,arreglo con datos,funcion de respuest, funcion loading)
           onRequestCte({ opcion : 1 ,c_id:c_id,c_nombre:c_nombre,c_appaterno:c_appaterno,c_apmaterno:c_apmaterno,c_fecha:c_fecha,c_sexo:c_sexo,c_ife:c_ife,c_cp:c_cp,c_colonia:c_colonia,c_calle:c_calle,c_referencia:c_referencia,c_cartera:c_cartera},resRegClientes);
 
    });

	 
	 
});

var resRegClientes = function(data){
    if (!data && data == null) 
            return;  
 

}

///FUNCIONES 

function limpiarCampos(){
 
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

       $("#c_nombre").removeClass('is-invalid');
       $("#c_appaterno").removeClass('is-invalid');
       $("#c_colonia").removeClass('is-invalid');
       $("#c_referencia").removeClass('is-invalid');
       $("#c_cartera").removeClass('is-invalid');
       $("#alertClientes").html('');
 }
