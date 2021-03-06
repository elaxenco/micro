var onRequestMant = function( prParams, callback,load=1) {	  
		$.ajax({
		    // la URL para la petición
		    url :"/micro/php/options/mantenimiento.php", 

		     beforeSend: function () { 

		     	if(load>0)
					$(document.body).css({'cursor' : 'wait'}); 
            },
		 
		    // la información a enviar
		    // (también es posible utilizar una cadena de datos)
		    data : prParams,
		 	
		    // especifica si será una petición POST o GET
		    type : 'POST',
		 
		    // el tipo de información que se espera de respuesta
		    dataType : 'json',
		 
		    // código a ejecutar si la petición es satisfactoria;
		    // la respuesta es pasada como argumento a la función
		    success : function(json) {
		       //console.log('success')
		       if (callback && callback != null)
		       		callback(json);

		       	
		    },
		 
		    // código a ejecutar si la petición falla;
		    // son pasados como argumentos a la función
		    // el objeto de la petición en crudo y código de estatus de la petición
		    error : function(xhr, status) {
		        console.error(status);
		    },
		 
		    // código a ejecutar sin importar si la petición falló o no
		    complete : function(xhr, status) {
 
					   $(document.body).css({'cursor' : 'default'}) 

		        console.log('Petición realizada');
		    }
		});
	}

var onRequestCte = function( prParams, callback,load=1) {	 

		$.ajax({
		    // la URL para la petición
		    url :"/micro/php/options/clientes.php", 

		     beforeSend: function () { 

		     	if(load>0)
					$(document.body).css({'cursor' : 'wait'}); 
            },
		 
		    // la información a enviar
		    // (también es posible utilizar una cadena de datos)
		    data : prParams,
		 	
		    // especifica si será una petición POST o GET
		    type : 'POST',
		 
		    // el tipo de información que se espera de respuesta
		    dataType : 'json',
		 
		    // código a ejecutar si la petición es satisfactoria;
		    // la respuesta es pasada como argumento a la función
		    success : function(json) { 
		       if (callback && callback != null)
		       		callback(json); 
		       	
		    },
		 
		    // código a ejecutar si la petición falla;
		    // son pasados como argumentos a la función
		    // el objeto de la petición en crudo y código de estatus de la petición
		    error : function(xhr, status) {
		        console.log('Disculpe, existió un problema');
		    },
		 
		    // código a ejecutar sin importar si la petición falló o no
		    complete : function(xhr, status) {
 
					   $(document.body).css({'cursor' : 'default'}) 

		        console.log('Petición realizada');
		    }
		});
	}

	var onRequestBanco = function( prParams, callback,load=1) {	 
 

		$.ajax({
		    // la URL para la petición
		    url :"/micro/php/options/bancos.php", 

		     beforeSend: function () { 

		     	if(load>0)
					$(document.body).css({'cursor' : 'wait'}); 
            },
		 
		    // la información a enviar
		    // (también es posible utilizar una cadena de datos)
		    data : prParams,
		 	
		    // especifica si será una petición POST o GET
		    type : 'POST',
		 
		    // el tipo de información que se espera de respuesta
		    dataType : 'json',
		 
		    // código a ejecutar si la petición es satisfactoria;
		    // la respuesta es pasada como argumento a la función
		    success : function(json) {
		      // console.log('success')
		       if (callback && callback != null)
		       		callback(json);

		       	
		    },
		 
		    // código a ejecutar si la petición falla;
		    // son pasados como argumentos a la función
		    // el objeto de la petición en crudo y código de estatus de la petición
		    error : function(xhr, status) {
		        console.log('Disculpe, existió un problema');
		    },
		 
		    // código a ejecutar sin importar si la petición falló o no
		    complete : function(xhr, status) {
 
					   $(document.body).css({'cursor' : 'default'}) 

		        console.log('Petición realizada');
		    }
		});
	}

var onRequestReportes = function( prParams, callback,load=1) {	
  
		$.ajax({
		    // la URL para la petición
		    url :"/micro/php/options/reportes.php", 

		     beforeSend: function () { 

		     	if(load>0)
					$(document.body).css({'cursor' : 'wait'}); 
            },
		 
		    // la información a enviar
		    // (también es posible utilizar una cadena de datos)
		    data : prParams,
		 	
		    // especifica si será una petición POST o GET
		    type : 'POST',
		 
		    // el tipo de información que se espera de respuesta
		    dataType : 'json',
		 
		    // código a ejecutar si la petición es satisfactoria;
		    // la respuesta es pasada como argumento a la función
		    success : function(json) {
		      // console.log('success')
		       if (callback && callback != null)
		       		callback(json);

		       	
		    },
		 
		    // código a ejecutar si la petición falla;
		    // son pasados como argumentos a la función
		    // el objeto de la petición en crudo y código de estatus de la petición
		    error : function(xhr, status) {
		        console.log('Disculpe, existió un problema');
		    },
		 
		    // código a ejecutar sin importar si la petición falló o no
		    complete : function(xhr, status) {
 
					   $(document.body).css({'cursor' : 'default'}) 

		        console.log('Petición realizada');
		    }
		});
	}