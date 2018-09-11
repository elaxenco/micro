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
			//onRequest({ opcion : 1 ,txtuser:txtUser,txtpass: txtPass},resLogin);
 
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

        if (data['user'][0]>0) { 
 
               Cookies.set("presico_usuario_id", data['user'][0] );
               Cookies.set("presico_capturista_id", data['user'][1] );
               Cookies.set("presico_capturista",data['user'][2]);
               Cookies.set("presico_autorizacion",data['user'][3]);
               Cookies.set("presico_autorizacion_admin",data['user'][4]);
               Cookies.set("presico_autorizacion_especial",data['user'][5]);

               window.location = "/presico/index.php";

            return;
        }
        else{ 
            Materialize.toast('Usuario o Contraseña son Incorrectos.', 4000,'rounded red');
        }
        

}