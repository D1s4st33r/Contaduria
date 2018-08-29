<div class="container p-3 my-3 text-white rounded box-shadow" style="background:#707472;">
    <div class="row">
    <div class="col-auto">
    <script>  
    </script>
      <?php 
          echo "<i class='fas fa-user-tie fa-3x'></i>";
      ?>
    </div>
    <div class="col-sm">
      <div class="lh-100">
        <h4 class="mb-0  lh-100"><?php echo strtoupper($usuario['nombre'] ." ". $usuario['apellido']);?></h4>
        <p class="mb-0"><?php echo strtoupper($usuario['tipo']);?></p>
      </div>
    </div>
    </div>
</div>