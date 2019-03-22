<!-- MODAL DE BANCO -->
<div class="modal fade" id="modalBanco" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Registro de Pagos de Cliente ID : <b id="b_cliente"></b> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  

       
      <div class="row">
        <div class="col-md-7 col-12  ">
          <div class="col-12 ">
            <div class="row">
              <div class="col-md-5 col-12 ">Desembolso Actual :</div>
              <div class="col-md-7 col-12 text-left"><b  id="desembolsoActual">0.00</b></div>
            </div> 
          </div>
          <div class="col-12 ">
            <div class="row">
              <div class="col-md-5 col-12 ">Pago Normal :</div>
              <div class="col-md-7 col-12 text-left "><b   id="pagoNormal">0.00</b></div>
            </div> 
          </div>
          <div class="col-12 ">
            <div class="row">
              <div class="col-md-5 col-12 ">Saldo Vencido :</div>
              <div class="col-md-7 col-12 text-left "><b  id="saldoVencido">0.00</b></div>
            </div> 
          </div>
          <div class="col-12 ">
            <div class="row">
              <div class="col-md-5 col-12 ">Saldo Exigible :</div>
              <div class="col-md-7 col-12 text-left "><b  id="saldoExigible">0.00</b></div>
            </div> 
          </div>
          <div class="col-12 ">
            <div class="row">
              <div class="col-md-5 col-12 ">Saldo Total :</div>
              <div class="col-md-7 col-12 text-left "><b  id="saldoTotal">0.00</b></div>
            </div> 
          </div>  
        </div>
        <div class="col-md-5 col-12 ">
          <div class="col-12">
            <b><label for="b_tipo_pago">Tipo de Pago</label></b>
            <select class="custom-select" id="b_tipo_pago" onchange="seleccionarTipoPago(this.value)">
              <option selected value="0">Seleccione una opcion</option> 
              <option  value="1">Pago Exigible</option> 
              <option  value="2">Pago Normal</option> 
              <option  value="3">Abono</option> 
              <option  value="4">Liquidar Cuenta</option> 
            </select>
          </div> 
          <div id="divMontoBanco" class="col-12"  >
             <b><label for="b_monto ">Monto</label></b>
              <input  readonly type="text" class="form-control" id="b_monto" placeholder="Ingrese Abono" onkeypress="return soloNumeros(event)"  required> 
          </div> 
        </div>
         
      </div>
      <div class="row">
        <div class="col-md-10 col-12">
          
        </div>
        <div class="col-md-2 col-12 mt-2">
          <button onclick="guardarPago()" type="button" class="btn btn-success">Aceptar</button>
        </div>
      </div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> 
      </div>
    </div>
  </div>
</div>