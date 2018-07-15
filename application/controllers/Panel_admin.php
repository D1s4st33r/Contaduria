<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * [Panel_admin] [Clase] [esta clase es solo para el administador]
 * tipos de Usuarios
 * Administrador = roll 0
 * Contador  = roll 1
 * Cliente = roll 2
 */
	class Panel_admin extends MY_Controller {
	protected $nivelAcceso = "Administrador" ;
	protected $Usuario = array();

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
		$this->load->model('Paneles_Model');
		$this->Usuario = $this->Paneles_Model->getInfoUsuarioPorId($this->session_id);
	}

	public function index()
	{
		$data['menu'] = "Panel" ;
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['estadisticas'] = $this->Paneles_Model->getContadoresUsuarios();
		$data['session'] = $this->session;
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelControl/Panel',$data);
		$this->load->view('templates/footer');
	}

	public function Contadores()
	{
		$data['menu'] = "Contadores" ;
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['estadisticas'] = $this->Paneles_Model->getContadoresEmp();
		if($data['estadisticas']['Contadores'])
		{ 
			$data['Empleados'] = $this->Paneles_Model->getContadoresEmpleados();
		}
		$data['session'] = $this->session;
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelControl/Panel',$data);
		$this->load->view('templates/footer');
	}

	public function configuracionPreguntas()
	{
		$data['menu']       = "ConfPreguntas" ;
		$data['usuario']      = $this->Usuario;
		$data['usuario']     += array("tipo" => $this->session_tipo);
		$data['session']   	  = $this->session;
		$data['categorias']   = $this->Paneles_Model->getCategorias();
		$data['secciones']    = $this->Paneles_Model->getSecciones();
		$data['preguntas']	  = $this->Paneles_Model->getPreguntas();
		$data['archivos']	  = $this->Paneles_Model->getSoliArchivo();
		$data['obligatorios'] = $this->Paneles_Model->getObliArchivo();
		if( $_GET['cat'] != "ind" )
		{
			$data['specific'] = $this->Paneles_Model->getSpecificPreguntas(strtoupper($_GET['cat']));$data["titulo"]=strtoupper($_GET['cat']);
		}
		$this->load->view('templates/headerLimpio');
		if( $_GET['cat'] != "ind")
		{
			$this->load->view('PanelControl/components/preguntas',$data);
		}
		$this->load->view('PanelControl/Panel',$data);
		$this->load->view('templates/footer');
	}
	 
	
	/**
	 * Funciones AJAX
	 */
		public function getActualizacionPerfil()
		{
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/perfilActualizacion",$data);
		}
		
		public function FormularioEmpContador()
		{
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/RegistroContadores",$data);	
		}	
		
		public function AgregarEmpleado()
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
				$hecho = $this->Paneles_Model->RegistrarContador($us);
				if($hecho){
					$data['usuario'] = $this->Usuario;
					$data['usuario'] += array("tipo" => $this->session_tipo);
					$data['session'] = $this->session;
					$data['estadisticas'] = $this->Paneles_Model->getContadoresEmp();
					if($data['estadisticas']['Contadores']){ $data['Empleados'] = $this->Paneles_Model->getContadoresEmpleados(); }
					$this->load->view("PanelControl/components/ContadoresCRUD",$data);	
				}
			}
			
		}

		public function ActualizarPerfil()
		{
			$post = $this->input->post();
			if(!empty($post) 
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
				$hecho = $this->Paneles_Model->actualizarDatosUsuario($us);
				if($hecho){
					$this->Usuario=$this->Paneles_Model->getInfoUsuarioPorId($this->session_id);
					$data['usuario'] = $this->Usuario;
					$data['usuario'] += array("tipo" => $this->session_tipo);
					$data['session'] = $this->session;
					$this->load->view("PanelControl/components/perfilVista",$data);	
				}else{
				
				}
			}else{
			$this->getActualizacionPerfil();	
			}	
		}
		public function EliminarUsuarioById()
		{
			$post = $this->input->post();
			if(!empty($post) && isset($post['id']) && !empty($post['id'])){
				$hecho = $this->Paneles_Model->EliminarUsuarioById($post['id']);
				if($hecho){
					$data['usuario'] = $this->Usuario;
					$data['usuario'] += array("tipo" => $this->session_tipo);
					$data['session'] = $this->session;
					$data['estadisticas'] = $this->Paneles_Model->getContadoresEmp();
					if($data['estadisticas']['Contadores']){ $data['Empleados'] = $this->Paneles_Model->getContadoresEmpleados(); }
					$this->load->view("PanelControl/components/ContadoresCRUD",$data);
				}	
			}
		}
		public function ActualizarUsuarioById()
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
				$hecho = $this->Paneles_Model->actualizarUsuarioById($us,$post['id']);
				if($hecho){
					$data['usuario'] = $this->Usuario;
					$data['usuario'] += array("tipo" => $this->session_tipo);
					$data['session'] = $this->session;
					$data['estadisticas'] = $this->Paneles_Model->getContadoresEmp();
					if($data['estadisticas']['Contadores']){ $data['Empleados'] = $this->Paneles_Model->getContadoresEmpleados(); }
					$this->load->view("PanelControl/components/ContadoresCRUD",$data);	
				}
			}
		}
	// Fin funciones AJAX
}

