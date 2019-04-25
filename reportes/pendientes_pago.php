 

<!DOCTYPE html>
<html lang="en">

<head> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content=""> 
  <link rel="icon" type="image/png" href="../img/icono.png" />  

  <title>Financiera Leal</title>

   <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet"> 
  <!-- Custom styles for this template -->
  <link href="../css/simple-sidebar.css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

   

</head>

<body onload="cargarControlesReportes()">

  <div class="d-flex" id="wrapper">

   <?php   include('../menu/menu.php'); ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
    
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom"> 
          <button id="buttonL"  class="mr-1 ml-1 menu-toggle" data-toggle="tooltip" onclick="this.style.display='none',document.getElementById('buttonR').style.display='block'" data-placement="right" title="Ocultar Menu"><i class="fas fa-angle-double-left"></i></button>
           <button id="buttonR"  class="mr-1 ml-1 menu-toggle" data-toggle="tooltip" onclick="this.style.display='none',document.getElementById('buttonL').style.display='block'" data-placement="right" title="Ver Menu"><i class="fas fa-angle-double-right"></i></button>
        </nav>

      <div class="container-fluid "  > 
            <div class="card mt-5">
                <div class="card-header bg-primary text-black">
                  <h4>Filtros <b>Pendientes de Pagos</b></h4> 
                </div>
                <div class="card-body"> 

                            <div class="form-row col-md-12  col-12 float-left">
                              <div class="col-md-4 col-12 offset-md-4">
                                  <b><label for="p_fecha_inicial">Fecha</label></b>
                                  <input type="date" min="1" class="form-control" id="p_fecha_inicial" placeholder="Id"  > 
                              </div> 
                            </div> 
                            <div class="form-row col-md-12  col-12">
                               <div class="col-md-4 col-12 offset-md-4">
                                  <b><label for="r_cartera">Seleccione su cartera</label></b>
                                  <select class="custom-select" id="r_cartera">
                                    <option selected value="0">Seleccione una cartera</option> 
                                  </select>
                                </div>    
                                     
                            </div>
                             <div class="form-row col-md-12  col-12    mt-5">
                              <div class="col-md-12 col-12 ">
                                   <center>
                                       
                                      <button type="button" onclick="generarReportePendientesPago()"  class="btn btn-primary  btn-lg">Buscar</button> 
                                   </center>
                                   
                              </div>  
                            </div>  
                </div>  
            </div>
            <!--AGREGAMOS EL CONTENIDO-->
            <div class="row">
              <div class="table-responsive">
                <table class="table table-sm  mt-2 table-hover">
                    <thead>
                      <tr>  
                        <th scope="col">Id</th>
                        <th scope="col">Cliente</th> 
                        <th scope="col">Fecha Mora</th>
                        <th scope="col">Pagos Vencidos</th> 
                        <th scope="col">Dias Vencido</th>
                        <th scope="col" class='texto-derecha'>Saldo Vencido</th>
                        <th scope="col" class='texto-derecha'>Saldo Total</th>
                        <th scope="col">Cartera</th>
                      </tr>
                    </thead>
                    <tbody id="tb_rep_vencidos"> 
                    </tbody>
                  </table > 
                </div>
            </div>
      </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
  <script type="text/javascript">
    document.getElementById('m_reportes').classList.remove('bg-light');
    document.getElementById('m_reportes').classList.add('bg-blue-grey'); 
  </script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="../js/js.cookie.js"></script>
  <script type="text/javascript" src="../js/ajax.js"></script>
  <script type="text/javascript" src="../js/utileria.js"></script> 
  <script type="text/javascript" src="../js/main.js"></script>  
  <script type="text/javascript" src="../js/menu.js"></script>   
  <script type="text/javascript" src="../js/reportes.js"></script>  
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/popper.min.js"></script> 
  <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>   
  <script type="text/javascript" src="../js/sweetalert.js"></script>  

   

</body>

</html>
