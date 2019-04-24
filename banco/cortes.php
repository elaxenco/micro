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
                  <h2>Modulo de Corte de caja</h2>
              </div>  
              <div class="form-row">
                   <div class="col-md-4 col-12 offset-md-2 ">
                    <b><label for="c_caja_id">Seleccione una caja</label></b>
                    <select class="custom-select" id="c_caja_id" onchange="buscarCortesPorCaja(this.value)" >
                      <option selected value="0">Seleccione una caja</option> 
                    </select>
                  </div>   
                  <div class="col-md-4 col-12">
                      <label for="c_fecha ">Fecha</label>
                      <input type="date" class="form-control" id="c_fecha" placeholder="Ingrese Fecha"    required> 
                  </div>  
                  
              </div>
              <div class="col-12 mt-2  offset-md-8">  
                      <button type="button" class="btn btn-outline-secondary col-md-2 col-12" onclick="verCorteDeCaja()"data-toggle="modal" data-target="#modalCorte" >Ver</button> 
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
                            <th scope="col">Capital</th>
                            <th scope="col">Interes</th>
                            <th scope="col">Seguro</th> 
                            <th scope="col">Salidas</th> 
                            <th scope="col">Desembolsos</th>  
                            <th scope="col">Saldo Fin</th> 
                            <th scope="col">Corte</th> 
                          </tr>
                        </thead>
                        <tbody id="tb_cortes" class="">
                           
                          
                        </tbody>
                      </table> 
                  
                </div>
              </div>
             
          </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

    <!-- Modal -->
     
    <div id="modalCorte" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
 
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tituloModalCorteCaja">Corte de caja</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row ">
                <div class="col-12 col-md-6  ">
                  <center><h5>Entradas</h5></center>
                   <div class="form-group row">
                      <label for="" class="col-sm-4 col-form-label">Saldo inicial $</label>
                      <div class="col-sm-8">
                        <input id="saldoInicial"  readonly="" class="form-control mt-1"   placeholder="0">
                      </div>
                      <label for="" class="col-sm-4 col-form-label">Entradas $</label>
                      <div class="col-sm-8">
                        <input id="entradas"  readonly="" class="form-control mt-1"   placeholder="0">
                      </div>
                      <label for="" class="col-sm-4 col-form-label">Capital $</label>
                      <div class="col-sm-8">
                        <input id="capital"  readonly="" class="form-control mt-1"   placeholder="0">
                      </div>
                      <label for="" class="col-sm-4 col-form-label">Interes $</label>
                      <div class="col-sm-8">
                        <input id="interes"  readonly="" class="form-control mt-1"   placeholder="0">
                      </div>
                      <label for="" class="col-sm-4 col-form-label">Seguro $</label>
                      <div class="col-sm-8">
                        <input id="seguro" readonly="" class="form-control mt-1"   placeholder="0">
                      </div>
                    </div>

                </div>
                <div class="col-12 col-md-6  ">
                  <center><h5>Salidas</h5></center>
                   <div class="form-group row">
                      <label for="" class="col-sm-4 col-form-label">Salidas $</label>
                      <div class="col-sm-8">
                        <input id="salidas" readonly="" class="form-control mt-1"   placeholder="0">
                      </div>
                      <label for="" class="col-sm-4 col-form-label">Prestamos $</label>
                      <div class="col-sm-8">
                        <input id="desembolsos" readonly="" class="form-control mt-1"   placeholder="0">
                      </div>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-6  offset-md-6">
                <div class="form-group row">
                  <label for="" class="col-sm-4 col-form-label">Saldo final $</label>
                  <div class="col-sm-8">
                    <input id="saldoFinal" readonly="" class="form-control mt-1"   placeholder="0">
                  </div> 
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-danger" onclick="eliminarCorteDeCaja()">Cancelar</button>
            <button type="button" class="btn btn-primary" onclick="guardarCorteDecaja()">Guardar</button>
          </div>
        </div>
      </div>
    </div

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

 
