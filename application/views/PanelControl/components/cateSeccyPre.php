<?php if($config=="cancelar"): ?>
<div hidden></div>
<?php endif; ?>

<?php if($config=="addcategoria"): ?>
<div class=" col-md">
       <div class="form-group" style="float:left;">
       <label for="categoria"><b> nueva categoria</b></label>
       <input type="text" name="categoria" class="form-control-sm" id="categoria" >
       </div>
       <button type="button" class="btn btn-danger btn-sm" style="float:right;" onclick="return  hacerCambio('config-categoria','<?php echo base_url("configCancelar").$session; ?>')">cerrar</button>
       <button type="button" class="btn btn-primary btn-sm" style="float:right;" onclick="agregarCategoria('config-categoria','<?php echo base_url("addCategoria").$session.'&cat='.strtoupper($categoria); ?>'); hacerCambio('config-categoria','<?php echo base_url("configCancelar").$session; ?>')">aceptar</button>
</div>
<?php endif; ?>

<?php if($config=="upcategoria"): ?>
<div class=" col-md">
       <div class="form-group" style="float:left;">
       <label for="categoria"><b> nuevo nombre</b></label>
       <input type="text" name="categoria" class="form-control-sm" id="categoria" value=<?php echo $categoria; ?>>
       </div>
       <button type="button" class="btn btn-danger btn-sm" style="float:right;" onclick="return  hacerCambio('config-categoria','<?php echo base_url("configCancelar").$session; ?>')">cerrar</button>
       <button type="button" class="btn btn-primary btn-sm" style="float:right;" onclick="actualizarCategoria('panel-categoria','<?php echo base_url("updateCategoria").$session.'&cat='.strtoupper($categoria); ?>');hacerCambio('config-categoria','<?php echo base_url("configCancelar").$session; ?>')">aceptar</button>
</div>
<?php endif; ?>

<?php if($config=="deletecategoria"): ?>
<div class=" col-md">
        <p><b>¿Eliminar esta categoria?</b></p>
       <button type="button" class="btn btn-primary btn-sm" onclick="eliminarCategoria('panel-categoria','<?php echo base_url("deleteCategoria").$session.'&cat='.strtoupper($categoria); ?>');hacerCambio('config-categoria','<?php echo base_url("configCancelar").$session; ?>')">aceptar</button>
       <button type="button" class="btn btn-danger btn-sm" onclick="return  hacerCambio('config-categoria','<?php echo base_url("configCancelar").$session; ?>')">cerrar</button>
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
<select class="custom-select" id="seccion" name="seccion">
<?php
            foreach ($secciones as $ind=>$val)
            {
                echo "<option value='".$val['id']."'>".strtoupper($val['seccion'])."</option>";
            }
?>
  </select>
       <div class="form-group" style="float:left;">
       <label for="seccion"><b> nuevo nombre</b></label>
       <input type="text" name="nombre" class="form-control-sm" id="nombre">
       </div>
       <button type="button" class="btn btn-primary btn-sm" onclick="return  actualizarSeccion('config-seccion','<?php echo base_url("updateSeccion").$session; ?>')">aceptar</button>
       <button type="button" class="btn btn-danger btn-sm" onclick="return  hacerCambio('config-seccion','<?php echo base_url("configCancelar").$session; ?>')">cancelar</button>
</div>
<?php endif; ?>

<?php if($config=="deleteseccion"): ?>
<div class=" col-md">
<label for="id"><b>Eliminar Seccion</b></label>
<select class="custom-select" id="id" name="id">
<?php
            foreach ($secciones as $ind=>$val)
            {
                echo "<option value='".$val['id']."'>".strtoupper($val['seccion'])."</option>";
            }
?>
  </select>
       <button type="button" class="btn btn-primary btn-sm" onclick="return eliminarSeccion('panel-seccion','<?php echo base_url("deleteSeccion").$session; ?>')">aceptar</button>
       <button type="button" class="btn btn-danger btn-sm" onclick="return  hacerCambio('config-seccion','<?php echo base_url("configCancelar").$session; ?>')">cancelar</button>
</div>
<?php endif; ?>

<?php if($config=="addpregunta"): ?>
<?php endif; ?>

<?php if($config=="uppregunta"): ?>

