
<div class="container" align="center">
	<div class="row">
		<div class="container">
		<?php 
		
				if(isset($error_login) && $error_login=='acceso'){
					echo '
					<div class="col m-2 p-2 ">
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Usuario o contraseña incorrecta!</strong> <br />Porfavor Trate de Nuevo
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>

					</div>
					';
				}
				if(isset($error_login) && $error_login=='tiempo'){
					echo '
					<div class="col m-2 p-2 ">
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Session Cerrada Por Inactividad</strong> <br />
							La sesion finalizo por que hubo un tiempo largo de inactividad.<br />
							Porfavor inicie sesion nueva mente
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>

					</div>
					';
				}
				if(isset($error_login) && $error_login=='session'){
					echo '
					<div class="col m-2 p-2 ">
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Error en la sesion</strong> <br />
							Porfavor inicie session nuevamente.<br />
							nota: Hubo un error en su sesi&oacute;n <br/> Regrese o inicie una nueva sesi&oacute;n
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>

					</div>
					';
				}
			?>
			<div class="col m-2 p-2 card text-white bg-dark mb-3 ">
				<form action="<?php echo base_url("IniciarSesion"); ?>" method="post" class="card-body" >
  					<div class="card-header">Iniciar Sesión</div>
					<div class="input-group p-1 input-group-md mb-2">
					
						<div class="input-group-prepend">
							<span class="input-group-text" id="Email">Email</span>
						</div>
						<input type="email" class="form-control" name="email" placeholder="email" aria-label="email" aria-describedby="Email"  required>
					</div>

					<div class="input-group p-1 mb-2 input-group-md">
						<div class="input-group-prepend">
							<span class="input-group-text" id="password">Contraseña</span>
						</div>
						<input type="password" class="form-control" name="clave" placeholder="password" aria-label="password" aria-describedby="Email" required>
					</div>
		
	
					<input type="submit" value="Entrar" class="btn btn-primary" >
					
				</form>
			</div>
		</div>	
	</div>
</div>
<style>
</style>
