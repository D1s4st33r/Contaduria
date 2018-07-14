
  	<div class="row">
  		<div class="jumbotron container">
  			<form class="form-horizontal" role="form" action="<?php base_url();?>Panel_user/index" method="POST">
  				<div class="row">
				    <div class="col-sm">
				    	<div class="form-group">
					    <label for="RazonSocial">Razón Social</label>
					    <input type="text" class="form-control" id="RazonSocial" aria-describedby="razonSocial" placeholder="Mi empresa SA de CV" >
					    <small id="razonSocial" class="form-text text-muted">Ejemplo: <i>Mi empresa SA de CV</i></small>
					  </div>
				    </div>
				    <div class="col-sm">
				      <div class="form-group">
					    <label for="inputRfc">RFC</label>
					    <input type="text" class="form-control" id="inputRfc" placeholder="RFC">
					  </div>
				    </div>
				</div>
				<div class="row">
				    <div class="col-sm">
				    	<div class="form-group">
					    <label for="Domicilio">Domicilio</label>
					    <input type="text" class="form-control" id="Domicilio" aria-describedby="domicilio" placeholder="SM 100 MZ 123 LT 123 CALLE 23 CP 775656">
					    <small id="domicilio" class="form-text text-muted">Ejemplo: <i>SM 100 MZ 123 LT 123 CALLE 23 CP 775656</i></small>
					  </div>
				    </div>
				    <div class="col-sm">
				     <div class="form-group">
					    <label for="exampleInputEmail1">Email</label>
					    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="miemail@gmail.com">
					    <small id="emailHelp" class="form-text text-muted">miemail@gmail.com</small>
					  </div>
				    </div>
				</div>
				<div class="row">
				    <div class="col-sm">
				    	<div class="form-group">
					    <label for="Telefono">Telefono</label>
					    <input type="number" class="form-control" id="Telefono" aria-describedby="Telefono" placeholder="99 88 23 23 23">
					    <small id="Telefono" class="form-text text-muted">Ejemplo: <i>99 88 23 23 23</i></small>
					  </div>
				    </div>
				    <div class="col-sm">
				      <div class="form-group">
					    <label for="RepresentanteLegal">Representante Legal</label>
					    <input type="text" class="form-control" id="RepresentanteLegal" placeholder="Nombre de representate legal">
					  </div>
				    </div>
				</div>
				<div class="row">
				    <div class="col-sm">
				    	<div class="form-group">
					   		<label for="RazonSocial">Archivos</label>
					    	<div class="custom-file">
						    	<input type="file" class="custom-file-input" id="validatedCustomFile" required>
						    	<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
						    	<div class="invalid-feedback">Example invalid custom file feedback</div>
						  	</div>
					  </div>
				    </div>
				    <div class="col-sm">
				      <div class="form-group">
					   <button type="submit" class="btn btn-primary btn-lg" style="text-align rigth">Submit</button>
						 
					  </div>
				    </div>
				</div>
			  
			</form>
  		</div>
  	</div>
		
</div>
