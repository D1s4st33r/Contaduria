<?php
/**
 * Panel Perfil Admin
 */
$route['PanelDeControl']            = "Panel_Admin_Perfil/Perfil";
$route['FormularioParaActualizar']  = "Panel_Admin_Perfil/FormularioParaActualizar";
$route['ActualizarPerfil']          = "Panel_Admin_Perfil/ActualizarPerfil";
$route['RestPassAdmin']             = "Panel_Admin_Perfil/RestablecerContrasenaAdmin";
$route['soloVista']                 = 'Panel_Admin_Perfil/perfilVista';
$route['TituloPanel']               = 'Panel_Admin_Perfil/getTituloPanel';

/**
 * Panel Contadores Admin
 */
$route['ControlContadores']          = 'Panel_Admin_Contador/Contadores';
//contadores_crud_controles
$route['FormularioContador']         = 'Panel_Admin_Contador/FormularioEmpContador';
$route['AgregarContador']            = 'Panel_Admin_Contador/AgregarContador';
$route['ContadoresPorNombre']        = 'Panel_Admin_Contador/ContadoresPorNombre';
$route['ActualizarContador']         = 'Panel_Admin_Contador/ActualizarContador';
$route['EliminarContador']           = 'Panel_Admin_Contador/EliminarContador';
$route['ContadorCRUD']               = 'Panel_Admin_Contador/CrudContadorById';
$route['VerListaClientesAsignados']  = 'Panel_Admin_Contador/VerListaClientesAsignados';
//funciones en Cada Contador
$route['BuscadorClientesContadores'] = 'Panel_Admin_Contador/BuscadorClientesContadores';
$route['BuscadorContadoresEmpresas'] = 'Panel_Admin_Contador/BuscadorContadoresEmpresas';
$route['EliminarClienteDeContador']  = 'Panel_Admin_Contador/EliminarContadorCliente';
$route['EliminarEmpresaDeContador']  = 'Panel_Admin_Contador/EliminarContadorEmpresa';
$route['AsignarCliente']             = 'Panel_Admin_Contador/AsignarCliente';
$route['VerLinksContador']           = 'Panel_Admin_Contador/VerLinksContador';
$route['ClientesPorNombreContador']  = "Panel_Admin_Contador/ClientesPorNombreParaContadores";
$route['EmpresaByRazonSocial']       = "Panel_Admin_Contador/EmpresaByRazonSocial";
$route['AsignarEmpresaContador']     = "Panel_Admin_Contador/AsignarEmpresaContador";


/**
 * Panel Cuestionario Admin
 */
$route['ConfPreguntas']         = 'Panel_Admin_Formulario/configuracionPreguntas';
$route['viewCategorias']        = "Panel_Admin_Formulario/getPanelCategorias";
$route['viewSeccyPre']          = "Panel_Admin_Formulario/getPanelSeccyPre";
$route['viewPreguntas']         = "Panel_Admin_Formulario/cancelarPregunta";
$route['configCancelar']        = "Panel_Admin_Formulario/configCancelar";
$route['configAddCategoria']    = "Panel_Admin_Formulario/configAddCategoria";
$route['addCategoria']          = "Panel_Admin_Formulario/addCategoria";
$route['configUpdateCategoria'] = "Panel_Admin_Formulario/configUpCategoria";
$route['updateCategoria']       = "Panel_Admin_Formulario/updateCategoria";
$route['configDeleteCategoria'] = "Panel_Admin_Formulario/configDelCategoria";
$route['deleteCategoria']       = "Panel_Admin_Formulario/deleteCategoria";
$route['configAddSeccion']      = "Panel_Admin_Formulario/configAddSeccion";
$route['addSeccion']            = "Panel_Admin_Formulario/addSeccion";
$route['configUpSeccion']       = "Panel_Admin_Formulario/configUpSeccion";
$route['configDeleteSeccion']   = "Panel_Admin_Formulario/configDelSeccion";
$route['configUpdatePregunta']  = "Panel_Admin_Formulario/configUpPregunta";
$route['addPregunta']="Panel_Admin_Formulario/addPregunta";
$route['upPregunta']            = "Panel_Admin_Formulario/updatePregunta";
$route['configDelPregunta']     = "Panel_Admin_Formulario/configDelPregunta";
$route['deletePregunta']        = "Panel_Admin_Formulario/deletePregunta";

/**
 * Panel Cliente Admin
 */
$route['ClienteControl']                = 'Panel_Admin_Cliente/Clientes';
$route['FormularioCliente']             = 'Panel_Admin_Cliente/FormularioClientes';
$route['ClientesPorNombre']             = "Panel_Admin_Cliente/ClientesPorNombre";
$route['AgregarCliente']                = 'Panel_Admin_Cliente/AgregarCliente';
$route['ActualizarCliente']             = 'Panel_Admin_Cliente/ActualizarCliente';
$route['empresasClie']                  = "Panel_Admin_Cliente/getEmpresas";
$route['EliminarCliente']               = 'Panel_Admin_Cliente/EliminarCliente';
$route['AsignarContadorFormulario']     = 'Panel_Admin_Cliente/AsignarContadorFormulario';
$route['BuscadorContador']              = "Panel_Admin_Cliente/BuscadorContador";
$route['AsignarContadorACliente']       = "Panel_Admin_Cliente/AsignarContadorACliente";
$route['RegistrarEmpresaCliente']       = 'Panel_Admin_Cliente/RegistrarEmpresaCliente';
$route['ActualizarEmpresa']             = "Panel_Admin_Cliente/ActualizarEmpresa";
$route['FormularioClienteEmpresa']      = 'Panel_Admin_Cliente/FormularioClienteEmpresa';
$route['EliminarEmpresa']               = "Panel_Admin_Cliente/EliminarEmpresa";
$route['ClienteCRUD']                   = 'Panel_Admin_Cliente/CRUDByCliente';
$route['ClienteContadorAsignadoLink']   = 'Panel_Admin_Cliente/ClienteContadorAsignadoLink';
$route['ListaContadorCliente']          = "Panel_Admin_Cliente/ListaContadorCliente";
$route['ListaContadorEmpresa']          = "Panel_Admin_Cliente/ListaContadorEmpresa";
$route['AsignarContadorFormularioEmpresa']     = 'Panel_Admin_Cliente/AsignarContadorFormularioEmpresa';
$route['AsignarContadorAEmpresa']       = "Panel_Admin_Cliente/AsignarContadorAEmpresa";
$route['EliminarContadorEmpresa']  = 'Panel_Admin_Cliente/EliminarContadorEmpresa';
$route['EliminarContadorCliente']  = 'Panel_Admin_Cliente/EliminarContadorCliente';

/**
 * BovedaAdmin
 */
$route['BovedaAdmin'] = 'Panel_Admin_Boveda/Boveda';
$route['BovedaLoadFolder'] = 'Panel_Admin_Boveda/CargarCarpeta';
$route['BovedaCrearCarpeta'] = 'Panel_Admin_Boveda/BovedaCrearCarpeta';
$route['BovedaSubirArchivo'] = 'Panel_Admin_Boveda/BovedaSubirArchivo';
