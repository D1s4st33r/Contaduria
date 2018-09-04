<div class="col-sm-12 col-md-4 col-lg-5 mr-auto">
    <p class="m-0 p-0 text-muted">
        <small>(Registrados)</small>
        <strong class="text-gray-dark">
        <i class="fas fa-hashtag"></i> <?php echo $estadisticas["Contadores"];  ?>
    </strong>
    </p>
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