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
		$data['menu'] = "Panel" ;
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['numEmpresas'] = $this->Paneles_Model->getContadorEmpresa($this->session_id);
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
		$this->load->view('PanelUser/components_user/menuSecciones',$data);
		$this->load->view('PanelUser/components_user/Form_General',$data);
		$this->load->view('templates/footer');
	}

	public function Empresas()
	{
		$data['menu'] = "Empresas" ;
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['estadisticas'] = $this->Paneles_Model->getContadoresEmp();
		if($data['estadisticas']['Contadores'])
		{ 
			$data['Empleados'] = $this->Paneles_Model->getContadoresEmpleados();
		}
		$data['session'] = $this->session;
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelUser/Panel',$data);
		$this->load->view('templates/footer');
	}

	/**
	 * Funciones AJAX
	 */


}
