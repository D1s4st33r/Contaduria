<div class="col-lg align-items-center">
    <h6 class="lh-125 small text-muted p-2"> Registrados :  <?php echo $estadisticas["Contadores"];?></h6>
</div>
<div class="col-lg">
    <div class="container">
        <div class="row">
            <div class="col">
            <button type="button" class="btn  btn-outline-success btn-block" href="<?php echo base_url('ControlContadores').$session;?>" > Ver </button> 
            </div>
            <div class="col">
                <button type="button" class="btn btn-block btn-outline-primary" onclick="return hacerCambio('contadoresReg' ,'<?php echo base_url('FormularioContador').$session;?>')" > Agregar</button> 
            </div>
        </div>
    </div>
</div>