/// funciones
function cargarControlesReportes(){
	onRequestMant({ opcion :10,usuario_id:USUARIO_ID,rol_id:ROL_ID },resRegCarterasPorUsuario);
}
// BUSCAR DESEMBOLSOS
function generarReporteDesembolsos(){
  let fechaInicial = document.getElementById('fecha_inicial').value;
  let fechaFinal = document.getElementById('fecha_final').value;
  let cartera_id = document.getElementById('r_cartera').value;
  let tipo_id = document.getElementById('r_tipo').value; 

  onRequestReportes({ opcion :1,fecha_inicial:fechaInicial,fecha_final:fechaFinal,cartera_id:cartera_id,tipo_id:tipo_id },resReporteDesembolsos);
}

//respuesta de carteras por usuario
var resRegCarterasPorUsuario = function(data){
    if (!data && data == null) 
            return;   
          console.log(data)

     let contenido='<option selected value="0">Seleccione una cartera</option>' 

          for(var i=0; i<data.length; i++){
            //generamos  codigo html en el cual creamos parte de la tabla con los datos necesarios 
              contenido += `<option value="${data[i].cartera_id}">${data[i].nombre}</option>` 

          }
          //incrustamos el codigo html en la tabla 
          document.getElementById('r_cartera').innerHTML=contenido;

}

//respuesta de desembolsos
var resReporteDesembolsos = function(data){
    if (!data && data == null) 
            return;  

          console.log(data) 
 

         for(var i=0; i<data.length; i++){
            //generamos  codigo html en el cual creamos parte de la tabla con los datos necesarios 
            //arreglo[posision]= [campo1,campo2.etc]     importes[data[i].importe_id] = [ data[i].importe_id,data[i].importe, data[i].semanas, data[i].quincenas,data[i].pago_completo]
            //{make: "Toyota", model: "Celica", price: 35000} 

            rowData.push({id : data[i].cliente_id,cliente : data[i].cliente,cartera :data[i].cartera,desembolso:data[i].desembolso,fecha:data[i].fecha,tipo:data[i].tipo,cartera:data[i].cartera})


          } 

        // let the grid know which columns and what data to use
    var gridOptions = {
      columnDefs: columnDefs,
      rowData: rowData
    };

  // lookup the container we want the Grid to use
  var eGridDiv = document.querySelector('#myGrid');

  // create the grid passing in the div to use together with the columns & data we want to use
  new agGrid.Grid(eGridDiv, gridOptions);

}
//////////////////////////////////////////////////INICIALIAZAMOS TABLAS
// declaramos los campos  de la tabla
var columnDefs = [
  {headerName: "Id", field: "id" , sortable: true, filter: true },
  {headerName: "Cliente", field: "cliente" , sortable: true, filter: true },
  {headerName: "Cartera", field: "cartera" , sortable: true, filter: true },
  {headerName: "Desembolso", field: "desembolso" , sortable: true, filter: true },
  {headerName: "Fecha", field: "fecha", sortable: true, filter: true },
  {headerName: "Tipo", field: "tipo" , sortable: true, filter: true },
  {headerName: "Cartera", field: "cartera" , sortable: true, filter: true }
];

// specify the data
var rowData = [
   
];
  
    
