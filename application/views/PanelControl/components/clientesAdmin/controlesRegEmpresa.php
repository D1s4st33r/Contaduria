<div class="col-sm-12 col-md-4 col-lg-5 mr-auto">
    <p class="m-0 p-0 text-muted">
        <small>(Registrados)</small>
        <strong class="text-gray-dark">
        <i class="fas fa-hashtag"></i> <?php echo count($empresas);  ?>
    </strong>
    </p>
</div>
<div class="col-sm-12 col-md-6 ml-auto py-2">
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