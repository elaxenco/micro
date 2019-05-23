<div class="container-fluid  "> 
	<div class="text-center mt-5">
			<h2>Usuarios</h2>
		</div> 
</div>
<div class="container-fluid  "> 
	<div class="row">
		<div class="col-md-6 col-12">
			<div class="row ">
 
		          <div class="col-md-2 col-3">
		              <label for="usuario_id">Id</label>
		              <input type="number" min="1" class="form-control" id="usuario_id" placeholder="0" value="0"   readonly=""> 
		          </div>
		          <div class="col-md-8 col-9 ">
		              <label for="usuario_nombre ">Nombre</label>
		              <input type="text" class="form-control" id="usuario_nombre" placeholder="Ingrese su nombre" onkeypress="return soloLetras(event)"  required> 
		           </div> 
		           <div class="col-md-5 col-12 ">
		              <label for="usuario_app ">Apellido Paterno</label>
		              <input type="text" class="form-control" id="usuario_app" placeholder="Ingrese su apellido paterno" onkeypress="return soloLetras(event)"  required> 
		           </div> 
		           <div class="col-md-5 col-12 ">
		              <label for="usuario_apm ">Apellido Materno</label>
		              <input type="text" class="form-control" id="usuario_apm" placeholder="Ingrese su apellido materno" onkeypress="return soloLetras(event)"  required> 
		           </div>  
		           <div class="col-md-5 col-12 ">
		              <label for="usuario_rol ">Rol</label>
		               <select class="custom-select" id="usuario_rol" onchange="verPermisos(this.value)">
			                <option selected value="0">Seleccione un Rol</option> 
			                <?php
			                    $sql="SELECT id,descripcion FROM roles"; 
			                          $resultado = mysqli_query($Conectar->con(), $sql);  
			                          while ($res = mysqli_fetch_row($resultado)) {
			                                 
			                                echo "<option value=".$res[0].">".$res[1]."</option>"; 
			                              } 
			                ?>
			              </select>
		           </div>  
		         	<div class="col-md-5 col-12 ">
		              <label for="nombre_usuario ">Nombre Usuario</label>
		              <input type="text" class="form-control" id="nombre_usuario" placeholder="Nombre de usuario"  > 
		           </div> 
		           <div class="col-md-5 col-12 ">
		              <label for="usuario_pwd ">Contraseña</label>
		              <input type="password" class="form-control" id="usuario_pwd" placeholder="Contraseña"     > 
		           </div> 
		           <div class="col-md-5 col-12 ">
		              <label for="usuario_pwdv ">Confirmar Contraseña</label>
		              <input type="password" class="form-control" id="usuario_pwdv" placeholder="Confirmar contraseña"  > 
		           </div>  
		           

	     	</div>
	     	<div class="row  mt-3  ">
	     	
	           		<div class="col-10  text-right">
		     			<button type="button" onclick="limpiartCampos()" class="btn btn-danger mr-1">Cancelar</button>
						<button type="button" onclick="guardarUsuario()" class="btn btn-success">Guardar</button>
		     		</div>
	         </div>	
		</div>
		<div class="col-md-6 col-12" id="divAccesosUsuarios" style="display: none">
				<div class=" col-12 text-center ">
					<h3>Accesos</h3>
				</div>
				<div class="col-12 scroller-accesos" >
					<table class="table  table-bordered table-sm">
					  <thead  class="text-center ">
					    <tr>
					      <th scope="col">Cartera</th>
					      <th scope="col">Acceso</th> 
					    </tr>
					  </thead>
					  <tbody id="tbCarterasAcceso">
					    <tr>
					      <th scope="row">1</th>
					      <td class="text-center">
					      	<div class="form-check form-check-inline">
							  <input class="form-check-input" type="checkbox" onclick="agregarCartera(this.checked,2)"> 
							</div>
						</td> 
					    </tr>
					     
					  </tbody>
					</table>
				</div>		
		</div>
	</div>
	<div class="row">
		
		<div class="col-md-8  offset-md-2 col-12 ">
			<div class=" col-12 text-center ">
				<h3>Lista de usuarios</h3>
			</div>
			<div class="col-12 scroller-accesos" >
					<table class="table  table-bordered table-sm">
					  <thead  class="text-center ">
					    <tr class="">
					      <th scope="col">Usuario</th>
					      <th scope="col">Estatus</th>
					      <th scope="col">Acciones</th> 
					    </tr>
					  </thead>
					  <tbody id="tbUsuarios">
					  
					     
					  </tbody>
					</table>
				</div>
				
		</div>
	</div>
		 
		 
</div>