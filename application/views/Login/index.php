
<div class="container" align="center">
	<div class="row">
		<div class="container">
			<div class="col m-2 p-2 card text-white bg-dark mb-3 ">
				<form action="<?php echo base_url()."Login/IniciarSesion" ?>" method="post" class="card-body" >
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
						<input type="password" class="form-control" name="password" placeholder="password" aria-label="password" aria-describedby="Email" required>
					</div>
		
	
					<input type="submit" value="Entrar" class="btn btn-primary" >
					
					<p class="form__link">¿Aun no tienes una cuenta? <a href="">Has click aqui</a></p>
				</form>
			</div>
		</div>	
	</div>
</div>
