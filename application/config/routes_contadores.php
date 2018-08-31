<?php
/**
 * 
 * Panel Contador
 */
$route['Contador']            = "Panel_Contador_Perfil/Perfil";
$route['PerfilContadorForm']  = "Panel_Contador_Perfil/ForumularioActualizar";
$route['FormularioParaActualizarCont']  = "Panel_Contador_Perfil/FormularioParaActualizarCont";
$route['ActualizarPerfilCont']  = "Panel_Contador_Perfil/ActualizarPerfilCont";
$route['TituloPanelCont']  = "Panel_Contador_Perfil/getTituloPanelCont";
$route['ResPaswd']  = "Panel_Contador_Perfil/RestablecerContrasenaConta";
$route['PerfilConta']  = "Panel_Contador_Perfil/perfilVista";




$route['ContadorCliente']               = "Panel_Contador_Cliente/Clientes";
$route['ClientesPorNombreCont']         = "Panel_Contador_Cliente/ClientesPorNombre";
$route['ClienteCRUDCont']               = 'Panel_Contador_Cliente/CRUDByCliente';
$route['FormularioClienteConta']        = "Panel_Contador_Cliente/FormularioClienteConta";
$route['RegistrarClienteContador']      = "Panel_Contador_Cliente/RegistrarClienteContador";
$route['ActualizarClienteCont']         = "Panel_Contador_Cliente/ActualizarClienteCont";
$route['EliminarClienteCont']           = 'Panel_Contador_Cliente/EliminarClienteCont';
$route['EmpresasDelCliente']            = "Panel_Contador_Cliente/getEmpresas";
$route['FormularioRegistroEmpresaCont'] = 'Panel_Contador_Cliente/FormularioClienteEmpresa';
$route['RegistrarEmpresaClienteCont']   = 'Panel_Contador_Cliente/RegistrarEmpresaCliente';
$route['ActualizarEmpresaCont']         = "Panel_Contador_Cliente/ActualizarEmpresa";
$route['EliminarEmpresaCont']           = "Panel_Contador_Cliente/EliminarEmpresaCont";
$route['EmpresasAsignadasDirectamente']           = "Panel_Contador_Cliente/EmpresasAsignadasDirectamente";