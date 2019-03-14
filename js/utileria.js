$(document).ready(function(){
 	$('[data-toggle="tooltip"]').tooltip()
 

});
//funcion para permitir solo numeros
function soloNumeros(e){
	let key = window.Event ? e.which : e.keyCode
	return ((key>=48 && key <=57) || (key==8) )
}
//funcion para permitir solo letras
function soloLetras(e){
	let key = window.Event ? e.which : e.keyCode
	return ((key>=65 && key <=90) || (key==32) || (key==8) || (key>=97 && key <=122) || (key>=192 && key<=250) )
}
//funcion para leer cookies
function leerCookie(name) {

  var nameEQ = name + "="; 
  var ca = document.cookie.split(';');

  for(var i=0;i < ca.length;i++) {

    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1,c.length);
    if (c.indexOf(nameEQ) == 0) {
      return decodeURIComponent( c.substring(nameEQ.length,c.length) );
    }

  }

  return null;

}