<div class="container border rounded py-1">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <?php 
                foreach($clientes as $indice => $value  ):
            ?>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9 col-md-9 m-0 p-0">
                            <div class="container">
                                <div class="row">
                                    <div class="col-auto m-0 p-0" style="display:none;">
                                        <div class="form-group   p-1  ">
                                            <label class="small" for="id">id</label>
                                            <input type="text" value="<?php echo $value['id'];?>" name="id" class="form-control form-control-sm" readonly>
                                        </div>
                                    </div>
                                    <div class="col-auto m-0 p-0">
                                        <div class="form-group   p-1  ">
                                            <label class="small" for="nombre">Cliente</label>
                                            <input type="text" value="<?php echo $value['nombre'] ." " . $value['apellido'];?>" name="nombre" class="form-control form-control-sm" readonly>
                                        </div>
                                    </div>
                                    <div class="col-auto m-0 p-0">
                                        <div class="form-group   p-1  ">
                                            <label class="small" for="email">Email</label>
                                            <input type="text" value="<?php echo $value['email'];?>" name="email" class="form-control form-control-sm" readonly>
                                        </div>
                                    </div>
                                    <div class="col-auto m-0 p-0">
                                        <div class="form-group   p-1  ">
                                            <label class="small" for="telefono">Telefono</label>
                                            <input type="text" value="<?php echo $value['telefono'];?>" name="telefono" class="form-control form-control-sm" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <button type="button" class="btn btn-outline-primary btn-block" onclick="" > Ver Empresas </button>
                            <button type="button" class="btn btn-outline-warning btn-block"> Ver Boveda </button>
                        </div>
                    </div>
                </div>

            <?php 
                endforeach;
            ?>
        </div>
    </div>
</div>