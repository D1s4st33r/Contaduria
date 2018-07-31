
  	<div class="row">
	
  		<div class="jumbotron container">



				<div class="alert alert-danger" role="alert" id="error" style="text-align:left;">
				<strong>Error de Registro</strong>  Verifique que lo datos sean correctos
				<div class="list-errors"></div>
				<br>
				<p>Posibles Problemas:</p>
				<li>El RFC ya ha sido registrado o es invalido</li>
				<li>Correo invalido o ya ha sido registrado</li>
			

        </div>


			<br>
			<form action="<?php echo base_url('postEmpresa').$session?>" id="registrar" method="post" class="card-body" >
  				<div class="row">
				    <div class="col-sm">
				    	<div class="form-group">
					    <label for="razonSocial">Razón Social</label>
					    <input type="text" class="form-control" name="razonSocial" id="razonSociald" aria-describedby="razonSocial" placeholder="Mi empresa SA de CV" required="required">
					    <small id="razonSocial" class="form-text text-muted">Ejemplo: <i>Mi empresa SA de CV</i></small>
					  </div>
				    </div>
				    <div class="col-sm">
				      <div class="form-group">
					    <label for="rfc">RFC</label>
					    <input type="text" class="form-control" name="rfc" id="rfcd" placeholder="RFC" required="required">
					  </div>
				    </div>
				</div>
				<div class="row">
				    <div class="col-sm">
				    	<div class="form-group">
					    <label for="domicilio">Domicilio</label>
					    <input type="text" class="form-control" name="domicilio" id="domiciliod" aria-describedby="domicilio" placeholder="SM 100 MZ 123 LT 123 CALLE 23 CP 775656" required="required">
					    <small id="domicilio" class="form-text text-muted">Ejemplo: <i>SM 100 MZ 123 LT 123 CALLE 23 CP 775656</i></small>
					  </div>
				    </div>
				    <div class="col-sm">
				     <div class="form-group">
					    <label for="correo">Email</label>
					    <input type="email" class="form-control" name="correo" id="correod" aria-describedby="emailHelp" placeholder="miemail@gmail.com" required="required">
					    <small id="correo" class="form-text text-muted">miemail@gmail.com</small>
					  </div>
				    </div>
				</div>
				<div class="row">
				    <div class="col-sm">
				    	<div class="form-group">
					    <label for="telefono">Telefono</label>
					    <input type="number" class="form-control" name="telefono" id="telefonod" aria-describedby="Telefono" placeholder="99 88 23 23 23" required="required">
					    <small id="Telefono" class="form-text text-muted">Ejemplo: <i>99 88 23 23 23</i></small>
					  </div>
				    </div>
				    <div class="col-sm">
				      <div class="form-group">
					    <label for="RepresentanteLegal">Representante Legal</label>
					    <input type="text" class="form-control" name="representantelegal" id="representantelegald" placeholder="Nombre de representate legal" required="required">
					  </div>
				    </div>
				</div>
				<div class="row">
				    <div class="col-sm">
				    	<div class="form-group">
					   		<label for="NombreArchivo">Acta Constitutiva</label>
					       <div class="custom-file">
						    	<input type="file" class="custom-file-input" name="archivos" id="archivosd"required> 
						    	<label class="custom-file-label" for="archivos">Gestionar Acta...</label>
						    	<div class="invalid-feedback">Example invalid custom file feedback</div>
						  	</div>
					  </div>
				    </div>
				    <div class="col-sm">
				      <div class="form-group">
					    <label for="RepresentanteLegal">Telefono de Representante Legal</label>
					    <input type="number" class="form-control" name="telrepresentante" id="telrepresentanted" placeholder="Telefono Representate Legal " required="required">
					  </div>
				    </div>

		
				</div>
				<div class="col-sm">
				      <div class="form-group">
							<br>
							<br>
						<!--<center><button  type="button" id="resgistroEm"class="btn btn-primary" onclick="return AgregarEmpresa('<//?php echo base_url('AgregarEmpresa').$session;?>')" >  
								Registrar Empresa
							</button></center>-->
							<input type="submit" value="Entrar" class="btn btn-primary"  >
						 
					  </div>
				    </div>
						</form>
		
  		</div>
  	</div>
	

