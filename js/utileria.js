$(document).ready(function(){
 	$('[data-toggle="tooltip"]').tooltip()
 

});
//funcion para permitir solo numeros
function soloNumeros(e){
	let key = window.Event ? e.which : e.keyCode
	return ((key>=48 && key <=57) || (key==8)  || (key==46)  )
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

//mesnaje de alerta dinamico 
function mensajeAlerta(mensaje,tipo){
         swal({ 
                  title: mensaje,
                  icon: tipo,
                  buttons: true,  
                })
} 

// fecha actual
function fechaActual(){
    //fecha completa
  let fecha_actual=new Date(); 
    //año
  let  y = fecha_actual.getFullYear();
    //Mes
  let  m = fecha_actual.getMonth() + 1;
    //Día
  let  d = fecha_actual.getDate();
  //si la fecha es menor al dia 10 le agregamos 0
    if(m<10)
       m=`0${m}`
   //si la fecha es menor al dia 10 le agregamos 0
    if(d<10)
        d=`0${d}`
  //fecha generada   
  let fecha =`${y}/${m}/${d}`
  return fecha;
}

function formatoDeNumero(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0) 
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
}