
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

      <div class="container mt-5"> 
          <div class="form-row">
            <div class="col-md-2 col-2">
              <label for="validationCustom01">Id</label>
              <input type="number" min="1" class="form-control" id="validationCustom01" placeholder="First name" value="0" required>
              
            </div>
            <div class="col-md-10 col-10 ">
              <label for="validationCustom02">Nombre</label>
              <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
               
            </div> 
            <div class="col-md-4 col-6 ">
              <label for="validationCustom02">Apellido Paterno</label>
              <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
              
            </div> 
            <div class="col-md-4 col-6 ">
              <label for="validationCustom02">Apellido Materno</label>
              <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
       
            </div> 
            <div class="col-md-4 col-12 ">
              <label for="validationCustom02">Fecha Nacimiento</label>
              <input type="date" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
       
            </div> 
            <div class="col-md-4 col-12 ">
               <label for="validationCustom02">Cartera</label>
              <select class="custom-select">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
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
</html>
