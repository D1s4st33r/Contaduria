<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
|       $route['de_donde_vienes'] = "controlador/metodo"; 
*/
$route['default_controller'] = 'Login';

$route['ControlEmpresas'] = 'Panel_user/Empresas';

$route['FormularioContador'] = 'Panel_admin/FormularioEmpContador';
$route['ActualizarUsuario'] = 'Panel_admin/ActualizarUsuarioById';
$route['EliminarUsuario'] = 'Panel_admin/EliminarUsuarioById';
$route['AgregarContador'] = 'Panel_admin/AgregarEmpleado';
$route['AgregarEmpresa'] = 'Formulario/AgregarEmpresa';


$route['ClientesAdmin'] = 'Panel_admin/Clientes';
$route['Login'] ="Login/index";
$route['ValidarRegistro'] = 'Panel_user/ValidarRegistro';
$route['Login']                 = "Login/index";



/**
 * Panel Prinicipal Admin
 */
$route['PanelDeControl']    = 'Panel_admin/index';
$route['ActualizarPerfil']  = 'Panel_admin/getActualizacionContadoresClientesAdmin';
$route['TituloPanel']       = 'Panel_admin/getTituloPanel';
$route['RestPassAdmin']     = "Panel_admin/RestablecerContrasenaAdmin";
$route['soloVista']         = 'Panel_admin/perfilVista'; //para usuarios y contadores 

//CRUD formulario
$route['ConfPreguntas'] = 'Panel_admin_formulario/configuracionPreguntas';
$route['viewCategorias']="Panel_admin_formulario/getPanelCategorias";
$route['viewSeccyPre']="Panel_admin_formulario/getPanelSeccyPre";
$route['viewPreguntas']="Panel_admin_formulario/cancelarPregunta";
$route['configCancelar']="Panel_admin_formulario/configCancelar";
$route['configAddCategoria']="Panel_admin_formulario/configAddCategoria";
$route['addCategoria']="Panel_admin_formulario/addCategoria";
$route['configUpdateCategoria']="Panel_admin_formulario/configUpCategoria";
$route['updateCategoria']="Panel_admin_formulario/updateCategoria";
$route['configDeleteCategoria']="Panel_admin_formulario/configDelCategoria";
$route['deleteCategoria']="Panel_admin_formulario/deleteCategoria";
$route['configAddSeccion']="Panel_admin_formulario/configAddSeccion";
$route['addSeccion']="Panel_admin_formulario/addSeccion";
$route['configUpSeccion']="Panel_admin_formulario/configUpSeccion";
$route['configDeleteSeccion']="Panel_admin_formulario/configDelSeccion";
$route['configUpdatePregunta']="Panel_admin_formulario/configUpPregunta";
$route['upPregunta']="Panel_admin/updatePregunta";
$route['configDelPregunta']="Panel_admin/configDelPregunta";
$route['deletePregunta']="Panel_admin/deletePregunta";
/**
 * Panel Contadores Admin
 */
$route['ControlContadores']         = 'Panel_Admin_Contador/Contadores';
$route['AgregarContador']           = 'Panel_Admin_Contador/AgregarContador';
$route['FormularioContador']        = 'Panel_Admin_Contador/FormularioEmpContador';
$route['ActualizarContador']        = 'Panel_Admin_Contador/ActualizarContador';
$route['EliminarContador']          = 'Panel_Admin_Contador/EliminarContador';
$route['BuscadorParaContadores']    = 'Panel_Admin_Contador/BuscadorParaContadores';
$route['VerListaClientesAsignados'] = 'Panel_Admin_Contador/VerListaClientesAsignados';
$route['VerLinksContador']          = 'Panel_Admin_Contador/VerLinksContador';

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
$route['ContadorAsignadoLink']      = 'Panel_Admin_Cliente/ContadorAsignadoLink';
$route['RegistrarEmpresaCliente']   = 'Panel_Admin_Cliente/RegistrarEmpresaCliente';
$route['ActualizarEmpresa']         = "Panel_Admin_Cliente/ActualizarEmpresa";
$route['EliminarEmpresa']           = "Panel_Admin_Cliente/EliminarEmpresa";
$route['ClientesRegistrados']       = 'Panel_admin/getActualizacionContadoresClientesAdmin';
$route['BovedaAdmin'] = 'Panel_Admin_Boveda/Boveda';
$route['EliminarContadorCliente'] =  "Panel_Admin_Cliente/EliminarContadorCliente";
//FORMULARIO
$route['FormularioEmpresa']='Panel_user_formulario/FormularioEmpresa';
$route['viewCategoriasUser']="Panel_user_formulario/getPanelCategorias";
$route['viewSeccionUser']="Panel_user_formulario/getPanelSeccion";
$route['enviarRespuestas']="Panel_user_formulario/enviarRespuestas";
//Fin FORMULARIO


$route['RegistroEmpresa']="Panel_user/Registro_Empresa";
$route['viewGeneralUser']="Formulario/getDatosGenerales";
$route['Cliente']="Panel_user/index";
$route['postEmpresa']="Panel_user/postEmpresa";

$route['Contador']="Panel_contador/index";
// $route['Contadores']="Panel_user/index";

// Empresas




//$route['Formularios/legal'] = "Formularios/legal";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


