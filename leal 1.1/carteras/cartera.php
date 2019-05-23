  <div class="container mb-5 mt-5">
          <div class="text-center mb-5"><h2> Carteras</h2></div>
          <div class="form-row"> 
            <div class="col-md-6 col-12 ">
              <label for="c_cartera ">Nombre de la cartera</label>
              <input type="text" class="form-control" id="c_cartera" placeholder="Ingrese el nombre de la cartera"   required>  
            </div>  
              <div class="col-md-2 col-12" style="margin-top: 32px"> 
                 <button id="btnGuardarCartera" type="button" class="btn btn-success  ">Guardar</button>
               
              </div> 
          </div>
          <div class="form-row">
            <div id="alertCartera" class="col-12 mt-3"></div>
          </div>
      </div>

      <div class="container ">
        <div class="card scroller-monitor">
          <div class="card-header bg-success text-white">
            Carteras
          </div>
          <div class="card-body">
              <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Encargado</th>  
                    </tr>
                  </thead>
                  <tbody id="tb_carteras">  
                  </tbody>
                </table>
            
          </div>
        </div>
      </div>