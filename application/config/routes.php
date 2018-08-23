<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Inicio de Aplicación
$route['default_controller']    = 'Login';

//Aqui Van los Routes del Panel Admin 
require_once(APPPATH.'config'.DIRECTORY_SEPARATOR."routes_admin.php"); 

//Aqui Van los Routes del Panel Contador 

//Aqui Van los Routes del Panel Cliente 

// Formulario
$route['AgregarEmpresa']        = 'Formulario/AgregarEmpresa';

// Panel de Usuario
$route['ControlEmpresas']       = 'Panel_user/Empresas';
$route['ValidarRegistro']       = 'Panel_user/ValidarRegistro';



$route['FormularioContador']    = 'Panel_admin/FormularioEmpContador';
$route['ActualizarUsuario']     = 'Panel_admin/ActualizarUsuarioById';
$route['EliminarUsuario']       = 'Panel_admin/EliminarUsuarioById';
$route['AgregarContador']       = 'Panel_admin/AgregarEmpleado';
$route['ConfPreguntas']         = 'Panel_admin/configuracionPreguntas';
$route['ClientesAdmin']         = 'Panel_admin/Clientes';
$route['configAddCategoria']    = "Panel_admin/configAddCategoria";
$route['addCategoria']          = "Panel_admin/addCategoria";
$route['configUpdateCategoria'] = "Panel_admin/configUpCategoria";
$route['updateCategoria']       = "Panel_admin/updateCategoria";
$route['configDeleteCategoria'] = "Panel_admin/configDelCategoria";
$route['deleteCategoria']       = "Panel_admin/deleteCategoria";
$route['configAddSeccion']      = "Panel_admin/configAddSeccion";
$route['addSeccion']            = "Panel_admin/addSeccion";
$route['configUpSeccion']       = "Panel_admin/configUpSeccion";
$route['configDeleteSeccion']   = "Panel_admin/configDelSeccion";
$route['configUpdatePregunta']  = "Panel_admin/configUpPregunta";



$route['ActualizarPerfil']  = 'Panel_admin/getActualizacionContadoresClientesAdmin';
$route['TituloPanel']       = 'Panel_admin/getTituloPanel';
$route['RestPassAdmin']     = "Panel_admin/RestablecerContrasenaAdmin";
$route['soloVista']         = 'Panel_admin/perfilVista'; //para usuarios y contadores 
/**
 * Panel Contadores Admin
 */
$route['ControlContadores']          = 'Panel_Admin_Contador/Contadores';
$route['AgregarContador']            = 'Panel_Admin_Contador/AgregarContador';
$route['FormularioContador']         = 'Panel_Admin_Contador/FormularioEmpContador';
$route['ActualizarContador']         = 'Panel_Admin_Contador/ActualizarContador';
$route['EliminarContador']           = 'Panel_Admin_Contador/EliminarContador';
$route['BuscadorParaContadores']     = 'Panel_Admin_Contador/BuscadorParaContadores';
$route['VerListaClientesAsignados']  = 'Panel_Admin_Contador/VerListaClientesAsignados';
$route['VerLinksContador']           = 'Panel_Admin_Contador/VerLinksContador';
$route['ContadoresPorNombre']        = 'Panel_Admin_Contador/ContadoresPorNombre';
$route['ContadorCRUD']               = 'Panel_Admin_Contador/CrudContadorById';
$route['ClientesParaContadores']     = 'Panel_Admin_Contador/ClientesPorNombreParaContadores';
$route['BuscadorClientesContadores'] = 'Panel_Admin_Contador/BuscadorClientesContadores';
$route['EliminarClienteDeContador']  = 'Panel_Admin_Contador/EliminarContadorCliente';
/**
 * Panel Cliente Admin
 */
