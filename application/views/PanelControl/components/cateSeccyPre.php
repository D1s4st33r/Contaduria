<?php if($config=="cancelar"): ?>
<div hidden></div>
<?php endif; ?>

<?php if($config=="addcategoria"): ?>
<div class=" col-md">
       <div class="form-group" style="float:left;">
       <label for="categoria"><b> nueva categoria</b></label>
       <input type="text" name="categoria" class="form-control-sm" id="categoria" >
       </div>
       <button type="button" class="btn btn-danger btn-sm" style="float:right;" onclick="return  hacerCambio('config-categoria','<?php echo base_url("configCancelar").$session; ?>')">cancelar</button>
       <button type="button" class="btn btn-primary btn-sm" style="float:right;" onclick="return agregarCategoria('config-categoria','<?php echo base_url("addCategoria").$session; ?>')">aceptar</button>
</div>
<?php endif; ?>

<?php if($config=="upcategoria"): ?>
<div class=" col-md">
       <div class="form-group" style="float:left;">
       <label for="categoria"><b> nuevo nombre</b></label>
       <input type="text" name="categoria" class="form-control-sm" id="categoria" value=<?php echo $catact; ?>>
       </div>
       <button type="button" class="btn btn-danger btn-sm" style="float:right;" onclick="return  hacerCambio('config-categoria','<?php echo base_url("configCancelar").$session; ?>')">cancelar</button>
       <button type="button" class="btn btn-primary btn-sm" style="float:right;" onclick="return actualizarCategoria('panel-categoria','<?php echo base_url("updateCategoria").$session; ?>')">aceptar</button>
</div>
<?php endif; ?>

<?php if($config=="deletecategoria"): ?>
<div class=" col-md">
        <p><b>¿Eliminar esta categoria?</b></p>
       <button type="button" class="btn btn-primary btn-sm" onclick="return eliminarCategoria('panel-categoria','<?php echo base_url("deleteCategoria").$session; ?>')">aceptar</button>
       <button type="button" class="btn btn-danger btn-sm" onclick="return  hacerCambio('config-categoria','<?php echo base_url("configCancelar").$session; ?>')">cancelar</button>
</div>
<?php endif; ?>

<?php if($config=="addseccion"): ?>
<div class=" col-md">
       <div class="form-group" style="float:left;">
       <label for="seccion"><b> nueva seccion</b></label>
       <input type="text" name="seccion" class="form-control-sm" id="seccion">
       </div>
       <button type="button" class="btn btn-primary btn-sm" onclick="return agregarSeccion('panel-seccion','<?php echo base_url("addSeccion").$session; ?>')">aceptar</button>
       <button type="button" class="btn btn-danger btn-sm" onclick="return  hacerCambio('config-seccion','<?php echo base_url("configCancelar").$session; ?>')">cancelar</button>
</div>
<?php endif; ?>

<?php if($config=="upseccion"): ?>
<div class=" col-md">
<select class="custom-select" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
       <div class="form-group" style="float:left;">
       <label for="seccion"><b> nuevo nombre</b></label>
       <input type="text" name="seccion" class="form-control-sm" id="seccion">
       </div>
       <button type="button" class="btn btn-primary btn-sm" style="">aceptar</button>
       <button type="button" class="btn btn-danger btn-sm" onclick="return  hacerCambio('config-seccion','<?php echo base_url("configCancelar").$session; ?>')">cancelar</button>
</div>
<?php endif; ?>

<?php if($config=="deleteseccion"): ?>
<div class=" col-md">
<select class="custom-select" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
       <button type="button" class="btn btn-primary btn-sm" style="">aceptar</button>
       <button type="button" class="btn btn-danger btn-sm" onclick="return  hacerCambio('config-seccion','<?php echo base_url("configCancelar").$session; ?>')">cancelar</button>
</div>
<?php endif; ?>

<?php if($config=="addpregunta"): ?>
<div class=" col-md">
       <div class="form-group" style="float:left;">
       <label for="categoria"><b> nueva categoria</b></label>
       <input type="text" name="categoria" class="form-control-sm" id="categoria" >
       </div>
       <button type="button" class="btn btn-danger btn-sm" style="float:right;">cancelar</button>
       <button type="button" class="btn btn-primary btn-sm" style="float:right;">aceptar</button>
</div>
<?php endif; ?>

<?php if($config=="uppregunta"): ?>

<div class="container">
    <div class="row m-1 border rounded  pt-2 pb-2">
        
        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group input-group-sm">
            <label for="pregunta"><b>Pregunta</b></label>
            <input type="text" class="form-control" id="pregunta" name="pregunta">
            </div>
        </div>

        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group  input-group-sm">
            <label for="categoria"><b>Categoria</b></label>
            <select class="form-control" name="categoria" id="categoria">
                <option>Large select</option>
            </select>
            </div>
        </div>

        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group  input-group-sm">
            <label for="seccion"><b>Seccion</b></label>
            <select class="form-control " id="seccion" name="seccion">
                <option>Large select</option>
            </select>
            </div>
        </div>
        
        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group  input-group-sm">
            <label for="tipo"><b> Tipo</b></label>
            <select class="form-control" id="tipo" name="tipo">
                <option>Large select</option>
            </select>
            </div>
        </div>

        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
            <label for="archivo"><b>Solicita archivo</b></label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="archivo" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">Si</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="archivo" id="inlineRadio2" value="0">
                    <label class="form-check-label" for="inlineRadio2">No</label>
                </div>
            </div>
        </div>

        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
            <label for="obligatorio"><b> Obligatorio </b></label>
            <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="obligatorio" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="obligatorio" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
            </div>
        </div>

        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group input-group-sm">
            <label for="preOpcional"><b> Pregunta opcional </b></label>
            <input type="text" class="form-control" name="preOpcional" id="preOpcional" >
            </div>
        </div>
      

      <div class=" col-12 ">
        <div class="form-group">
        <button type="button" class="btn btn-primary btn-sm" style="">aceptar</button>
       <button type="button" class="btn btn-danger btn-sm" onclick="return  hacerCambio('config-seccion','<?php echo base_url("configCancelar").$session; ?>')">cancelar</button>
        </div>
      </div>  
    </div>
</div>
<?php endif; ?>