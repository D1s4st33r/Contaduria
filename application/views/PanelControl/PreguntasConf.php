<div class="container p-1" style="margin-bottom:60px;background:white;">
  		<div class="container">
	  		<nav class="navbar navbar-expand-lg navbar-light ">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			    <div class="navbar-nav contenedor-cat " style="">
          <?php
            foreach($categorias as $cen=>$valores)
            {
              echo '<a class=" '; if($titulo ==strtoupper($valores["categoria"]) ){echo "btn btn-secondary active";}else{echo " nav-item nav-link";}echo' "href="'.base_url("Panel_admin/configuracionPreguntas").$session.'&cat='.strtoupper($valores["categoria"]).'&idcat='.$valores['id'].'" >'.strtoupper($valores["categoria"]).'</a> ';    
            }
            ?>
           </div>
           <div class="col-md" id="panel-categoria">
           <input type="text" value="<?php echo $idcat ?>" name="id" class="form-control form-control-sm text-center" readonly hidden>
           <div class="col-md" id="config-categoria">
           </div>
            <div class="btn-group grupo-bot" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-secondary btn-sm" title="añadir categoria" onclick="return hacerCambio('config-categoria' ,'<?php echo base_url('configAddCategoria').$session.'&cat='.strtoupper($categoria);?>')" ><i class="fa fa-plus-square" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-secondary btn-sm" title="editar nombre" onclick="return hacerCambio('config-categoria' ,'<?php echo base_url('configUpdateCategoria').$session.'&cat='.strtoupper($categoria);?>')" ><i class="fa fa-pencil-alt" aria-hidden="true"></i></i></button>
            <button type="button" class="btn btn-secondary btn-sm" title="eliminar categoria" onclick="return hacerCambio('config-categoria' ,'<?php echo base_url('configDeleteCategoria').$session.'&cat='.strtoupper($categoria);?>')"><i class="fa fa-trash" aria-hidden="true"></i></button>
           <div class="col-md"></div>
            <div class="btn-group grupo-bot" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-secondary btn-sm" ><i class="fa fa-plus-square" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-wrench" aria-hidden="true"></i></i></button>
            <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </div>
			    
			  </div>
			</nav>
	  	</div>
  	</div>