$route['ClienteControl']            = 'Panel_Admin_Cliente/Clientes';
$route['FormularioCliente']         = 'Panel_Admin_Cliente/FormularioClientes';
$route['AgregarCliente']            = 'Panel_Admin_Cliente/AgregarCliente';
$route['ActualizarCliente']         = 'Panel_Admin_Cliente/ActualizarCliente';
$route['EliminarCliente']           = 'Panel_Admin_Cliente/EliminarCliente';
$route['AsignarContadorFormulario'] = 'Panel_Admin_Cliente/AsignarContadorFormulario';
$route['BuscadorContador']          = "Panel_Admin_Cliente/BuscadorContador";
$route['AsignarContadorACliente']   = "Panel_Admin_Cliente/AsignarContadorACliente";
$route['ListaContadorCliente']      = "Panel_Admin_Cliente/ListaContadorCliente";
$route['empresasClie']              = "Panel_Admin_Cliente/getEmpresas";
$route['FormularioClienteEmpresa']  = 'Panel_Admin_Cliente/FormularioClienteEmpresa';
$route['ClienteContadorAsignadoLink']      = 'Panel_Admin_Cliente/ClienteContadorAsignadoLink';
$route['RegistrarEmpresaCliente']   = 'Panel_Admin_Cliente/RegistrarEmpresaCliente';
$route['ActualizarEmpresa']         = "Panel_Admin_Cliente/ActualizarEmpresa";
$route['EliminarEmpresa']           = "Panel_Admin_Cliente/EliminarEmpresa";
$route['ClientesPorNombre']         = "Panel_Admin_Cliente/ClientesPorNombre";
$route['ClienteCRUD']               = 'Panel_Admin_Cliente/CRUDByCliente';
$route['ClientesRegistrados']       = 'Panel_admin/getActualizacionContadoresClientesAdmin';


$route['BovedaAdmin'] = 'Panel_Admin_Boveda/Boveda';

$route['EliminarContadorCliente'] =  "Panel_Admin_Cliente/EliminarContadorCliente";

$route['viewCategorias']="Panel_admin/getPanelCategorias";
$route['viewSeccyPre']="Panel_admin/getPanelSeccyPre";
$route['viewPreguntas']="Panel_admin/cancelarPregunta";
$route['configCancelar']="Panel_admin/configCancelar";
$route['configAddCategoria']    = "Panel_admin/configAddCategoria";
$route['addCategoria']          = "Panel_admin/addCategoria";
$route['configUpdateCategoria'] = "Panel_admin/configUpCategoria";
$route['updateCategoria']       = "Panel_admin/updateCategoria";
$route['configDeleteCategoria'] = "Panel_admin/configDelCategoria";
$route['deleteCategoria']       = "Panel_admin/deleteCategoria";
$route['configAddSeccion']      = "Panel_admin/configAddSeccion";
$route['addSeccion']            = "Panel_admin/addSeccion";
$route['configUpSeccion']       = "Panel_admin/configUpSeccion";
$route['updateSeccion']="Panel_admin/updateSeccion";
$route['configDeleteSeccion']   = "Panel_admin/configDelSeccion";
$route['deleteSeccion']="Panel_admin/deleteSeccion";
$route['addPregunta']="Panel_admin/addPregunta";
$route['configUpdatePregunta']  = "Panel_admin/configUpPregunta";
$route['upPregunta']="Panel_admin/updatePregunta";
$route['configDelPregunta']="Panel_admin/configDelPregunta";
$route['deletePregunta']="Panel_admin/deletePregunta";

$route['RegistroEmpresa']="Panel_user/Registro_Empresa";
$route['viewCategoriasUser']="Formulario/getPanelCategorias";
$route['viewSeccionUser']="Formulario/getPanelSeccion";
$route['viewGeneralUser']="Formulario/getDatosGenerales";
$route['Cliente']="Panel_user/index";
$route['postEmpresa']="Panel_user/postEmpresa";

$route['Contador']="Panel_contador/index";
// $route['Contadores']="Panel_user/index";

// Empresas

$route['enviarRespuestas']="Formulario/enviarRespuestas";


//$route['Formularios/legal'] = "Formularios/legal";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


