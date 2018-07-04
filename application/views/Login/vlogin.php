
<div class="container" align="center">
<form action="<?php echo base_url()."Login/ingresoLogin" ?>" method="post">
	<br>
	<h2 class="form__titulo">Iniciar Sesión</h2>
		<br>
		<table>
		<div class="form-group">
		<tr><td><b class="etiqueta">Email</b></td><td><input type="email" name="email" placeholder="Email" class="entrada" required></TD></tr>
		</div>
		
		<div class="form-group">
		<tr><td><b class="etiqueta">Contraseña</b></td><td><input type="password" name="clave" placeholder="Contraseña" class="entrada" required></td></tr>
		</div>
		</table>
		<br><br>
		<input type="submit" value="Entrar" class="btn btn-primary" >
		<br><br>
		<p class="form__link">¿Aun no tienes una cuenta? <a href="">Has click aqui</a></p>
	</div>
	</form>
	</div>
	