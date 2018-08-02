<?php 

switch ($error) {
    case 'ErrorChngPswd':
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error de Contraseñas!</strong> Introduzca los datos correctos para proceder con la acción.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        break;
        case 'ChgPerfil':
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Valores Nulos!</strong> <br />Introduzca los datos correctos para proceder con la acción.
                <br />No Puede Cambiar la Informacion por valores Vacios.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        break;
        case 'CambioPerfil':
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> Cambio Actualizados </strong>
                <br /> los cambios se han realizado Correctamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        break;
        case 'pswHecho':
            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> Contrasena Actualizada </strong>
                    <br /> los cambios se han realizado Correctamente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        break;
    default:
        # code...
        break;
}