










	<form action="<?php echo base_url()."Login/ValidarRegistro"?>" id="solicitud" method="post" class="card-body" >
<h6 class="d-block">Para registrar una empresa nueva, necesita ingresar la clave que su Contador asignado le proporcionó con anterioridad. </h6>


  <div class="form-group mb-2">
<br>
<div class="alert alert-danger" role="alert" id="ClaveError" style="text-align:left;">
				<strong>¡Error!</strong>  Verifique que lo datos sean correctos
				<div class="list-errors"></div>
				<br>
				<p>Posibles Problemas:</p>
				<li>Clave Incorrecta</li>
				<li>La Clave debe tener 10 Carácteres</li>
        </div>

<br>

    <label for="staticEmail2" class="sr-only">Clave</label>
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Ingrese Clave">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Ingrese la clave</label>
    <input type="password" class="form-control" name="ClaveRegistro" id="ClaveRegistro" placeholder="(Ingrese clave de 10 digitos)">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Ir a Registro</button>
  <br>
  <h6>En caso de no tener una clave, debe solicitar una.</h6>
  
 
</form>