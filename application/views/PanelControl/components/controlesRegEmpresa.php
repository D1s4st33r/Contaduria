<div class="row">
    <div class="col-sm-12 col-md-12 align-items-center">
        <h6 class="lh-125 small text-muted p-2"> Registrados :  <?php echo count($empresas);?></h6>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="container">
            <div class="row">
                <div class="col">
                <a href="#" onclick="return hacerCambio('empresasClie','<?php echo base_url("empresasClie").$session."&cliente=".$id_cliente;?>')" > Ver</a>                    
                </div>
                <div class="col">
                    <a  type="button" class="btn btn-sm btn-primary btn-block text-white" onclick="return hacerCambio('empresasClie' ,'<?php echo base_url('FormularioClienteEmpresa').$session;?>')" > Agregar</a> 
                </div>
            </div>
        </div>
    </div>
</div>