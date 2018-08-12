<div class="container">

    <div class="row  rounded py-2">
    <div class="col-12 text-right">
        <a href="#contador<?php echo $idContador;?>" class="text-muted pr-3" onclick="hacerCambio('contador<?php echo $idContador;?>','<?php echo base_url("VerLinksContador").$session."&idContador=".$idContador;  ?>');"> <i class="fas fa-eye-slash"></i> </a>
    </div>   
    <div class="col-12 p-0 m-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-left"> Clientes Asignados</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
        <?php   
            if($clientes):
        ?>
            <?php 
                foreach($clientes as $indice => $value  ):
            ?>
            
                <div class="container">
                    <div class="row p-1 my-1 rounded contenedorInter">
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
                        <div class="col-sm-12 col-md-3 align-self-center">
                            <div class="container">
                                <div class="row ">
                                    <div class="col-auto">
                                        <a   href=""> Ver en clientes </a>
                                    </div>
                                    <div class="col-auto">
                                        <a   href=""> Ver Boveda </a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            <?php 
                endforeach;
            ?>
         <?php   
        else:
        ?>
            <div class="container">
                <div class="row p-1 my-1 rounded border">        
                    <div class="col-12">
                        Sin clientes Asignados
                    </div>
                </div>
            </div>
        <?php   
        endif;
        ?>
        </div>
            
        <div class="col-12 p-0 m-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-left"> Auxiliando</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
        <?php   
            if($auxiliando):
        ?>
            <?php   
                foreach($auxiliando as $indice => $value  ):
            ?>
            
                <div class="container">
                    <div class="row p-1 my-1 contenedorInter rounded ">
                        <div class="col-sm-9 col-md-9 m-0 p-0">
                            <div class="container">
                                <div class="row">
                                    <div class="col-auto m-0 p-0" style="display:none;">
                                        <div class="form-group   p-1  ">
                                            <label class="small" for="rfc">RFC</label>
                                            <input type="text" value="<?php echo $value['rfc'];?>" name="id" class="form-control form-control-sm" readonly>
                                        </div>
                                    </div>
                                    <div class="col-auto m-0 p-0">
                                        <div class="form-group   p-1  ">
                                            <label class="small" for="razonSocial">razonSocial</label>
                                            <input type="text" value="<?php echo $value['razonSocial'];?>" name="razonSocial" class="form-control form-control-sm" readonly>
                                        </div>
                                    </div>
                                    <div class="col-auto m-0 p-0">
                                        <div class="form-group   p-1  ">
                                            <label class="small" for="domicilio">Dom.</label>
                                            <input type="text" value="<?php echo $value['domicilio'];?>" name="domicilio" class="form-control form-control-sm" readonly>
                                        </div>
                                    </div>
                                    <div class="col-auto m-0 p-0">
                                        <div class="form-group   p-1  ">
                                            <label class="small" for="email">Email</label>
                                            <input type="text" value="<?php echo $value['correo'];?>" name="email" class="form-control form-control-sm" readonly>
                                        </div>
                                    </div>
                                    <div class="col-auto m-0 p-0">
                                        <div class="form-group   p-1  ">
                                            <label class="small" for="RepLegal">Rep. Legal</label>
                                            <input type="text" value="<?php echo $value['representantelegal'];?>" name="representantelegal" class="form-control form-control-sm" readonly>
                                        </div>
                                    </div>
                                    <div class="col-auto m-0 p-0">
                                        <div class="form-group   p-1  ">
                                            <label class="small" for="telRepLegal">Tel. Rep. Legal</label>
                                            <input type="text" value="<?php echo $value['telrepresentante'];?>" name="telrepresentante" class="form-control form-control-sm" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 align-self-center">
                            <div class="container">
                                <div class="row ">
                                    <div class="col-auto">
                                        <a   href=""> Ver Empresas </a>
                                    </div>
                                    <div class="col-auto">
                                        <a   href=""> Ver Boveda </a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            <?php 
                endforeach;
            ?>
        <?php   
        else:
        ?>
            <div class="container">
                <div class="row p-1 my-1 rounded border">        
                    <div class="col-12">
                        Sin empresas Asignadas
                    </div>
                </div>
            </div>
        <?php   
        endif;
        ?>
        </div>

    </div>
</div>