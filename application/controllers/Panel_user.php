<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * [Panel_admin] [Clase] [esta clase es solo para el administador]
 */
	class Panel_user extends MY_Controller {
		protected $nivelAcceso = "Cliente" ;
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
		$id_user = $this->session_id;
		$data['menu'] = "Panel" ;
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['estadisticas'] = $this->Paneles_Model->getContadorEmpresa($id_user);
		$num = $data['estadisticas'];
		if($data['estadisticas']['Empresas'])
		{ 
			$data['Empleados'] = $this->Paneles_Model->getInfoEmpresas($id_user);
		}
		$data['session'] = $this->session;
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelUser/Panel',$data);
		$this->load->view('templates/footer');
	}

	
	public function Registro_Empresa()
	{
		$data['menu'] = "Registro Empresa" ;
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		
		$data['session'] = $this->session;
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelUser/components_user/PanelMenu',$data);
		$this->load->view('formularios/index',$data);
		$this->load->view('templates/footer');
	}

	public function Empresas()
	{
		$id_user = $this->session_id;
		$data['menu'] = "Empresas" ;
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['session'] = $this->session;
		$data['estadisticas'] = $this->Paneles_Model->getContadorEmpresa($id_user);
		$num = $data['estadisticas'];
		if($data['estadisticas']['Empresas'])
		{ 
			$data['Empleados'] = $this->Paneles_Model->getInfoEmpresas($id_user);
		}
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelUser/Panel',$data);
		$this->load->view('templates/footer');
	}





	/**
	 * Funciones AJAX
	 */


}
