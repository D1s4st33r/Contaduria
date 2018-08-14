
<div class="col-12 "  >
    <style>
    #clienteReg{
        max-height: 400px;
        overflow: hidden;
        overflow-y: scroll;
    }
    </style>    

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
            <button  type="button" class="btn btn-primary" onclick="return AgregarCliente('<?php echo base_url("AgregarCliente").$session;?>')" >  <i class="fas fa-thumbs-up fa-md"></i> Registrar Cliente</button> 
            </div>
        </div>  
        </div>
    </div>
</div>
        