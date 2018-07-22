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
			  </div>
			</nav>
	  	</div>
  	</div>
