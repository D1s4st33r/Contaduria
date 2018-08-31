<div class="col-sm-12 col-md-12 col-lg-12 mb-1">
      <h6 class="p-2 text-dark"> 
        <i class="fas fa-users fa-lg"></i> Clientes &amp; Empresas 
      </h6>
    </div>

    <?php
    foreach ($estadisticas as $key => $value) {            
      echo '
      <div class=" col-sm-12 col-md-12 col-lg-6 text-muted pt-3 ">
        <div class="col-auto  rounded " > ';
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
            <a href="';
            if($key == "Contadores"){
              echo base_url("ControlContadores").$session;
            }
            echo '"> <i class="fas fa-eye fa-lg"></i> </a>
          </div>
          <span class="d-block"> Total Registrados '.$value.'</span>
        </div>
      </div>';
      }
      ?>
      
      