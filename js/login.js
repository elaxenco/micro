$(document).ready(function(){ //FUNCION PRINCIPAL DE JQUERY PARA MONITORIAR LA WEB

  
    $( "#btnLogin" ).click(function() { 

    	var txtUser = $("#inputUsurio").val().toUpperCase();
    	var txtPass = $("#inputPassword").val();

    	if (txtUser=="" || txtPass=="")
    	{
    		//aler  
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
 
	 
	 
});

var resLogin = function(data){
    if (!data && data == null) 
            return;  

            console.log(data)  

        if (data[0].respuesta>0) { 
 
              /* Cookies.set("micro_id", data[1].usuario_id,.5 );
               Cookies.set("micro_nombre", data[1].nombre ,.5);
               Cookies.set("micro_rol_id",data[1].autorizacion,.5); */
               //creamos las cookies necesarias para el sistema
               document.cookie = `micro_id=${data[1].usuario_id}; max-age=10600; path=/`;
               document.cookie = `micro_nombre=${data[1].nombre }; max-age=10600; path=/`;
               document.cookie = `micro_rol_id=${data[1].rol_id}; max-age=10600; path=/`; 

               window.location = "/micro/index.php";

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

//funciones

function ingresarSistema(e){


    tecla = (document.all) ? e.keyCode : e.which;

    if (tecla==13){

        var txtUser = $("#inputUsurio").val().toUpperCase();
        var txtPass = $("#inputPassword").val();

        if (txtUser=="" || txtPass=="")
        {
            //aler  
            $("#alertLogin").html(
                                '<div class="alert alert-danger" role="alert">'+
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                'Los campos no pueden estar vacios.'+
                                '</div>');
            return;
        }

            //funcion ajax para comunicarnos con php (url,arreglo con datos,funcion de respuest, funcion loading)
            onRequestMant({ opcion : 1 ,user:txtUser,pass: txtPass},resLogin);
    }
}