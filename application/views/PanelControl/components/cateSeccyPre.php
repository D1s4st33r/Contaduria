<?php if($config=="addcategoria"): ?>
<div class=" col-md">
       <div class="form-group" style="float:left;">
       <label for="categoria"><b> nueva categoria</b></label>
       <input type="text" name="categoria" class="form-control-sm" id="categoria" >
       </div>
       <button type="button" class="btn btn-danger btn-sm" style="float:right;">cancelar</button>
       <button type="button" class="btn btn-primary btn-sm" style="float:right;">aceptar</button>
</div>
<?php endif; ?>

<?php if($config=="upcategoria"): ?>
<div class=" col-md">
       <div class="form-group" style="float:left;">
       <label for="categoria"><b> nuevo nombre</b></label>
       <input type="text" name="categoria" class="form-control-sm" id="categoria" value=<?php echo $catact; ?>>
       </div>
       <button type="button" class="btn btn-danger btn-sm" style="float:right;">cancelar</button>
       <button type="button" class="btn btn-primary btn-sm" style="float:right;">aceptar</button>
</div>
<?php endif; ?>

<?php if($config=="addseccion"): ?>
<div class=" col-md">
       <div class="form-group" style="float:left;">
       <label for="seccion"><b> nueva seccion</b></label>
       <input type="text" name="seccion" class="form-control-sm" id="seccion">
       </div>
       <button type="button" class="btn btn-primary btn-sm" style="">aceptar</button>
       <button type="button" class="btn btn-danger btn-sm" style="">cancelar</button>
</div>
<?php endif; ?>

<?php if($config=="upseccion"): ?>
<div class=" col-md">
       <div class="dropdown" style="float:left;">
       <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Secciones
       </button>
       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
       <a class="dropdown-item" href="#">Action</a>
       <a class="dropdown-item" href="#">Another action</a>
       <a class="dropdown-item" href="#">Something else here</a>
       </div>
       </div>
       <div class="form-group" style="float:left;">
       <label for="seccion"><b> nuevo nombre</b></label>
       <input type="text" name="seccion" class="form-control-sm" id="seccion">
       </div>
       <button type="button" class="btn btn-primary btn-sm" style="">aceptar</button>
       <button type="button" class="btn btn-danger btn-sm" style="">cancelar</button>
</div>
<?php endif; ?>

<?php if($config=="deleteseccion"): ?>
<div class=" col-md">
<div class="dropdown" style="float:left;">
       <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Secciones
       </button>
       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
       <a class="dropdown-item" href="#">Action</a>
       <a class="dropdown-item" href="#">Another action</a>
       <a class="dropdown-item" href="#">Something else here</a>
       </div>
       </div>
       <button type="button" class="btn btn-primary btn-sm" style="">aceptar</button>
       <button type="button" class="btn btn-danger btn-sm" style="">cancelar</button>
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
<div class=" col-md">
       <div class="form-group" style="float:left;">
       <label for="categoria"><b> nueva categoria</b></label>
       <input type="text" name="categoria" class="form-control-sm" id="categoria" >
       </div>
       <button type="button" class="btn btn-danger btn-sm" style="float:right;">cancelar</button>
       <button type="button" class="btn btn-primary btn-sm" style="float:right;">aceptar</button>
</div>
<?php endif; ?>