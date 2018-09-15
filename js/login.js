$(document).ready(function(){ //FUNCION PRINCIPAL DE JQUERY PARA MONITORIAR LA WEB

  
    $( "#btnLogin" ).click(function() { 

    	var txtUser = $("#inputUsurio").val();
    	var txtPass = $("#inputPassword").val();

    	if (txtUser=="" || txtPass=="")
    	{
    		//aler tipo toas (MENSAJE,TIEMPO EN PANTALL,CLASES CSS)
    		$("#alertLogin").html(
                                '<div class="alert alert-danger" role="alert">'+
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                'Los campos no pueden estar vacios.'+
                                '</div>');
    		return;
    	}

    		//funcion ajax para comunicarnos con php (url,arreglo con datos,funcion de respuest, funcion loading)
			onRequestMant({ opcion : 1 ,user:txtUser,pass: txtPass},resLogin);
 
	});



    $( "#txtPass" ).keydown(function() { 

        var txtUser = $("#inputUsurio").val();
        var txtPass = $("#inputPassword").val();

        if ( event.which == 13 ) {     
            if (txtUser=="" || txtPass=="")
        {
            $("#alertLogin").html(
                                '<div class="alert alert-danger" role="alert">'+
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                'Los campos no pueden estar vacios.'+
                                '</div>');
            return;
        }

            //funcion ajax para comunicarnos con php (url,arreglo con datos,funcion de respuest, funcion loading)
            onRequest({ opcion : 1 ,txtuser:txtUser,txtpass: txtPass},resLogin);
          } 


    });

	 
	 
	 
});

var resLogin = function(data){
    if (!data && data == null) 
            return;  

            console.log(data)  

        if (data[0].respuesta>0) { 
 
               Cookies.set("micro_id", data[1].usuario_id,.5 );
               Cookies.set("micro_nombre", data[1].nombre ,.5);
               Cookies.set("micro_autorizacion",data[1].autorizacion,.5);
               Cookies.set("micro_autorizacion_admin",data[1].autorizacion_admin,.5);
               Cookies.set("micro_autorizacion_esp",data[1].autorizacion_esp,.5); 

               window.location = "/micro/clientes/clientes.php";

            return;
 
        }
        else{ 
            $("#alertLogin").html(
                                '<div class="alert alert-danger" role="alert">'+
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                'Usuario o contraseña invalidos.'+
                                '</div>');
        }
        

}