<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_Admin_Contador extends MY_Controller 
{
    protected $nivelAcceso = "Administrador" ;
	protected $Usuario = array();
	protected $post = array();
	protected $data = array();
	protected $session;

    public function __construct()
	{
		parent::__construct();
		//extendido de core/MY_Contoller.php
		//$this->session_token;
		// $this->session_id;
		
		if($this->nivelAcceso != $this->session_tipo)
		{
			redirect('Login/index?error_login=session','refresh');
		}
		//cargar datos
		$this->load->model('Paneles_Model',"modeloBase");// cargar modelo
		$this->load->model('Panel_Admin_Contador_Model');// cargar modelo
		$this->Usuario = $this->modeloBase->getInfoUsuarioPorId($this->session_id); // obtiene todos la info de usuario
		$this->post = $this->input->post();
		// datos necesarios Base para los componentes
		$this->data['usuario'] = $this->Usuario;
		$this->data['usuario'] += array("tipo" => $this->session_tipo);
		$this->data['session'] = $this->session;
	}

    
/**
	 * Seccion de Contadores Administrador ($route['ControlContadores])
	 */
	public function Contadores()
	{
		$this->data['menu'] = "Contadores" ;
		$this->data['estadisticas'] = $this->Panel_Admin_Contador_Model->getSumaContadoresEnSistemas();
		if($this->data['estadisticas'])
		{ 
			$this->data['datosDeContadoresEmpleados'] = $this->Panel_Admin_Contador_Model->getContadoresRegistradosEnSistema(); 
		}
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelControl/Panel',$this->data);
		$this->load->view('templates/footer');
	}


	public function AgregarContador()
		{
			$post = $this->input->post();
			if(!empty($post) 
				&& isset($post['nombre']) && !empty($post['nombre'])
				&& isset($post['apellido'])&& !empty($post['apellido'])
				&& isset($post['email'])&& !empty($post['email'])
				&& isset($post['telefono']) && !empty($post['telefono'])
				&& isset($post['clave']) && !empty($post['clave'])
			){
				$us = 	array(
					"nombre" => $post['nombre'],
					"apellido" => $post['apellido'],
					"email" => $post['email'],
					"telefono" => $post['telefono'],
					"clave" => $post['clave']
				);
				$hecho = $this->Panel_Admin_Contador_Model->RegistrarContador($us);
				if($hecho){
					$this->data['usuario'] = $this->Usuario;
					$this->data['usuario'] += array("tipo" => $this->session_tipo);
					
					$this->data['estadisticas'] = $this->Panel_Admin_Contador_Model->getSumaContadoresEnSistemas();
					if($this->data['estadisticas']){ $this->data['datosDeContadoresEmpleados'] = $this->Panel_Admin_Contador_Model->getContadoresRegistradosEnSistema(); }
					$this->load->view("PanelControl/components/contadorAdmin/contadores_crud",$this->data);	
				}
			}
			
		}
		public function ActualizarContador()
		{
			$post = $this->input->post();
			if(!empty($post) 
				&& isset($post['id']) && !empty($post['id'])
				&& isset($post['nombre']) && !empty($post['nombre'])
				&& isset($post['apellido'])&& !empty($post['apellido'])
				&& isset($post['email'])&& !empty($post['email'])
				&& isset($post['telefono']) && !empty($post['telefono'])
			){
				$us = 	array(
					"nombre" => $post['nombre'],
					"apellido" => $post['apellido'],
					"email" => $post['email'],
					"telefono" => $post['telefono']
				);
				$hecho = $this->Panel_Admin_Contador_Model->ActualizarContador($us,$post['id']);
				if($hecho ){
					$this->data['estadisticas'] = $this->Panel_Admin_Contador_Model->getSumaContadoresEnSistemas();
					if($this->data['estadisticas']){ $this->data['datosDeContadoresEmpleados'] = $this->Panel_Admin_Contador_Model->getContadoresRegistradosEnSistema(); }
					$this->load->view("PanelControl/components/contadorAdmin/contadores_crud",$this->data);	
					
				}
			}
		}

		public function EliminarContador()
		{
			$post = $this->input->post();
			if(!empty($post) && isset($post['id']) && !empty($post['id']))
			{
				$hecho = $this->Panel_Admin_Contador_Model->EliminarContador($post['id']);
				if($hecho){
					$this->data['usuario'] = $this->Usuario;
					$this->data['usuario'] += array("tipo" => $this->session_tipo);
					
					$this->data['estadisticas'] = $this->Panel_Admin_Contador_Model->getSumaContadoresEnSistemas();
					if($this->data['estadisticas']){ $this->data['datosDeContadoresEmpleados'] = $this->Panel_Admin_Contador_Model->getContadoresRegistradosEnSistema(); }
					$this->load->view("PanelControl/components/contadorAdmin/contadores_crud",$this->data);	
				}	
			}
		}

		public function VerListaClientesAsignados()
		{
			$this->data['idContador'] = $this->input->get("idContador");
			$this->data['clientes']  = $this->Panel_Admin_Contador_Model->getClientesContadoresById($this->data['idContador']); 
			$this->data['auxiliando']  = $this->Panel_Admin_Contador_Model->getEmpresasContadoresById($this->data['idContador']); 
			$this->load->view('PanelControl/components/contadorAdmin/contadores_crud_lista_clientes', $this->data);

		}

		public function VerLinksContador()
		{
			$this->data['idContador'] = $this->input->get("idContador");
			$var = $this->Panel_Admin_Contador_Model->TieneEmpresasByIdContador($this->data['idContador']);
			
			$this->data['clientes']  = $this->Panel_Admin_Contador_Model->getClientesContadoresById($this->data['idContador']); 
			$this->data['clientes']['total'] = $var['clientes']['total'];
			$this->data['auxiliando']  = $this->Panel_Admin_Contador_Model->getEmpresasContadoresById($this->data['idContador']); 
			$this->data['auxiliando']['total'] = $var['auxiliando']['total'];
			$this->load->view('PanelControl/components/contadorAdmin/contadores_crud_clientes_links', $this->data);
		}

		public function BuscadorParaContadores()
		{
			$this->data['idContador'] = $this->input->get("idContador");
			$this->load->view('PanelControl/components/contadorAdmin/contadores_crud_buscador',$this->data);
		}

		public function getActualizacionPerfil()
		{
			$this->Usuario = $this->Paneles_Model->getInfoUsuarioPorId($this->session_id); // obtiene todos la info de usuario
			$this->data['usuario'] = $this->Usuario;
			$this->load->view("PanelControl/components/perfilActualizacion",$this->data);
		}
		
		public function FormularioEmpContador()
		{	
			$this->load->view("PanelControl/components/RegistroContadores",$this->data);	
		}	
		
	
}

/* End of file Panel_Admin_Contador.php */
