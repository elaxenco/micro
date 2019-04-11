<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Micro Financiera</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet"> 
  <!-- Custom styles for this template -->
  <link href="../css/simple-sidebar.css" rel="stylesheet">



  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body onload="cargarControlesCajas()">

  <div class="d-flex" id="wrapper">

   <?php   include('../menu/menu.php'); ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom"> 
          <button id="buttonL"  class="mr-1 ml-1 menu-toggle" data-toggle="tooltip" onclick="this.style.display='none',document.getElementById('buttonR').style.display='block'" data-placement="right" title="Ocultar Menu"><i class="fas fa-angle-double-left"></i></button>
           <button id="buttonR"  class="mr-1 ml-1 menu-toggle" data-toggle="tooltip" onclick="this.style.display='none',document.getElementById('buttonL').style.display='block'" data-placement="right" title="Ver Menu"><i class="fas fa-angle-double-right"></i></button>
        </nav>

      <div class="container-fluid"  > 
          <div class="container  "> 
              <div class="text-center mt-5">
                  <h2>Modulo de Corte de Caja</h2>
              </div>  
              <div class="form-row">
                   <div class="col-md-4 col-12 offset-md-2 ">
                    <b><label for="c_caja_id">Seleccione una Caja</label></b>
                    <select class="custom-select" id="c_caja_id" onchange="buscarMovimientosPorCaja(this.value)" >
                      <option selected value="0">Seleccione una Caja</option> 
                    </select>
                  </div>   
                  <div class="col-md-4 col-12">
                      <label for="c_fecha ">Fecha</label>
                      <input type="date" class="form-control" id="c_fecha" placeholder="Ingrese Fecha"    required> 
                  </div>  
                  
              </div>
              <div class="col-12 mt-2  offset-md-6"> 
                      <button type="button" class="btn btn-danger col-md-2 col-12 mr-1"  >Cancelar</button>
                      <button type="button" class="btn btn-outline-secondary col-md-2 col-12" onclick="verCorteDeCaja()" >Ver</button> 
              </div> 
              <div class="card scroller-pagos mt-2">
                
                <div class="card-body">
                    <table class="table   table-sm table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha</th> 
                            <th scope="col">Saldo Ini</th>  
                            <th scope="col">Entradas</th>  
                            <th scope="col">Salidas</th> 
                            <th scope="col">Desembolsos</th>  
                            <th scope="col">Saldo Fin</th> 
                            <th scope="col">Corte</th> 
                          </tr>
                        </thead>
                        <tbody id="tb_movimientos">
                           
                          
                        </tbody>
                      </table> 
                  
                </div>
              </div>
             
          </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <script type="text/javascript">
    document.getElementById('m_banco').classList.remove('bg-light');
    document.getElementById('m_banco').classList.add('bg-blue-grey'); 
  </script>

  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="../js/js.cookie.js"></script>
  <script type="text/javascript" src="../js/ajax.js"></script>
  <script type="text/javascript" src="../js/utileria.js"></script> 
  <script type="text/javascript" src="../js/main.js"></script>  
  <script type="text/javascript" src="../js/menu.js"></script>   
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/popper.min.js"></script> 
  <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>   
  <script type="text/javascript" src="../js/sweetalert.js"></script> 
  <script type="text/javascript" src="../js/banco.js"></script>  



   

</body>

</html>

 
