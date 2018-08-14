    <!-- Modal -->
    <div class="modal fade" id="myModalRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	     	<div class="modal-dialog modal-dialog-centered  modal-lg">   
            <div class="modal-content">
                <div class="modal-header modal-header-warning">
								<style>
								.modal-header-warning {
	                          color:#fff;
                            padding:9px 15px;
                            border-bottom:1px solid #eee;
                            background-color: #ffcc00;
                            -webkit-border-top-left-radius: 5px;
                            -webkit-border-top-right-radius: 5px;
                            -moz-border-radius-topleft: 5px;
                            -moz-border-radius-topright: 5px;
                             border-top-left-radius: 5px;
                             border-top-right-radius: 5px;
                        }
								</style>
                    <h1><i class="glyphicon glyphicon-thumbs-up"></i> ¡Aviso Importante!</h1>
								
                </div>
                <div class="modal-body">
								<div class="container">
								  <br>
									<br>
									<br>
									<br>
									<br>
									<br>
                  <strong>
									Los datos datos ingresados para registrar una empresa, entraran en modalidad de "Solicitud", ya que, su Contador asignado, podra aprobar o rechazar dicha solicitud.
									</strong>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>

									<small>
									Nota: En caso de que su solicitud sea aprobada, su Empresa aparecera en su perfil de Empresas.
									
									</small>

                </div>                
                </div>
                <div class="modal-footer">
								<a class="btn btn-outline-danger btn-rounded my-3"  href="<?php echo base_url("Cliente");echo $session;?>">Regresar a Menu</a>
							  <button type="button" class="btn btn-outline-info btn-rounded my-3 pull-left" data-dismiss="modal">Entendido</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
		
		
		

		
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
					<input class"hidden" type="text" value="<?php echo $user;?>" name="id_usuario" id="id_usuario" class="form-control form-control-sm text-center" readonly>
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
				<div class="col-sm" style="text-align:center">
				      <div class="form-group">
							<br>
							<br>
			
							<input type="submit" value="Registrar Empresa" class="btn btn-warning" >
						 
					  </div>
				  </div>
			</form>

  		</div>
  	</div>
	

