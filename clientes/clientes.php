 <?php 
  require_once("../php/conexion/conexion.php"); 
  $Conectar = new Conectar();  


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content=""> 

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

 
  </head>

  <body  >  
      <?php   include('../menu/menu.php'); ?>

      <div class="container mt-5"> 
          <div class="text-cente"><h2> Registro de Clientes</h2></div>
          <div class="form-row">
             <div class="col-md-4 col-12 ">
              <label for="c_cartera">Seleccione su cartera</label>
              <select class="custom-select" id="c_cartera">
                <option selected value="0">Seleccione una opcion</option> 
                <?php
                    $sql="SELECT carteras.id,carteras.descripcion,CONCAT(usuarios.nombre,' ',usuarios.appaterno,' ',usuarios.apmaterno) usuario FROM carteras
                                    JOIN usuarios ON usuarios.id=carteras.encargado_id"; 
                          $resultado = mysqli_query($Conectar->con(), $sql);  
                          while ($res = mysqli_fetch_row($resultado)) {
                                 
                                echo "<option value=".$res[0].">".$res[1]."</option>"; 
                              } 
                ?>
              </select>
            </div> 
          </div>
          <div class="form-row">
            <div class="col-md-2 col-2">
              <label for="c_id">Id</label>
              <input type="number" min="1" class="form-control" id="c_id" placeholder="Id" value="0" required> 
            </div>
            <div class="col-md-10 col-10 ">
              <label for="c_nombre ">Nombre</label>
              <input type="text" class="form-control" id="c_nombre" placeholder="Ingrese su nombre"   required>
               
            </div> 
            <div class="col-md-4 col-6 ">
              <label for="c_appaterno">Apellido Paterno</label>
              <input type="text" class="form-control" id="c_appaterno" placeholder="Ingrese su apellido paterno"  required>
              
            </div> 
            <div class="col-md-4 col-6 ">
              <label for="c_apmaterno">Apellido Materno</label>
              <input type="text" class="form-control" id="c_apmaterno" placeholder="Ingrese su apellido materno"  required>
       
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

            <div class="col mt-3 ">
              <button type="button" class="btn btn-success col-12 col-lg-2   float-right mr-2 mt-2 mb-2" id="btnCgClientes">Guardar</button>
              <button type="button" class="btn btn-danger  col-12 col-lg-2   float-right mr-2 mt-2 mb-2" onclick="limpiarCampos()" id="btnCcClientes">Cancelar</button>
            </div>
          </div> 
 
 
      </div>  

      <div class="container ">
        <div class="card scroller-monitor">
          <div class="card-header bg-success text-white">
             
          <div class="row">
            <div class="col-md-6  mt-2">
              Clientes 
            </div>
            <div class="col-md-6 col-12"> 
              <input type="text" class="form-control col-md-12 col-12" id="b_cliente" onkeyup="buscarClientes()" placeholder="Buscar cliente"  required>  
            </div>
          </div>
              
            
          </div>
          <div class="card-body">
              <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Estatus</th> 
                      <th scope="col">Acciones</th> 
                    </tr>
                  </thead>
                  <tbody id="tb_clientes">
                    
                    
                  </tbody>
                </table>
            
          </div>
        </div>
      </div>



    
    
  </body>
   <?php   include('../modals/modals.php'); ?>
  <script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="../js/popper.min.js"></script>  
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/main.js"></script> 
  <script type="text/javascript" src="../js/js.cookie.js"></script>
  <script type="text/javascript" src="../js/ajax.js"></script>  
  <script type="text/javascript" src="../js/clientes.js"></script>  
 

</html>
