<form action="<?php echo base_url()."Login/ValidarRegistro"?>" class="form-inline" id="solicitud">
<h6 class="d-block">Para registrar una empresa nueva, necesita ingresar la clave que su Contador asignado le proporcionó con anterioridad. </h6>


  <div class="form-group mb-2">
  <br>
<br>
<br>
<br>
<br>
<br>

    <label for="staticEmail2" class="sr-only">Clave</label>
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Ingrese Clave">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Ingrese la clave</label>
    <input type="password" class="form-control" name="ClaveRegistro" id="ClaveRegistro" placeholder="Ingrese su clave">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Ir a Registro</button>
  <br>
  <h6>En caso de no tener una clave, debe solicitar una.</h6>
  <br>
 
</form>