<div class="alert alert-danger" role="alert" id="error" style="text-align:left;">
				<strong>Importante</strong>
				<div class="list-errors"></div>

			</div>
  	<div class="row">
	
  		<div class="jumbotron container">


			<br>
		
				<form autocomplete="off"class="form-horizontal" method="post"  id="registrar"> 
  				<div class="row">
				    <div class="col-sm">
				    	<div class="form-group">
					    <label for="razonSocial">Razón Social</label>
					    <input type="text" class="form-control" name="razonSocial" id="razonSocial" aria-describedby="razonSocial" placeholder="Mi empresa SA de CV" required="required">
					    <small id="razonSocial" class="form-text text-muted">Ejemplo: <i>Mi empresa SA de CV</i></small>
					  </div>
				    </div>
				    <div class="col-sm">
				      <div class="form-group">
					    <label for="rfc">RFC</label>
					    <input type="text" class="form-control" name="rfc" id="rfc" placeholder="RFC" required="required">
					  </div>
				    </div>
				</div>
				<div class="row">
				    <div class="col-sm">
				    	<div class="form-group">
					    <label for="domicilio">Domicilio</label>
					    <input type="text" class="form-control" name="domicilio" id="domicilio" aria-describedby="domicilio" placeholder="SM 100 MZ 123 LT 123 CALLE 23 CP 775656" required="required">
					    <small id="domicilio" class="form-text text-muted">Ejemplo: <i>SM 100 MZ 123 LT 123 CALLE 23 CP 775656</i></small>
					  </div>
				    </div>
				    <div class="col-sm">
				     <div class="form-group">
					    <label for="correo">Email</label>
					    <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelp" placeholder="miemail@gmail.com" required="required">
					    <small id="correo" class="form-text text-muted">miemail@gmail.com</small>
					  </div>
				    </div>
				</div>
				<div class="row">
				    <div class="col-sm">
				    	<div class="form-group">
					    <label for="telefono">Telefono</label>
					    <input type="number" class="form-control" name="telefono" id="telefono" aria-describedby="Telefono" placeholder="99 88 23 23 23" required="required">
					    <small id="Telefono" class="form-text text-muted">Ejemplo: <i>99 88 23 23 23</i></small>
					  </div>
				    </div>
				    <div class="col-sm">
				      <div class="form-group">
					    <label for="RepresentanteLegal">Representante Legal</label>
					    <input type="text" class="form-control" name="representantelegal" id="representantelegal" placeholder="Nombre de representate legal" required="required">
					  </div>
				    </div>
				</div>
				<div class="row">
				    <div class="col-sm">
				    	<div class="form-group">
					   		<label for="NombreArchivo">Acta Constitutiva</label>
					    <div class="custom-file">
									
						    	<input type="file" class="custom-file-input" name="archivos" id="archivos"required> 
						    	<label class="custom-file-label" for="archivos">Gestionar Acta...</label>
						    	<div class="invalid-feedback">Example invalid custom file feedback</div>
						  	</div>
					  </div>
				    </div>
				    <div class="col-sm">
				      <div class="form-group">
							<button  type="button" class="btn btn-primary" onclick="return AgregarEmpresa('<?php echo base_url("AgregarEmpresa").$session;?>')" >  <i class="fas fa-thumbs-up fa-md"></i> Registrar Empresa</button>
						 
					  </div>
				    </div>
				</div>
			  
			</form>
  		</div>
  	</div>
	

