$(document).ready(function(){

 

});

function soloNumeros(e){
	let key = window.Event ? e.which : e.keyCode
	return ((key>=48 && key <=57) || (key==8) )
}