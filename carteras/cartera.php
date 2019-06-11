  <div class="container mb-5 mt-5">
      <div class="text-center mb-5">
          <h2> Carteras</h2>
      </div>
      <div class="form-row">
          <div class="col-md-6 col-12 ">
              <label for="c_cartera ">Nombre de la cartera</label>
              <input type="text" class="form-control" id="c_cartera" placeholder="Ingrese el nombre de la cartera"
                  required>
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
      <div class="card-header bg-success text-white">
          Carteras
      </div>
      <div class="card scroller-monitor">

          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-sm">
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Encargado</th>
                              <th scope="col">Acciones</th>
                          </tr>
                      </thead>
                      <tbody id="tb_carteras">
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalEditarCartera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cartera</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-row">
                      <div class="form-group col-md-3">
                          <label for="cartera_id">Id</label>
                          <input type="text" class="form-control" id="cartera_id" readonly>
                      </div>
                      <div class="form-group col-md-9">
                          <label for="txtCarteraEdit">Nombre</label>
                          <input type="text" class="form-control" id="txtCarteraEdit">
                      </div>
                  </div>

              </div>
              <div class="modal-footer">
                  <button  type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  <button onclick="guardarNuevoNombreCartera()" type="button" class="btn btn-success">Guardar</button>
              </div>
          </div>
      </div>
  </div>