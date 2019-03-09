$(document).ready(function(){
	$(".menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
 	});
 	
 	$('.dropdown-toggle').dropdown()

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