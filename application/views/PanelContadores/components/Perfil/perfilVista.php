

<div class="col-12 p-0">
  <div class="my-1 px-2 bg-white rounded contenedor container">
    <div class="row">

      <div class="col-12 mb-1">
        <h4 class="p-2  text-muted"> 
          <i class="fas fa-user-edit fa-md"></i> Perfil
        </h4>
        
      </div>
      
      <div class=" col-sm col-md-6 p-3 ">
        <p class=" pb-0 pt-1 mb-0 lh-125 text-muted ">
        <i class="fas fa-user"></i> Nombre
        </p>
        <p class="mb-1 border-bottom ">
          <b> <?php echo $usuario['nombre'] ." ". $usuario['apellido']?></b>
        </p>
      </div>
      
      <div class=" col-sm col-md-6 p-3 ">
        <p class=" pb-0 pt-1 mb-0 lh-125 text-muted ">
          <i class="fas fa-at fa-md"></i> Email
        </p>
        <p class="mb-1 border-bottom ">
          <b> <?php echo $usuario['email']; ?></b>
        </p>
      </div>

      <div class=" col-sm col-md-6 p-3 ">
        <p class=" pb-0 pt-1 mb-0 lh-125 text-muted ">
          <i class="fas fa-phone fa-md"></i> Telefono
        </p>
        <p class="mb-1 border-bottom ">
          <b> <?php echo $usuario['telefono']; ?></b>
        </p>
      </div>
    
      <div class=" col-sm col-md-6 p-3 ">
        <p class=" pb-0 pt-1 mb-0 lh-125 text-muted ">
          <i class="fas fa-key fa-md"> </i> Contraseña
        </p>
        <p class="mb-1 border-bottom ">
          <b> <?php echo "********************"; ?></b>
        </p>
      </div>
    
      <div class="col-12 p-2 text-center">  
        <button  type="button" 
                 class="btn btn-lg btn btn-outline-primary" 
                 onclick="return hacerCambio('perfil','<?php echo base_url('FormularioParaActualizarCont');echo $session;?>');">
          <i class="fas fa-edit fa-md"></i> 
          Editar
        </button> 
      </div>
    
    </div>
  </div>
</div>