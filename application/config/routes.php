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


/**
 * Panel Cliente Admin
 */

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


