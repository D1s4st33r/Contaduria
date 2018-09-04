
<div class="col-12 "  >
    <style>
    #clienteReg{
        max-height: 400px;
        overflow: hidden;
        overflow-y: scroll;
    }
    </style>    

    
<div class="container">
    <div class="row m-1 contenedorInter rounded  pt-2 pb-2">
        <div class=" col-sm-12 col-md-12 col-lg-12 ">
            <h4><i class="text-muted">
                Nuevo Cliente
            </i></h4>
        </div>
        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
                <label for="nombre" class="small disable m-0"> Nombre</label>
                <input type="text" class="form-control form-control-sm" id="nombre" name="nombre">
            </div>
        </div>
        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
            <label for="apellido" class="small disable m-0"> Apellido</label>
            <input type="text" name="apellido" class="form-control  form-control-sm" id="apellido" >
            </div>
        </div>

        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
            <label for="email" class="small disable m-0"> Email</label>
            <input type="mail" name="email" class="form-control  form-control-sm" id="email"  >
            </div>
        </div>
        
        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
            <label for="telefono" class="small disable m-0"> Telefono</label>
            <input type="text" class="form-control  form-control-sm" name="telefono" id="telefono" >
            </div>
        </div>
        <div class=" col-sm col-md-6 col-lg-3 ">
            <div class="form-group">
            <label for="contrasena" class="small disable m-0"> Contraseña </label>
            <input type="password" class="form-control  form-control-sm" name="clave" id="contrasena" >
            </div>
        </div>
      


        <div class=" col-12 ">
            <div class="form-group">
            <button  type="button" class="btn btn-outline-primary" onclick="return AgregarCliente('<?php echo base_url("AgregarCliente").$session;?>')" >  <i class="fas fa-thumbs-up fa-md"></i> Registrar Cliente</button> 
            </div>
        </div>  
        </div>
    </div>
</div>
        