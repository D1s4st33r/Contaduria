<div class="col-12 p-0">
  <div class="my-3 p-3 bg-white rounded box-shadow contenedor container">
    <div class="row">
    
      <div class="col-12 mb-1">
        <h4 class="p-2 bg-light text-dark"> 
          <i class="fas fa-user-edit fa-md"></i>  Actualizacion de Perfil
        </h4>
        <hr>
      </div>


      <div class=" col-sm col-md-6 col-lg-3 ">
        <div class="form-group">
          <label for="nombre"><b> Nombre</b></label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre'] ?>">
        </div>
      </div>

      <div class=" col-sm col-md-6 col-lg-3 ">
        <div class="form-group">
          <label for="apellido"><b> Apellido</b></label>
          <input type="text" name="apellido" class="form-control" id="apellido" value="<?php echo  $usuario['apellido']?>">
        </div>
      </div>

      <div class=" col-sm col-md-6 col-lg-3 ">
        <div class="form-group">
          <label for="email"><b> Email</b></label>
          <input type="mail" name="email" class="form-control" id="email" value="<?php echo $usuario['email']; ?>" >
        </div>
      </div>
      
      <div class=" col-sm col-md-6 col-lg-3 ">
        <div class="form-group">
          <label for="telefono"><b> Telefono</b></label>
          <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $usuario['telefono']; ?>">
        </div>
      </div>
      

      <div class=" col-12 ">
        <div class="form-group">
          <button  type="button" 
                   class="btn btn-primary" 
                   onclick="ActualizarPerfilCont();"> 
            <i class="fas fa-thumbs-up fa-md"></i> 
            Actualizar Datos
          </button> 
        </div>
      </div>
        <script>
          function ActualizarPerfilCont() 
          {
            nombre_ = $("#nombre").val();
            apellido_ = $("#apellido").val();
            telefono_ = $("#telefono").val();
            email_ = $("#email").val();

            post = {
                nombre: nombre_,
                apellido: apellido_,
                email: email_,
                telefono: telefono_
            };
            hacerCambiosPostAsy(post, '<?php echo base_url('ActualizarPerfilCont') . $session;?>', $("#perfil"));
            hacerCambio("TituloPanel", '<?php echo base_url('TituloPanelCont').$session; ?>');
          }
        </script>
      <br />
      <div class="col-12 mb-1">
        <h4 class="p-2 bg-light text-dark"> 
          <i class="fas fa-key fa-md"></i>  Cambiar Contraseña
        </h4>
        <hr>
      </div>
      
      <div class=" col-sm col-md-6 col-lg-3 ">
        <div class="form-group">
          <label for="claveActual"><b> Clave Actual</b></label>
          <input type="password" class="form-control" name="claveActual" id="claveActual" placeholder="<?php echo "********************"; ?>">
          
        </div>
      </div>
      <style>
        .inputError{border:1px solid red;}
        .inputSuccess{border:1px solid #45d14b;}
      </style>
      
      <div class=" col-sm col-md-6 col-lg-3 ">
        <div class="form-group">
          <label for="claveNueva"><b> Nueva Actual</b></label>
          <input type="password" class="form-control"  name="claveNueva" id="claveNueva" placeholder="<?php echo "********************"; ?>">
        </div>
      </div>

      <div class=" col-sm col-md-6 col-lg-3 ">
        <div class="form-group">
          <label for="claveRepetida"><b> Repita Clave Actual</b></label>
          <input type="password" class="form-control" name="claveRepetida" id="claveRepetida" placeholder="<?php echo "********************"; ?>">    
        </div>
      </div>
      <div class="col-12" >
        <p  class="p-0 m-0 text-left" id="msgPsw">
        </p>
      </div>
      <div class=" col-12 " id="restContra">
        <div class="form-group">
          <button  type="button" 
                   class="btn btn-primary" 
                   onclick="return CambiarPssd();"> <i class="fas fa-thumbs-up fa-md"></i>Actualizar Contraseña</button> 
        </div>
      </div>
<script>
 $("#claveNueva").keyup(function() 
 {
  if (
        $("#claveNueva").val() != "" &&
        $("#claveRepetida").val() != "" && 
        $("#claveNueva").val() === $("#claveRepetida").val()
      )
      {
        $("#claveNueva").removeClass('inputError');
        $("#claveRepetida").removeClass('inputError');

        $("#claveNueva").addClass('inputSuccess');
        $("#claveRepetida").addClass('inputSuccess');
        $("#msgPsw").removeClass('text-danger');
        $("#msgPsw").addClass('text-success');
        $("#msgPsw").html("");
      }else{
        $("#claveNueva").removeClass('inputSuccess');
        $("#claveRepetida").removeClass('inputSuccess');
        $("#claveNueva").addClass('inputError');
        $("#claveRepetida").addClass('inputError');
        $("#msgPsw").addClass('text-danger');
        $("#msgPsw").html("Contraseña invalida");
      }
 });
  $("#claveRepetida").keyup(function() {
    if(
         $("#claveActual").val() != ""
      && $("#claveNueva").val()  != ""
      )
    {
      if ($("#claveNueva").val() === $("#claveRepetida").val())
      {
        $("#claveNueva").removeClass('inputError');
            $("#claveRepetida").removeClass('inputError');

            $("#claveNueva").addClass('inputSuccess');
            $("#claveRepetida").addClass('inputSuccess');
            $("#msgPsw").removeClass('text-danger');
            $("#msgPsw").addClass('text-success');
            $("#msgPsw").html("");

      }else{
        $("#claveNueva").removeClass('inputSuccess');
        $("#claveRepetida").removeClass('inputSuccess');
        $("#claveNueva").addClass('inputError');
        $("#claveRepetida").addClass('inputError');
        $("#msgPsw").addClass('text-danger');
        $("#msgPsw").html("Contraseña invalida");
      }
    }
  });
  
    function CambiarPssd() {
      psw = $("#claveActual").val();
      nwpsw = $("#claveNueva").val();
      rpnwpsw = $("#claveRepetida").val();

      if (psw != "" && nwpsw != "" && rpnwpsw != "") {
        if (nwpsw === rpnwpsw) {
            $("#claveNueva").removeClass('inputError');
            $("#claveRepetida").removeClass('inputError');

            $("#claveNueva").addClass('inputSuccess');
            $("#claveRepetida").addClass('inputSuccess');
            $("#msgPsw").removeClass('text-danger');
            $("#msgPsw").addClass('text-success');

            post = {
                claveActual: psw,
                claveNueva: nwpsw,
                claveNuevaRep: rpnwpsw
            }
            hacerCambiosPostAsy(post,'<?php echo base_url('ResPaswd').$session;?>', $("#alertPerfil"));

            hacerCambio("perfil", '<?php echo base_url('PerfilConta').$session;?>');
        } else {
            $("#claveNueva").removeClass('inputSuccess');
            $("#claveRepetida").removeClass('inputSuccess');
            $("#claveNueva").addClass('inputError');
            $("#claveRepetida").addClass('inputError');
            $("#msgPsw").addClass('text-danger');
            $("#msgPsw").html("Contraseña Invalida")
        }
    }
    }



</script>


    </div>
  </div>
</div>
