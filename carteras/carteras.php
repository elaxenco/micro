
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
 
  </head>

  <body  >  
      <?php   include('../menu/menu.php'); ?>

      <div class="container mb-5">
          <div class="text-cente mb-5"><h2> Carteras</h2></div>
          <div class="form-row"> 
            <div class="col-md-6 col-6 ">
              <label for="c_nombre ">Nombre de la cartera</label>
              <input type="text" class="form-control" id="c_cartera" placeholder="Ingrese el nombre de la cartera"   required>
               
            </div> 
              <div class="col-md-4 col-12 ">
                <label for="c_responsable">Seleccione responsable</label>
                <select class="custom-select" id="c_responsable">
                  <option selected>Seleccione una opcion</option> 
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div> 
          </div>
      </div>

      <div class="container ">
        <div class="card ">
          <div class="card-header bg-success text-white">
            Featured
          </div>
          <div class="card-body">
            
          </div>
        </div>
      </div>
 
    
    
  </body>
  <script type="text/javascript" src="../js/jquery-3.2.1.js"></script> 
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/main.js"></script> 
  <script type="text/javascript" src="../js/js.cookie.js"></script>
  <script type="text/javascript" src="../js/ajax.js"></script>  
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/main.js"></script>  
</html>
