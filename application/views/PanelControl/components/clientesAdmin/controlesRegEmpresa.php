<div class="row">
    <div class="col-sm-12 col-md-6 align-items-center">
        <h6 class="lh-125 small text-muted p-2"> Registrados :  <?php echo count($empresas);?></h6>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="container">
            <div class="row">
                <div class="col">
                <button type="button"  class="btn btn-outline-success btn-block "onclick="return hacerCambio('empresasClie','<?php echo base_url('empresasClie').$session;?>')" > Ver</a>                    
                </div>
                <div class="col">
                    <button type="button" class="btn btn-outline-primary btn-block " onclick="return hacerCambio('empresasClie' ,'<?php echo base_url('FormularioClienteEmpresa').$session;?>')" > Agregar</a> 
                </div>
            </div>
        </div>
    </div>
</div>