<div class="container">
    <div class="row m-1 border rounded  pt-2 pb-2">
        
        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group input-group-sm">
            <label for="pregunta"><b>Pregunta</b></label>
            <input type="text" class="form-control" id="pregunta" name="pregunta" value="<?php echo $pregunta['texto'] ?>">
            </div>
        </div>

        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group  input-group-sm">
            <label for="categoria"><b>Categoria</b></label>
            <select class="form-control" name="categoria" id="categoria" value="<?php echo $pregunta['categoria'] ?>">
            <?php
             echo '<option>'.strtoupper($pregunta['categoria']).'</option>';
            foreach ($categorias as $ind=>$val)
            {
                echo '<option>'.strtoupper($val['categoria']).'</option>';
            }
                ?>
            </select>
            </div>
        </div>

        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group  input-group-sm">
            <label for="seccion"><b>Seccion</b></label>
            <select class="form-control " id="seccion" name="seccion" value="<?php echo $pregunta['seccion'] ?>">
            <?php
            echo '<option>'.strtoupper($pregunta['seccion']).'</option>';
            foreach ($secciones as $ind2=>$val2)
            {
                echo '<option>'.strtoupper($val2['seccion']).'</option>';
            }
                ?>
            </select>
            </div>
        </div>
        
        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group  input-group-sm">
            <label for="tipo"><b> Tipo</b></label>
            <select class="form-control" id="tipo" name="tipo" value="<?php echo $detalles['tipo'] ?>">
            <?php
            echo '<option>'.strtoupper($detalles['tipo']).'</option>';
            foreach ($catalogo as $ind3=>$val3)
            {
                echo '<option>'.strtoupper($val3['tipo']).'</option>';
            }
                ?>
            </select>
            </div>
        </div>

        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
            <label for="archivo"><b>Solicita archivo</b></label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="archivo" id="inlineRadio1" value="1" <?php if($detalles['soliarchivo']==1){echo 'checked';} ?>>
                    <label class="form-check-label" for="inlineRadio1">Si</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="archivo" id="inlineRadio2" value="0" <?php if($detalles['soliarchivo']==0){echo 'checked';} ?>>
                    <label class="form-check-label" for="inlineRadio2">No</label>
                </div>
            </div>
        </div>

        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
            <label for="obligatorio"><b> Obligatorio </b></label>
            <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="obligatorio" id="inlineRadio1" value="1" <?php if($detalles['obligatorio']==1){echo 'checked';} ?>>
                        <label class="form-check-label" for="inlineRadio1">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="obligatorio" id="inlineRadio2" value="0" <?php if($detalles['obligatorio']==0){echo 'checked';} ?>>
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
            </div>
        </div>

        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group input-group-sm">
            <label for="preOpcional"><b> Pregunta opcional </b></label>
            <input type="text" class="form-control" name="preOpcional" id="preOpcional" value="<?php echo $detalles['preguntaOpcional'] ?>">
            </div>
        </div>

        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group  input-group-sm">
            <label for="tipo"><b> Tipo pregunta opcional</b></label>
            <select class="form-control" id="tipoOpc" name="tipoOpc" value="<?php echo $detalles['tipo'] ?>">
            <?php
            echo '<option>'.strtoupper($detalles['tipoPreOpcional']).'</option>';
            foreach ($catalogo as $ind4=>$val4)
            {
                echo '<option>'.strtoupper($val4['tipo']).'</option>';
            }
                ?>
            </select>
            </div>
        </div>
      

      <div class=" col-12 ">
        <div class="form-group">
        <button type="button" class="btn btn-primary btn-sm" onclick="return  actualizarPregunta('panel-pregunta<?php echo $id ?>','<?php echo base_url("upPregunta").$session; ?>')" >aceptar</button>
       <button type="button" class="btn btn-danger btn-sm" onclick="return  hacerCambio('config-pregunta<?php echo $id ?>','<?php echo base_url("configCancelar").$session; ?>')">cancelar</button>
        </div>
      </div>  
    </div>
</div>
<?php endif; ?>

<?php if($config=="deletepregunta"): ?>
<div class=" col-md">
        <p><b>¿Eliminar esta pregunta?</b></p>
       <button type="button" class="btn btn-primary btn-sm" onclick="return eliminarPregunta('panel-pregunta<?php echo $id ?>','<?php echo base_url("deletePregunta").$session; ?>')">aceptar</button>
       <button type="button" class="btn btn-danger btn-sm" onclick="return  hacerCambio('config-pregunta<?php echo $id ?>','<?php echo base_url("configCancelar").$session; ?>')">cancelar</button>
</div>
<?php endif; ?>