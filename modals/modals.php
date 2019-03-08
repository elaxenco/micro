<!-- MODAL DE DESEMBOLSOS -->
<div class="modal fade" id="modalDesembolso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Prestamo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Cte.</span>
                </div>
                <input type="text" class="form-control col-12 mr-3"  aria-label="Username" aria-describedby="basic-addon1" readonly id="c_id_desembolso"> 
              </div> 
            </div>
            <div class="row"> 
              <div class="form-group col-12 col-md-4"> 
                    <label for="tipo_prestamo_id">Tipo</label>
                    <select class="custom-select" id="tipo_prestamo_id">
                      <option selected value="0">Tipo de Prestamo</option> 
                      <?php
                          $sql="SELECT  id, descripcion  FROM tipo_prestamo "; 
                                $resultado = mysqli_query($Conectar->con(), $sql);  
                                while ($res = mysqli_fetch_row($resultado)) {
                                       
                                      echo "<option value=".$res[0].">".$res[1]."</option>"; 
                                    } 
                      ?>
                    </select> 
              </div>
               <div id="divMontoNormal" class="form-group col-12 col-md-4"> 
                    <label for="importe_id">Monto</label>
                    <select class="custom-select" id="importe_id">
                      <option selected value="0">Monto Solicitado</option>  
                    </select> 
              </div> 
               <div id="divMontoDiez" class="form-group col-12 col-md-4" style="display: none"> 
                    <label for="importeDiez">Monto</label>
                    <input  class="form-control" id="importeDiez" onkeyup="calcularPagoDiez(this.value)"   onkeypress="return soloNumeros(event)" placeholder="Monto a Prestar">
              </div>
               <div class="form-group col-12 col-md-4"> 
                    <label for="pagoSemanal">Pago</label>
                    <input  class="form-control" id="pagoSemanal" readonly="" placeholder="Pago">
              </div>
              
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary bg-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary btn-success" id="btnGuardarDesembolso">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL DE HISTORIAL -->
<div class="modal fade" id="modalHistial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Historial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container"> 
           
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>