$(document).ready(function(){ //FUNCION PRINCIPAL DE JQUERY PARA MONITORIAR LA WEB

  
	 
});



//FUNCIONES

function buscarCarteras(){
    onRequestMant({ opcion : 3},respBuscarCarteras);
}

function agregarCartera(v,cartera_id){
    console.log(`${v} - ${cartera_id} `)
}

//RESPUESTAS

var respBuscarCarteras = function(data){
    if (!data && data == null) 
            return;  

    let contenido='' 

      for(var i=0; i<data.length; i++){
        //generamos  codigo html en el cual creamos parte de la tabla con los datos necesarios 
          contenido += `<tr><td>${data[i].cartera}</td><td class="text-center"><div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" onclick="agregarCartera(this.checked,${data[i].cartera_id})"></div></td> </tr>`

         

      }
      //incrustamos el codigo html en la tabla
      $("#tbCarterasAcceso").html(contenido);  

}