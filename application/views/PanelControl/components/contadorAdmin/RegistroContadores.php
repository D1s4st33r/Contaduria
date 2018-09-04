
<div class="container">
    <div class="row m-1 contenedorInter rounded  pt-2 pb-2">
        
        <div class=" col-sm-12 col-md-12 col-lg-12 ">
            <h4><i class="text-muted">Nuevo Contador</i></h4>
        </div>
        
        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
                <label for="nombre" class="small disable m-0"> Nombre</label>
                <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" placeholder="Nombre del Contador">
            </div>
        </div>
        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
            <label for="apellido" class="small disable m-0"> Apellidos</label>
            <input type="text" name="apellido" class="form-control  form-control-sm" id="apellido" placeholder="Apellidos del Contador" >
            </div>
        </div>

        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
            <label for="email" class="small disable m-0"> Email</label>
            <input type="mail" name="email" class="form-control  form-control-sm" id="email" placeholder="Correo para Contador"  >
            </div>
        </div>
        
        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
            <label for="telefono" class="small disable m-0"> Telefono</label>
            <input type="text" class="form-control  form-control-sm" name="telefono" id="telefono" placeholder="telefono" >
            </div>
        </div>
        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
            <label for="contrasena" class="small disable m-0"> Contraseña </label>
            <input type="password" class="form-control  form-control-sm" name="clave" id="contrasena" placeholder="***********" >
            </div>
        </div>
      

      <div class=" col-12 ">
        <div class="form-group">
        <button  type="button" class="btn btn-outline-primary" onclick="return agregarContador('<?php echo base_url("AgregarContador").$session;?>'); " >  <i class="fas fa-thumbs-up fa-md"></i> Registrar Contador</button> 
        </div>
      </div>  
    </div>
</div>
      
        