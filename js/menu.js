
const USUARIO_ID = leerCookie('micro_id')
const NOMBRE 	 = leerCookie('micro_nombre')
const ROL_ID 	 = leerCookie('micro_rol_id')

validarEstatusUsuario();  


$(document).ready(function(){
	$(".menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
 	});
 	
 	$('.dropdown-toggle').dropdown(); 
 
 		onRequestMant({ opcion :11},resMenuPorRoles); 
});

 
//eliminamos cookies
function cerrarSesion(){ 
			   document.cookie = `micro_id=; max-age=10600; path=/`;
               document.cookie = `micro_nombre=; max-age=10600; path=/`;
               document.cookie = `micro_rol_id=; max-age=10600; path=/`; 
               validarEstatusUsuario()
}
// validamos que la sesion este iniciada sino lo direccionamos al login
function validarEstatusUsuario(){
	if(leerCookie('micro_id')==null || leerCookie('micro_id')==''){
		window.location = "/login.html";
	} 
	

}
 
 /////////////////////////////////////////////////////////////////////////////// respuestas pagos//////////////////////////////
//respuesta de carteras por usuario
var resMenuPorRoles = function(data){
  	if (!data && data == null) 
  			return
 
  	let i =0 ;

  	while(data[i]){ 
  		document.getElementById(`${data[i].m_html_id}`).classList.remove('menudisplay'); 
  		i++
  	}
   

      

}
