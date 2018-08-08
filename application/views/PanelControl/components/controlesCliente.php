<div class="col-lg align-items-center">
    <h6 class="lh-125 small text-muted p-2"> Registrados :  <?php echo $estadisticas["Contadores"];?></h6>
</div>
<div class="col-lg">
    <div class="container">
        <div class="row">
            <div class="col">
                <a  type="button" class="btn btn-sm btn-success btn-block text-white" href="<?php echo base_url('ControlContadores').$session;?>" > Ver </a> 
            </div>
            <div class="col">
                <a  type="button" class="btn btn-sm btn-primary btn-block text-white" onclick="return hacerCambio('contadoresReg' ,'<?php echo base_url('FormularioContador').$session;?>')" > Agregar</a> 
            </div>
        </div>
    </div>
</div>