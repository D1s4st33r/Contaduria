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
*/
$route['default_controller'] = 'Login';
/* $route['de_donde_vienes'] = "controlador/metodo"; */
$route['PanelDeControl'] = 'Panel_admin/index';
$route['ControlContadores'] = 'Panel_admin/Contadores';
$route['ActualizarPerfil'] = 'Panel_admin/getActualizacionPerfil';//ActualizarUsuarioById
$route['FormularioContador'] = 'Panel_admin/FormularioEmpContador';
$route['ActualizarUsuario'] = 'Panel_admin/ActualizarUsuarioById';
$route['EliminarUsuario'] = 'Panel_admin/EliminarUsuarioById';
$route['AgregarContador'] = 'Panel_admin/AgregarEmpleado';
$route['ConfPreguntas'] = 'Panel_admin/configuracionPreguntas';
$route['TituloPanel'] = 'Panel_admin/getTituloPanel';
$route['Login'] ="Login/index";
$route['configCancelar']="Panel_admin/configCancelar";
$route['configAddCategoria']="Panel_admin/configAddCategoria";
$route['addCategoria']="Panel_admin/addCategoria";
$route['configUpdateCategoria']="Panel_admin/configUpCategoria";
$route['updateCategoria']="Panel_admin/updateCategoria";
$route['configDeleteCategoria']="Panel_admin/configDelCategoria";
$route['deleteCategoria']="Panel_admin/deleteCategoria";
$route['configAddSeccion']="Panel_admin/configAddSeccion";
$route['addSeccion']="Panel_admin/addSeccion";
$route['configUpSeccion']="Panel_admin/configUpSeccion";
$route['configDeleteSeccion']="Panel_admin/configDelSeccion";
$route['configUpdatePregunta']="Panel_admin/configUpPregunta";
//$route['Formularios/legal'] = "Formularios/legal";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
