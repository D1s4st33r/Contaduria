<div class="container">
	<div class="row p-2">
    	<div class="col-sm bg-info rounded text-white mx-auto p-2">
			<h1>Preguntas para la Consultoria</h1>    
    	</div>
  	</div>
  	<div class="row p-1">
  		<div class="container">
	  		<nav class="navbar navbar-expand-lg navbar-light ">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			    <div class="navbar-nav">
			      <a class="nav-item <?php if($titulo =="General" ){echo "btn btn-secondary btn-lg btn-block";}else{echo "nav-link";} ?>" href="<?php echo base_url("Formularios/general".$session); ?>">

			      	General
			      
			      </a>

			      <a class="nav-item <?php if($titulo =="Legal" ){echo "btn btn-secondary active";}else{echo "nav-link";} ?>" href="<?php echo base_url("formularios/legal".$session);?>">
			      	
			      		Legal
			      </a>
			      
			      <a class="nav-item <?php if($titulo =="Contable" ){echo "btn btn-secondary active";}else{echo "nav-link";} ?>" href="<?php echo base_url("formularios/contable".$session);?>">

			  	  	  Contable
			  	  
			  	  </a>
			      
			      <a class="nav-item <?php if($titulo =="Laboral" ){echo "btn btn-secondary active";}else{echo "nav-link";} ?>" href="<?php echo base_url("formularios/laboral".$session);?>">
			      	
			      	Laboral

			  		</a>

			      <a class="nav-item  <?php if($titulo =="Seguridad Social" ){echo "btn btn-secondary active";}else{echo "nav-link";} ?>" href="<?php echo base_url("formularios/segSocial".$session);?>">Seg.Social</a>

			      
			      <a class="nav-item <?php if($titulo =="Fiscal"){echo "btn btn-secondary active";}else{echo "nav-link";} ?>" href="<?php echo base_url("formularios/fiscal".$session);?>">Fiscal</a>
			    </div>
			  </div>
			</nav>
	  	</div>
  	</div>
</div>