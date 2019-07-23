 function onRequestLogin( prParams,callback ) { 

    fetch('http://localhost/micro/php/options/mantenimiento.php',{
        method:'POST',
        body:prParams
    })
        .then(res=>res.json())
        .then(data=>{
            callback(data)
        })
   
}

var formLogin = document.getElementById("formLogin"); 

formLogin.addEventListener('submit',function(e){
    e.preventDefault();   

    const datos = new FormData(formLogin); 
    datos.append("opcion", 1);

    onRequestLogin(datos,(data)=>{

        if (data[0].respuesta>0) { 
 
           document.cookie = `micro_id=${data[1].usuario_id}; max-age=10600; path=/`;
           document.cookie = `micro_nombre=${data[1].nombre }; max-age=10600; path=/`;
           document.cookie = `micro_rol_id=${data[1].rol_id}; max-age=10600; path=/`; 

           window.location = "/micro/index.php"; 
            return; 
        }
        else{ 
            document.getElementById('alertLogin').innerHTML = `<div class="alert alert-danger" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert">&times;</button>'
                                                                Usuario o contraseña invalidos.
                                                                </div>`; 
        }
    });
})