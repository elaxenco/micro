<div class="container  "> 
	<div class="text-center mt-5">
			<h2>Modulo de Pagos</h2>
	</div> 
	<div class="form-row">
	     <div class="col-md-4 col-12 ">
	      <b><label for="c_cartera">Seleccione su cartera</label></b>
	      <select class="custom-select" id="c_cartera" onchange="buscarClientesPorCartera(this.value)">
	        <option selected value="0">Seleccione una cartera</option> 
	      </select>
	    </div> 
	</div>
	<div class="card-header bg-success text-white mt-2"> 
            <div class="row">
              <div class="col-md-6  mt-2">
                Clientes 
              </div>
              <div class="col-md-6 col-12"> 
                <!--input type="text" class="form-control col-md-12 col-12" id="b_clientes" onkeyup="buscarClientes(this.value)" placeholder="Buscar cliente"  required-->  
              </div>
            </div> 
          </div>
        <div class="card scroller-pagos">
          
          <div class="card-body">
              <table class="table   table-sm table-striped table-hover heavyTable">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">#</th>
                      <th scope="col" class="text-center">Nombre</th>
                      <th scope="col" class="text-center">Capital</th>  
                      <th scope="col" class="text-center">Saldo</th>  
                      <th scope="col" class="text-center">Saldo Capital</th>  
                      <th scope="col" class="text-center">Saldo Interes</th>  
                      <th scope="col" class="text-center">Saldo Seguro</th>  
                      <th scope="col" class="text-center">Abono</th>  
                    </tr>
                  </thead>
                  <tbody id="tb_clientes">
                     
                    
                  </tbody>
                </table> 
            
          </div>
        </div>
 
</div>