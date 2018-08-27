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


