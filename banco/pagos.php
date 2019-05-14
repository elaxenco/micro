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
      <div class="col-md-8 col-12 ">

         <button type="button" onclick="realizarPagos()" class="btn btn-warning mt-4 float-right" class="mr-1 ml-1" data-toggle="tooltip" data-placement="top" title="Realizar Pago"><i class="fas fa-dollar-sign"></i> Realizar Pago</button>
         <button type="button" onclick="quitarAbonos()" class="btn btn-secundary mr-2 mt-4 float-right" class="mr-1 ml-1" data-toggle="tooltip" data-placement="top" title="Pagos en 0"><i class="fas fa-dollar-sign"></i> Abonos en 0</button>
      </div> 
	</div>
	<div class="card-header bg-success text-white mt-2"> 
            <div class="row">
              <div class="col-md-6  mt-2">
                Clientes 
              </div>
              <div class="col-md-6 col-12 text-right" > 
                <!--input type="text" class="form-control col-md-12 col-12" id="b_clientes" onkeyup="buscarClientes(this.value)" placeholder="Buscar cliente"  required-->  
                <h5>Total a Abonar: <b id="totalPago">0.00</b></h5>
              </div>
            </div> 
          </div>
        <div class="card scroller-pagos">
          
          <div class="card-body">
              <table class="table   table-sm table-striped table-hover heavyTable">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">Id</th>
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