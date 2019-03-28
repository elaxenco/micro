 

 <!-- Sidebar -->
    <div class="  border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">MiMicro</div>
      <div class="list-group list-group-flush">
        <a href="http://localhost/micro/index.php" class="list-group-item list-group-item-action bg-light">Inicio</a>
        <a href="http://localhost/micro/clientes/cliente.php" class="list-group-item list-group-item-action bg-light">Clientes</a>
        <a href="http://localhost/micro/banco/banco.php" class="list-group-item list-group-item-action bg-light">Banco</a>
        <a href="http://localhost/micro/carteras/carteras.php" class="list-group-item list-group-item-action bg-light">Carteras</a> 
        <div class="btn-group dropright">
          <a href="#" class="list-group-item list-group-item-action bg-light  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Reportes
          </a> 
          <div class="dropdown-menu"> 
                  <a href="http://localhost/micro/reportes/desembolsos.php" class="dropdown-item list-group-item list-group-item-action bg-blue-grey">Desembolsos</a>  
                  <a href="http://localhost/micro/reportes/pagos.php" class="dropdown-item list-group-item list-group-item-action bg-blue-grey">Pagos</a> 
                  <a href="http://localhost/micro/reportes/pendientes_pago.php" class="dropdown-item list-group-item list-group-item-action bg-blue-grey">Pendientes de Pago</a> 
                  <a href="http://localhost/micro/reportes/colocado.php" class="dropdown-item list-group-item list-group-item-action bg-blue-grey">Colocado</a> 
          </div>
        </div>

        
        <div class="btn-group dropright">
          <a href="#" class="list-group-item list-group-item-action bg-light  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Mantenimiento
          </a> 
          <div class="dropdown-menu   "> 
                  <a href="http://localhost/micro/mantenimiento/usuarios.php" class="dropdown-item list-group-item list-group-item-action bg-blue-grey">Usuarios</a>  
                  <a href="#" class="dropdown-item list-group-item list-group-item-action bg-blue-grey">Roles</a> 
          </div>
        </div> 
        <a href="#" onclick="cerrarSesion()" class="list-group-item list-group-item-action bg-light"><i class="fas fa-times-circle h4"></i> Cerrar Sesión</a> 

      </div>

       
</div>
    <!-- /#sidebar-wrapper -->