
const USUARIO_ID = leerCookie('micro_id')
const NOMBRE 	 = leerCookie('micro_nombre')
const ROL_ID 	 = leerCookie('micro_rol_id')

validarEstatusUsuario() 

$(document).ready(function(){
	$(".menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
 	});
 	
 	$('.dropdown-toggle').dropdown();

});

function cargarMenu(menu){


	switch(menu){
		case 1:
			//$('#divContenido').load('clientes/clientes.html');
			break
		case 2:

			break
	 
	}
}
//eliminamos cookies
function cerrarSesion(){
	console.log(leerCookie('micro_id')+'saasd')
			   document.cookie = `micro_id=; max-age=10600; path=/`;
               document.cookie = `micro_nombre=; max-age=10600; path=/`;
               document.cookie = `micro_rol_id=; max-age=10600; path=/`; 
               validarEstatusUsuario()
}
// validamos que la sesion este iniciada sino lo direccionamos al login
function validarEstatusUsuario(){
	if(leerCookie('micro_id')==null || leerCookie('micro_id')==''){
		window.location = "/micro/login.html";
	}
}