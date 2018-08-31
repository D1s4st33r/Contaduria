  <div class="col-sm-12 col-md-3 col-lg-3 ml-auto pb-3">
    <button type="button" 
        class="btn btn-outline-primary btn-block btn-sm"
        onclick="return hacerCambio('empresasClie','<?php echo base_url('EmpresasDelCliente').$session;?>')"
        title="AgregarEmpresas" > 
        Ver
    </button>                    
</div>

<div class="col-12 p-2">
    <h5>
        <strong class="text-muted">
        Registro de Empresas
        </strong>
    </h5>
</div>
<div class="container p-0 ">
    <div class="row">
        <div class="col-12  ">
        
            <div class="alert alert-danger" role="alert" id="error" style="text-align:left;<?php echo  (isset($error) && $error) ?"":'display:none;';?>">
                <strong>Error de Registro</strong>  Verifique que lo datos sean correctos
                <div class="list-errors"></div>
                <br>
                <p>Posibles Problemas:</p>
                <li>El RFC ya ha sido registrado o es invalido</li>
                <li>Correo invalido o ya ha sido registrado</li>
            </div>
            <div class="container contenedorInter rounded py-2">
            <form  id="RegistrarEmpresaCont">
                <div class="row">
                    
                    <div class="col-sm-12 col-md-auto">
                        <div class="form-group">
                        <label for="idCliente"> Cliente</label>
                        <input type="hidden" class="form-control form-control-sm" name="id_usuario" id="idCliente" aria-describedby="idCliente" required="required" value="<?php echo $id_cliente?>" readonly >
                        <input type="text" class="form-control form-control-sm" name="nombreCliente" id="nombreCliente" aria-describedby="nombreCliente" value="<?php echo $nombreCompletoCliente?>" readonly >
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-auto">
                        <div class="form-group">
                        <label for="razonSocial">Razón Social</label>
                        <input type="text" class="form-control form-control-sm"  name="razonSocial" id="razonSociald" aria-describedby="razonSocial" placeholder="Mi empresa SA de CV" required="required" value="<?php echo (isset($formulario['razonSocial'])) ? $formulario['razonSocial']:""?>">
                        <small id="razonSocial" class="form-text text-muted">Ejemplo: <i>Mi empresa SA de CV</i></small>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-auto">
                        <div class="form-group">
                        <label for="rfc">RFC</label>
                        <input type="text" class="form-control form-control-sm"  name="rfc" id="rfcd" placeholder="RFC" required="required" maxlength="13" value="<?php echo (isset($formulario['rfc'])) ? $formulario['rfc']:""?>">
                        </div>
                    </div>
                
                    <div class="col-sm-12 col-md-auto">
                        <div class="form-group">
                        <label for="domicilio">Domicilio</label>
                        <input type="text" class="form-control form-control-sm"  name="domicilio" id="domiciliod" aria-describedby="domicilio" placeholder="SM 100 MZ 123 LT 123 CALLE 23 CP 775656" required="required" value="<?php echo (isset($formulario['domicilio'])) ? $formulario['domicilio']:""?>">
                        <small id="domicilio" class="form-text text-muted">Ejemplo: <i>SM 100 MZ 123 LT 123 CALLE 23 CP 775656</i></small>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-auto">
                        <div class="form-group">
                        <label for="correo">Email</label>
                        <input type="email" class="form-control form-control-sm"  name="correo" id="correod" aria-describedby="emailHelp" placeholder="miemail@gmail.com" required="required" value="<?php echo (isset($formulario['correo'])) ? $formulario['correo']:""?>">
                        <small id="correo" class="form-text text-muted">miemail@gmail.com</small>
                        </div>
                    </div>
                
                    <div class="col-sm-12 col-md-auto">
                        <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="number" class="form-control form-control-sm"  name="telefono" id="telefonod" aria-describedby="Telefono" placeholder="99 88 23 23 23" required="required" value="<?php echo (isset($formulario['telefono'])) ? $formulario['telefono']:""?>">
                        <small id="Telefono" class="form-text text-muted">Ejemplo: <i>99 88 23 23 23</i></small>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-auto">
                        <div class="form-group">
                        <label for="RepresentanteLegal">Representante Legal</label>
                        <input type="text" class="form-control form-control-sm"  name="representantelegal" id="representantelegald" placeholder="Nombre de representate legal" required="required" value="<?php echo (isset($formulario['representantelegal'])) ? $formulario['representantelegal']:""?>">
                        </div>
                    </div>
                
                    <div class="col-sm-12 col-md-auto">
                        <div class="form-group">
                        <label for="RepresentanteLegal">Telefono de Representante Legal</label>
                        <input type="number" class="form-control form-control-sm"  name="telrepresentante" id="telrepresentanted" placeholder="Telefono Representate Legal " required="required" value="<?php echo (isset($formulario['telrepresentante'])) ? $formulario['telrepresentante']:""?>">
                        </div>
                    </div>

                    <div class="col-sm" style="text-align:center">
                        <div class="form-group">
                            <button type="button"  class="btn btn-warning" onclick="registrarEmpresaCont('<?php echo base_url('RegistrarEmpresaClienteCont').$session?>');" >
                            Registrar Empresa
                            </button>
                        </div>
                    </div>
                </div>
            </form>
      
            </div>

                  <script>

             function registrarEmpresaCont(url)
             {
                 var piv = true;
                 var post = {};
                $.each($("#RegistrarEmpresaCont")[0].elements, function(){ 
                    if($(this).val() == "" && $(this).attr("type") != "button" )
                    {
                        piv=false;
                        $(this).addClass("error");
                        $(this).keyup(function() 
                        {
                            if($(this).val() == "")
                            {   
                                $(this).addClass("error");
                            }else{
                                $(this).removeClass('error');
                            }
                        });
                        console.log($(this).attr("type"));
                    }else{
                        
                        post[$(this).attr("name")] = $(this).val();
                        $(this).removeClass('error');
                    }
                    
                    });
                    if(piv){
                        hacerCambiosPostAsy(post, url, $("#empresasClie"));
                    }
                    
            } 
</script>
<style>
.defaultInput
    {
     width: 100px;
     height:25px;
     padding: 5px;
    }

.error
{
 border:1px solid red;
}
</style>
        </div>
    </div>  
</div>