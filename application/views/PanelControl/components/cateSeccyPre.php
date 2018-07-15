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

<div class="container">
    <div class="row m-1 border rounded  pt-2 pb-2">
        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
            <label for="nombre"><b> Nombre</b></label>
            <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
        </div>

        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
            <label for="apellido"><b> Apellido</b></label>
            <input type="text" name="apellido" class="form-control" id="apellido" >
            </div>
        </div>

        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
            <label for="email"><b> Email</b></label>
            <input type="mail" name="email" class="form-control" id="email"  >
            </div>
        </div>
        
        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
            <label for="telefono"><b> Telefono</b></label>
            <input type="text" class="form-control" name="telefono" id="telefono" >
            </div>
        </div>
        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
            <label for="contrasena"><b> Contraseña </b></label>
            <input type="password" class="form-control" name="clave" id="contrasena" >
            </div>
        </div>
      

      <div class=" col-12 ">
        <div class="form-group">
        <button  type="button" class="btn btn-primary" onclick="return AgregarUsuario('<?php echo base_url("AgregarContador").$session;?>')" >  <i class="fas fa-thumbs-up fa-md"></i> Registrar Contador</button> 
        </div>
      </div>  
    </div>
</div>
<?php endif; ?>