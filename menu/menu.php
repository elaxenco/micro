 

 <!-- Sidebar -->
 
    <div class="  border-right" id="sidebar-wrapper"> 
      <div class="sidebar-heading" style="display: none">
       </div>
      <div class="list-group list-group-flush">
       <a  class=" list-group-item list-group-item-action bg-light" style="width: 100%;padding: 0;margin: 0;" ><img style="width: 100%;padding: 0;margin: 0;"   src="http://localhost/micro/img/logo2.png" /></a> 
        <a   id="m_inicio" href="http://localhost/micro/index.php" class=" list-group-item list-group-item-action bg-light">Inicio</a>
        <a  id="m_clientes" href="http://localhost/micro/clientes/cliente.php" class=" menudisplay list-group-item list-group-item-action bg-light">Clientes</a>
        <div class="btn-group dropright">
          <a  id="m_banco" href="#" class=" menudisplay list-group-item list-group-item-action bg-light  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Banco
          </a> 
          <div class="dropdown-menu">  
                  <a  id="m_banco_pagos" href="http://localhost/micro/banco/banco.php" class=" menudisplay dropdown-item list-group-item list-group-item-action bg-blue-grey">Pagos Clientes</a> 
                  <a  id="m_banco_caja" href="http://localhost/micro/banco/cajas.php" class="menudisplay dropdown-item list-group-item list-group-item-action bg-blue-grey">Entradas Y Salidas</a>   
                  <a  id="m_banco_cortes" href="http://localhost/micro/banco/cortes.php" class="menudisplay dropdown-item list-group-item list-group-item-action bg-blue-grey">Cortes</a>  
          </div>
        </div> 
        <a id="m_carteras" href="http://localhost/micro/carteras/carteras.php" class="menudisplay list-group-item list-group-item-action bg-light ">Carteras</a> 
        <div class="btn-group dropright">
          <a  id="m_reportes" href="#" class="menudisplay list-group-item list-group-item-action bg-light  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Reportes
          </a> 
          <div class="dropdown-menu"> 
                  <a  id="m_reportes_desenbolsos" href="http://localhost/micro/reportes/desembolsos.php" class="menudisplay dropdown-item list-group-item list-group-item-action bg-blue-grey">Desembolsos</a>  
                  <a  id="m_reportes_pagos" href="http://localhost/micro/reportes/pagos.php" class=" menudisplay dropdown-item list-group-item list-group-item-action bg-blue-grey">Pagos</a> 
                  <a  id="m_reportes_pendientes" href="http://localhost/micro/reportes/pendientes_pago.php" class="menudisplay dropdown-item list-group-item list-group-item-action bg-blue-grey">Pendientes de Pago</a> 
                  <a  id="m_reportes_colocado" href="http://localhost/micro/reportes/colocado.php" class="menudisplay dropdown-item list-group-item list-group-item-action bg-blue-grey">Colocado</a> 
                  <a  id="m_reportes_colocado" href="http://localhost/micro/reportes/caja.php" class="menudisplay dropdown-item list-group-item list-group-item-action bg-blue-grey">Entradas y Salidas</a> 
                  <a  id="m_reportes_movimientos" href="http://localhost/micro/reportes/movimientos.php" class="menudisplay dropdown-item list-group-item list-group-item-action bg-blue-grey">Movimientos</a> 
          </div>
        </div>

        
        <div class="btn-group dropright">
          <a  id="m_mantenimiento" href="#" class="menudisplay list-group-item list-group-item-action bg-light  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Mantenimiento
          </a> 
          <div class="dropdown-menu"> 
                  <a  id="m_usuarios" href="http://localhost/micro/mantenimiento/usuarios.php" class="dropdown-item list-group-item list-group-item-action bg-blue-grey">Usuarios</a>  
                  <a  id="m_roles" href="#" class="menudisplay dropdown-item list-group-item list-group-item-action bg-blue-grey">Roles</a>

          </div>

        </div> 
        <a href="#" onclick="cerrarSesion()" class="list-group-item list-group-item-action bg-light"><i class="fas fa-times-circle h4"></i> Cerrar Sesión</a> 

      </div>

       
</div>
    <!-- /#sidebar-wrapper -->