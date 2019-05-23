<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Financiera Leal</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
   

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>

  <div class="d-flex" id="wrapper">

   <?php   include('menu/menu.php'); ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
    
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom"> 
          <button id="buttonL"  class="mr-1 ml-1 menu-toggle" data-toggle="tooltip" onclick="this.style.display='none',document.getElementById('buttonR').style.display='block'" data-placement="right" title="Ocultar Menu"><i class="fas fa-angle-double-left"></i></button>
           <button id="buttonR"  class="mr-1 ml-1 menu-toggle" data-toggle="tooltip" onclick="this.style.display='none',document.getElementById('buttonL').style.display='block'" data-placement="right" title="Ver Menu"><i class="fas fa-angle-double-right"></i></button>
        </nav>

      <div class="container-fluid text-center"  >
            <h1 class="mt-3">Bienvenido</h1>
            <h2 class="mt-2"><?php echo $_COOKIE ['micro_nombre']?></h2>
            <h2 class="mt-2"><?php echo date("Y-m-d")?></h2>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="js/js.cookie.js"></script>
  <script type="text/javascript" src="js/ajax.js"></script>
  <script type="text/javascript" src="js/utileria.js"></script> 
  <script type="text/javascript" src="js/menu.js"></script>   
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script> 
  <script type="text/javascript" src="js/popper.min.js"></script> 

   

</body>

</html>
