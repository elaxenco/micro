$(document).ready(function () { //FUNCION PRINCIPAL DE JQUERY PARA MONITORIAR LA WEB

  $("#btnGuardarCartera").click(function () {

    var c_cartera = $("#c_cartera").val().toString().toUpperCase();


    if (c_cartera == "") {
      $("#alertCartera").html(
        '<div class="alert alert-danger" role="alert">' +
        '<button type="button"   class="close" data-dismiss="alert">&times;</button>' +
        'Los campos no pueden estar vacios.' +
        '</div>');
      return;
    }


    //funcion ajax para comunicarnos con php (url,arreglo con datos,funcion de respuest, funcion loading)
    onRequestMant({ opcion: 2, c_cartera: c_cartera }, resRegCartera);

  });

});

function cargarCarteras() {
  onRequestMant({ opcion: 9 }, resRegCartera);
}

function editarCartera(id,descripcion) {  
  document.getElementById("cartera_id").value =id;
  document.getElementById("txtCarteraEdit").value =descripcion; 
}

function guardarNuevoNombreCartera(){
  let id = document.getElementById("cartera_id").value;
  let descripcion =document.getElementById("txtCarteraEdit").value; 

  newCartera ={opcion:12,id,descripcion} 
  onRequestMant(newCartera,(resp)=>{
      switch(resp[0].estatus){
        case 0:
              cargarCarteras();
              mensajeAlerta('Los cambios fueron realizados correctamente.','success');
          break;
        case 1:
            mensajeAlerta(resp[0].error,'error');
          break;
      }
  });
   
}
//respuestas de carteras


var resRegCartera = function (data) {
  if (!data && data == null)
    return;

  var d = '';

  for (var i = 0; i < data.length; i++) {

    d += `<tr><td>${data[i].cartera_id}</td><td>${data[i].nombre}</td><td>${data[i].encargado}</td>
    <td><button onclick="editarCartera(${data[i].cartera_id},'${data[i].nombre}')"  data-toggle="modal" data-target="#modalEditarCartera" class="mr-1 ml-1" data-toggle="tooltip" data-placement="right" title="Editar"><i class="fas fa-edit "></i></button> 
    <span data-toggle="modal"  ><button  class="mr-1 ml-1" data-toggle="tooltip" data-placement="right" title="Agregar a Grupo"><i class="fas fa-users "></i></button></span></td></tr>`;

  }
  document.getElementById("tb_carteras").innerHTML=d 
  document.getElementById('c_cartera').value='';



}