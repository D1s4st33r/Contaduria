<div class="my-3 p-3 bg-white rounded box-shadow">
  <h6 class="border-bottom border-gray pb-2 mb-0">  <i class="fas fa-users fa-lg"></i> Contadores Y Usuarios</h6>
  <div class="row">
  <?php
    foreach ($estadisticas as $key => $value) {      
      
      echo '<div class=" container media text-muted pt-3 ">
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
      echo'</div>
              <div class="col-auto media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                  <strong class="text-gray-dark">'. $key.'</strong>
                  <a href="#">Ver</a>
                </div>
                <span class="d-block"> Total Registrados '.$value.'</span>
              </div>
            </div>
      ';
    }
   ?>
    <div class="container">
    <div class="col">
      <small class="d-block text-right mt-3">
        <a href="#">All suggestions</a>
      </small>
      </div>
    </div>
</div>
</div>