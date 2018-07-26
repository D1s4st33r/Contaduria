<div class="container p-3 my-3 text-white-50 bg-lgBlue rounded box-shadow " style="padding-top:30px;margin-bottom:0; text-align:center;"><b class="mb-0 text-white lh-100">CATEGORIAS</b></div>

<div class="container row">
  <div  id="panel-categoria">
    <input type="text" value="<?php echo $idcat ?>" name="id" class="form-control form-control-sm text-center" readonly hidden>
    <div class="col-md" id="config-categoria"></div>
  </div>
  <div class="btn-group grupo-bot" role="group" aria-label="Basic example" style="margin-right:0; margin-left:auto;">
      <button type="button" class="btn btn-secondary btn-sm" title="añadir categoria" onclick="return hacerCambio('config-categoria' ,'<?php echo base_url('configAddCategoria') . $session . '&cat=' . strtoupper($categoria).'&idcat='.$idcat; ?>')" ><i class="fa fa-plus-square" aria-hidden="true"></i></button>
      <button type="button" class="btn btn-secondary btn-sm" title="editar nombre" onclick="return hacerCambio('config-categoria' ,'<?php echo base_url('configUpdateCategoria') . $session . '&cat=' . strtoupper($categoria).'&idcat='.$idcat; ?>')" ><i class="fa fa-pencil-alt" aria-hidden="true"></i></i></button>
      <button type="button" class="btn btn-secondary btn-sm" title="eliminar categoria" onclick="return hacerCambio('config-categoria' ,'<?php echo base_url('configDeleteCategoria') . $session . '&cat=' . strtoupper($categoria).'&idcat='.$idcat; ?>')"><i class="fa fa-trash" aria-hidden="true"></i></button>
  </div>
</div>

<div class="container p-1" style="margin-bottom:60px;background:white;">
  		<div class="container">
	  		<nav class="navbar navbar-expand-lg navbar-light ">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			    <div class="navbar-nav contenedor-cat">
          <?php
            foreach($categorias as $cen=>$valores)
            {
              echo '<a class=" '; if($titulo ==strtoupper($valores["categoria"]) ){echo "btn btn-secondary active";}else{echo " nav-item nav-link";}echo' "onclick=" hacerCambio(';echo "'"; echo 'categorias';echo "'"; echo  ", '".base_url('viewCategorias').$session.'&cat='.strtoupper($valores["categoria"]).'&idcat='.$valores['id'];echo"'"; echo '); hacerCambio(';echo "'"; echo 'seccypre';echo "'"; echo  ", '".base_url('viewSeccyPre').$session.'&cat='.strtoupper($valores["categoria"]);echo"'"; echo ')" style="cursor:pointer;">'.strtoupper($valores["categoria"]).'</a> ';  //'.base_url("Panel_admin/configuracionPreguntas").$session.'&cat='.strtoupper($valores["categoria"]).'&idcat='.$valores['id'].'  
            }
            ?>
           </div>
			  </div>
			</nav>
	  	</div>
  	</div>
