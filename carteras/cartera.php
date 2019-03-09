  <div class="container mb-5 mt-5">
          <div class="text-cente mb-5"><h2> Carteras</h2></div>
          <div class="form-row"> 
            <div class="col-md-6 col-12 ">
              <label for="c_cartera ">Nombre de la cartera</label>
              <input type="text" class="form-control" id="c_cartera" placeholder="Ingrese el nombre de la cartera"   required>
               
            </div> 
              <div class="col-md-4 col-12 ">
                <label for="c_responsable">Seleccione responsable</label>
                <select class="custom-select" id="c_responsable">
                  <option value="0" selected>Seleccione una opcion</option> 
                  <?php 
                    $sql="SELECT id, CONCAT(nombre,' ',appaterno,' ',apmaterno) usuario FROM usuarios "; 
                          $resultado = mysqli_query($Conectar->con(), $sql);  
                          while ($res = mysqli_fetch_row($resultado)) {
                                 
                                echo "<option value=".$res[0].">".$res[1]."</option>"; 
                              } 

                  ?>
                  
                  
                </select>
              </div> 
              <div class="col-md-2 col-12" style="margin-top: 32px"> 
                 <button id="btnGuardarCartera" type="button" class="btn btn-success  ">Grabar</button>
               
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
                    <?php
                         $sql="SELECT carteras.id,carteras.descripcion,CONCAT(usuarios.nombre,' ',usuarios.appaterno,' ',usuarios.apmaterno) usuario FROM carteras
                                    JOIN usuarios ON usuarios.id=carteras.encargado_id"; 
                              $resultado = mysqli_query($Conectar->con(), $sql);  
                              while ($res = mysqli_fetch_row($resultado)) {
                                     
                                    echo "<tr>";
                                    echo "<td>".$res[0]."</td>";
                                    echo "<td>".$res[1]."</td>";
                                    echo "<td>".$res[2]."</td>";
                                    echo "</tr>";
                                  } 

                    ?>
                    
                  </tbody>
                </table>
            
          </div>
        </div>
      </div>