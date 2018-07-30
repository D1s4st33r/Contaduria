<div class="container p-3 my-3 text-white-50 bg-lgBlue rounded box-shadow " style="padding-top:30px;margin-bottom:0; text-align:center;"><b class="mb-0 text-white lh-100">CATEGORIAS</b></div>

<div class="container row">
  <div  id="panel-categoria">
    <input type="text" value="<?php echo $idcat ?>" name="id" class="form-control form-control-sm text-center" readonly hidden>
    <div class="col-md" id="config-categoria"></div>
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
          echo '<a class=" '; if($titulo =="general" ){echo "btn btn-secondary active";}else{echo " nav-item nav-link";}echo' "onclick=" hacerCambio(';echo "'"; echo 'categorias';echo "'"; echo  ", '".base_url('viewCategoriasUser').$session.'&cat=general'; echo"'"; echo '); hacerCambio(';echo "'"; echo 'seccypre';echo "'"; echo  ", '".base_url('viewGeneralUser').$session."'"; echo ');" style="cursor:pointer;">Datos Generales</a> '; 
            foreach($categorias as $cen=>$valores)
            {
              echo '<a class=" '; if($titulo ==strtoupper($valores["categoria"]) ){echo "btn btn-secondary active";}else{echo " nav-item nav-link";}echo' "onclick=" hacerCambio(';echo "'"; echo 'categorias';echo "'"; echo  ", '".base_url('viewCategoriasUser').$session.'&cat='.strtoupper($valores["categoria"]).'&idcat='.$valores['id'];echo"'"; echo '); hacerCambio(';echo "'"; echo 'seccypre';echo "'"; echo  ", '".base_url('viewSeccionUser').$session.'&cat='.strtoupper($valores["categoria"]);echo"'"; echo ');" style="cursor:pointer;">'.strtoupper($valores["categoria"]).'</a> '; 
            }
            ?>
           </div>
			  </div>
			</nav>
	  	</div>
  	</div>