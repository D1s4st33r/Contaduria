<div class="container p-3 my-3 text-white-50 bg-lgBlue rounded box-shadow">
    <div class="row">
    <div class="col-auto">
    <script>  
    </script>
      <?php 
    
        if($usuario['tipo'] == "Cliente"){
          echo "<i class='fas fa-user fa-3x'></i>";
        }
      ?>
    </div>
    <div class="col-sm">
      <div class="lh-100">
        <h4 class="mb-0 text-white lh-100"><?php echo $usuario['nombre'] ." ". $usuario['apellido']?></h4>
        <p class="mb-0"><?php echo $usuario['tipo'];?></p>
      </div>
    </div>
    </div>
</div>