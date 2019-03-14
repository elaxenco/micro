$(document).ready(function(){ //FUNCION PRINCIPAL DE JQUERY PARA MONITORIAR LA WEB

  
	 
});



//FUNCIONES
//inicializamos la informacion principal
function cargarControles(){
        cargarCarteras()
        cargarUsuarios()
}
//buscamos las carteras existentes
function cargarCarteras(){
    onRequestMant({ opcion : 3},respCargarCarteras);
}
//cargamos los usuarios existentes
function cargarUsuarios(){
    onRequestMant({ opcion : 7},respCargarUsuarios);
}
//obtenemos  el permiso que se desea guardar
function agregarCartera(v,cartera_id){
        //console.log(`${v} - ${cartera_id} `)
        //validamos que la casilla este marcada
        if(v)
            onRequestMant({ opcion : 5,cartera_id:cartera_id},respGenerica);
        else
            return
}
//vemos si el usuarios es admin para agregar permisos en caso de ser admin no tendra ninguna restriccion
function verPermisos(rol_id){

    if(rol_id==1)
        document.getElementById("divAccesosUsuarios").style.display='none'
    else
        document.getElementById("divAccesosUsuarios").style.display='block'
}
//limpiar campos
function limpiartCampos(){
    //console.log('limpiar')
    let formulario = document.getElementsByTagName('input') 
    let select =document.getElementById('usuario_rol') 
    let accesos =document.getElementById("divAccesosUsuarios")
    for (var i=0; i<formulario.length; i++) {
          formulario[i].value = ''; // inicializamos
          formulario[i].classList.remove("is-invalid");
    }
    select.value=0
    accesos.style.display='none' 
    onRequestMant({ opcion : 6},respGenerica);
    buscarCarteras()

}
//guardamos usuarios pero primero verificamos que los campos esten llenos correctamente
function guardarUsuario(){

        if(validarDatos()){
            let usuario_id  = document.getElementById("usuario_id").value;
            let usuario_nombre  = document.getElementById("usuario_nombre").value.toUpperCase();
            let usuario_app     = document.getElementById("usuario_app").value.toUpperCase();
            let usuario_apm     = document.getElementById("usuario_apm").value.toUpperCase();
            let usuario_rol     = document.getElementById("usuario_rol").value;
            let nombre_usuario  = document.getElementById("nombre_usuario").value.toUpperCase();
            let usuario_pwd     = document.getElementById("usuario_pwd").value;  

            onRequestMant({ opcion : 4,usuario_id:usuario_id,usuario_nombre:usuario_nombre,usuario_app:usuario_app,usuario_apm:usuario_apm,usuario_rol:usuario_rol,nombre_usuario:nombre_usuario,usuario_pwd:usuario_pwd},respGuardarUsuario);
        }    
        else
            return

}
//validamos que los campos esten correctos
function validarDatos(){
    let usuario_nombre  = document.getElementById("usuario_nombre");
    let usuario_app     = document.getElementById("usuario_app");
    let usuario_rol     = document.getElementById("usuario_rol");
    let nombre_usuario  = document.getElementById("nombre_usuario");
    let usuario_pwd     = document.getElementById("usuario_pwd");
    let usuario_pwdv    = document.getElementById("usuario_pwdv"); 

        if( usuario_nombre.value.length<3){
            usuario_nombre.classList.add("is-invalid");
            return  mensajeAlerta('El nombre ingresado no es valido.','error')
        }

        if(usuario_app.value.length<4){
            usuario_app.classList.add("is-invalid");
            return  mensajeAlerta('El apellido ingresado no es correcto.','error')
        }

        if(usuario_rol.value == 0){
            usuario_rol.classList.add("is-invalid");
            return  mensajeAlerta('Es necesario espesificar un rol de usuario.')
        }

        if(nombre_usuario.value.length<4){
            nombre_usuario.classList.add("is-invalid");
            return  mensajeAlerta('El usuario ingresado no es correcto.','error')
        }

        if(usuario_pwd.value.length<8){
            usuario_pwd.classList.add("is-invalid");
            return  mensajeAlerta('Es necesario ingresar una contraseña mayor o igual a 8 caracteres.','error')
        }

        if(usuario_pwd.value != usuario_pwdv.value){
            usuario_pwd.classList.add("is-invalid");
            usuario_pwdv.classList.add("is-invalid");
            return  mensajeAlerta('Las contraseñas ingresadas no coinciden.','error')
        } 

        return true;
}
//mesnaje de alerta dinamico 
function mensajeAlerta(mensaje,tipo){
         swal({ 
                  text: mensaje,
                  icon: tipo,
                  buttons: true,  
                })
} 

// editar usuario
function editarUsuario(usuario_id){
    onRequestMant({ opcion : 8,usuario_id:usuario_id},respEditarUsuario);
}
//RESPUESTAS


var respCargarCarteras = function(data){
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
//respuesta de agregar o actualizar un usuairo
var respGuardarUsuario = function(data){
    switch(data[0].respuesta){
            case '1':
                    mensajeAlerta('Ocurrio un erro al intentar guardar el usuario.','error')
                break
            case '2':
                    mensajeAlerta('El usuario se guardo correctamente.','success')
                    limpiartCampos()
                    cargarCarteras()
                break
            case '3':
                    mensajeAlerta('El usuario fue actualizado correctamente.','success')
                    limpiartCampos()
                    cargarCarteras()
                break
            case '4':
                    mensajeAlerta('No se a seleccionado ninguna cartera actualmente.','error')
                break
    }
}

//regresamos de guardar el arreglo temporal
var respGenerica = function(data){
    return;
}

//respuesta donde llenamos la tabla con los usuarios
var respCargarUsuarios = function(data){
    if (!data && data == null) 
            return;   
    
    let contenido='' 

      for(var i=0; i<data.length; i++){
        //generamos  codigo html en el cual creamos parte de la tabla con los datos necesarios 
          contenido += `<tr><td>${data[i].nombre}</td><td class="text-center">${data[i].estatus}</td><td>
            <button onclick="editarUsuario(${data[i].usuario_id})" class="mr-1 ml-1" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fas fa-edit "></i></button>
            <button onclick="deshabilitarUsuario(${data[i].usuario_id})" class="mr-1 ml-1" data-toggle="tooltip" data-placement="right" title="Deshabilitar"><i class="fas fa-trash-alt "></i></button>
           </td></tr>`
      }
      //incrustamos el codigo html en la tabla
      $("#tbUsuarios").html(contenido);  
      $('[data-toggle="tooltip"]').tooltip();

}

//respuesta editar usuario
var respEditarUsuario = function(data){
    if (!data && data == null) 
            return;   
    
    document.getElementById("usuario_id").value=data[0].usuario_id;
    document.getElementById("usuario_nombre").value=data[0].nombre;
    document.getElementById("usuario_app").value=data[0].appaterno;
    document.getElementById("usuario_apm").value=data[0].apmaterno;
    document.getElementById("usuario_rol").value=data[0].rol_id;
    document.getElementById("nombre_usuario").value=data[0].usuario; 
    document.getElementById("usuario_pwd").value=data[0].usuario_pwd; 
    document.getElementById("usuario_pwdv").value=data[0].usuario_pwdv; 

}