 <?php 
  require_once("../php/utilidades/conexion.php"); 
  $Conectar = new Conectar();  


?>
<!DOCTYPE html>
<html lang="en">

<head>
   
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="http://localhost/micro/img/icono.png" />
  <title>Financiera Leal</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
   
  <!-- Custom styles for this template -->
  <link href="../css/simple-sidebar.css" rel="stylesheet">

   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
 
</head>

<body onload="cargarControlesUsuario()">

  <div class="d-flex" id="wrapper">

   <?php   include('../menu/menu.php'); ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">

       <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom"> 
          <button id="buttonL"  class="mr-1 ml-1 menu-toggle" data-toggle="tooltip" onclick="this.style.display='none',document.getElementById('buttonR').style.display='block'" data-placement="right" title="Ocultar Menu"><i class="fas fa-angle-double-left"></i></button>
           <button id="buttonR"  class="mr-1 ml-1 menu-toggle" data-toggle="tooltip" onclick="this.style.display='none',document.getElementById('buttonL').style.display='block'" data-placement="right" title="Ver Menu"><i class="fas fa-angle-double-right"></i></button>
        </nav>

      <div class="container-fluid"  >
        <div class="container mt-5 mb-2"> 
          <div class="text-center"><h2> Registro de Clientes</h2></div> 
          <div class="form-row">
             <div class="col-md-4 col-12">
              <b><label for="c_cartera">Seleccione su cartera</label></b>
              <select class="custom-select " id="c_cartera">
                <option selected value="0">Seleccione una cartera</option> 
              </select> 
            </div>  
            
            
             
          </div>

          <div id="accordion">
              <div class="card">
              

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-2 col-3">
                                <label for="c_id">Id</label>
                                <input type="number" min="1" class="form-control" id="c_id" placeholder="Id" value="0"   readonly=""> 
                            </div>
                            <div class="col-md-10 col-9 ">
                                <label for="c_nombre ">Nombre</label>
                                <input type="text" class="form-control" id="c_nombre" placeholder="Ingrese su nombre" onkeyup="buscarClientesReg();" onkeypress="return soloLetras(event)"  required> 
                              </div> 
                              <div class="col-md-4 col-12">
                                <label for="c_appaterno">Apellido Paterno</label>
                                <input type="text" class="form-control" id="c_appaterno" placeholder="Ingrese su apellido paterno" onkeyup="buscarClientesReg();" onkeypress="return soloLetras(event)" required>
                                
                              </div> 
                              <div class="col-md-4 col-12 ">
                                <label for="c_apmaterno">Apellido Materno</label>
                                <input type="text" class="form-control" id="c_apmaterno" placeholder="Ingrese su apellido materno" onkeyup="buscarClientesReg();" onkeypress="return soloLetras(event)" required>
                         
                              </div> 
                              <div class="col-md-4 col-12 ">
                                <label for="c_fecha">Fecha Nacimiento</label>
                                <input type="date" class="form-control" id="c_fecha"   required>
                         
                              </div> 
                               <div class="col-md-3 col-12 ">
                                 <label for="c_sexo">Sexo</label>
                                <select class="custom-select" id="c_sexo">
                                <option selected>Seleccione una opcion</option> 
                                  <option value="H">HOMBRE</option>
                                  <option value="M">MUJER</option> 
                                </select>
                              </div> 
                              <div class="col-md-4 col-12 ">
                                <label for="c_ife">IFE/INE</label>
                                <input type="text" class="form-control" id="c_ife" placeholder="IFE/INE"  required>
                         
                              </div> 
                              <div class="col-md-1 col-3 ">
                                <label for="c_cp">CP</label>
                                <input type="text" class="form-control" id="c_cp" placeholder="Codigo Postal"  required>  
                              </div> 
                              <div class="col-md-4 col-9 ">
                                <label for="c_colonia">Colonia</label>
                                <input type="text" class="form-control" id="c_colonia" placeholder="Colonia"  required> 
                              </div> 
                              <div class="col-md-4 col-12 ">
                                <label for="c_calle">Calle</label>
                                <input type="text" class="form-control" id="c_calle" placeholder="Calle"  required>  
                              </div>
                              <div class="col-md-4 col-12 ">
                                <label for="c_referencia">Referencia</label>
                                <input type="text" class="form-control" id="c_referencia" placeholder="Referencia"  required>  
                              </div>  
                              <div class="col-md-4 col-12 ">
                                <label for="c_tel">Telefono</label>
                                <input type="text" class="form-control" id="c_tel" placeholder="Referencia"  required>  
                              </div>  
                             
                             
                              <div id="alertClientes" class="col-12 mt-3"></div>

                              <div class="col-12  mt-3 ">

                                <button type="button" class="btn btn-success col-12 col-lg-2   float-right mr-2 mt-2 mb-2" id="btnCgClientes">Guardar</button>
                                <button type="button" class="btn btn-danger  col-12 col-lg-2   float-right mr-2 mt-2 mb-2" onclick="limpiarCampos()" id="btnCcClientes">Cancelar</button>
                              </div>
                              
                        </div>
                  </div>
                </div>
              </div>
            </div>


       
 
 
</div>  

      <div class="container ">

        <div class="card-header bg-success text-white "> 
            <div class="row">
              <div class="col-md-2 mt-2">
                <button  type="button" class="btn btn-secondary col-12"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >Ocultar</button>
              </div>
              
              <div class="col-md-4  mt-2">
                Clientes 
              </div>
              <div class="col-md-6 col-12"> 
                <input type="text" class="form-control col-md-12 col-12" id="b_cliente" onkeyup="buscarClientes()" placeholder="Buscar cliente"  required>  
              </div>
            </div> 
          </div>
        <div class="card scroller-monitor-clientes">
          
          <div class="card-body">
              <table class="table   table-sm table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Desembolso</th> 
                      <th scope="col">Acciones</th> 
                    </tr>
                  </thead>
                  <tbody id="tb_clientes">
                    
                    
                  </tbody>
                </table>
            
          </div>
        </div>
      </div>
        
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
<?php   include('../modals/modals.php'); ?>

 

  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="../js/js.cookie.js"></script>
  <script type="text/javascript" src="../js/ajax.js"></script> 
  <script type="text/javascript" src="../js/sweetalert.js"></script>
  <script type="text/javascript" src="../js/utileria.js"></script> 
  <script type="text/javascript" src="../js/menu.js"></script>   
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>  
  <script type="text/javascript" src="../js/clientes.js"></script>   
  <script type="text/javascript" src="../js/popper.min.js"></script> 

  <script type="text/javascript">
    document.getElementById('m_clientes').classList.remove('bg-light');
    document.getElementById('m_clientes').classList.add('bg-blue-grey'); 

  </script>
  

</body>

</html>
