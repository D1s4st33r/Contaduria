    <div class="col-12 mb-1">
      <h4 class="p-2 bg-light text-dark"> 
        <i class="fas fa-users fa-lg"></i> Totales
      </h4>
    </div>

    <?php
    foreach ($estadisticas as $key => $value) {            
      echo '
      <div class=" col-12 text-muted pt-3 ">
        <div class="col-auto  rounded " > ';
          if($key == "Administradores"){
              echo "<i class='fas fa-user-shield fa-2x'></i>";
          }
          if($key == "Contadores"){
            echo "<i class='fas fa-user-tie fa-2x'></i>";
          }
          if($key == "Clientes"){
            echo "<i class='fas fa-user fa-2x'></i>";
        }
        if($key == "Empresas"){
          echo "<i class='fas fa-industry fa-2x'></i>";
      }
          echo'
        </div>
        <div class="col-auto pb-3 mb-0 small lh-125 border-bottom border-gray">
          <div class="d-flex justify-content-between align-items-center w-100">
            <strong class="text-gray-dark">'. $key.'</strong>
            <a href="#">Ver</a>
          </div>
          <span class="d-block"> Total Registrados '.$value.'</span>
        </div>
      </div>';
      }
      ?>
      <div class="col-12">
        <small class="d-block text-right mt-3">
          <a href="#" class="btn btn-lg btn-primary">All suggestions</a>
        </small>
      </div>
      