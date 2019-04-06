$(document).ready(function(){ //FUNCION PRINCIPAL DE JQUERY PARA MONITORIAR LA WEB
 
	  $( "#btnGuardarCartera" ).click(function() { 

        var c_cartera = $("#c_cartera").val().toString().toUpperCase(); 
      

        if(c_cartera=="" ){
            $("#alertCartera").html(
                                '<div class="alert alert-danger" role="alert">'+
                                '<button type="button"   class="close" data-dismiss="alert">&times;</button>'+
                                'Los campos no pueden estar vacios.'+
                                '</div>');
            return;
        }


          //funcion ajax para comunicarnos con php (url,arreglo con datos,funcion de respuest, funcion loading)
           onRequestMant({ opcion :2 ,c_cartera:c_cartera},resRegCartera);
 
    });
	 
});

function cargarCarteras(){
  onRequestMant({ opcion :9 },resRegCartera);
}
//respuestas de carteras

   
 var resRegCartera = function(data){
    if (!data && data == null) 
            return;  
  
      var d = '';

     for (var i = 0; i < data.length; i++) {
		     d+= '<tr>'+
		     '<td>'+data[i].cartera_id+'</td>'+
		     '<td>'+data[i].nombre+'</td>'+
		     '<td>'+data[i].encargado+'</td>'+ 
		     '</tr> ';

		      
	     } 
	     $("#tb_carteras").html(d);
	     $("#c_cartera").val(''); 
       
        

}