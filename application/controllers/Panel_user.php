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
			$data['estadisticas'] = $this->Paneles_Model->getContadoresUsuarios();
			$data['session'] = $this->session;
			$this->load->view('templates/headerLimpio');
			$this->load->view('PanelUser/Panel',$data);
			$this->load->view('templates/footer');
		}
<<<<<<< HEAD
=======
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

	public function Cuestionario()
	{
		$data['menu'] = "Cuestionario" ;
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['estadisticas'] = $this->Paneles_Model->getContadorEmpresa();
		$data['session'] = $this->session;
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelUser/Panel',$data);
		$this->load->view('templates/footer');
	}
>>>>>>> master

	/**
	 * Funciones AJAX
	 */
<<<<<<< HEAD
=======
	 public function getActualizacionPerfil()
	 {
		$data['usuario'] = $this->Usuario;
		$data['session'] = "?token=".$this->session_token."&id=".$this->session_id;
		$this->load->view("PanelUser/components_user/perfilActualizacion",$data);
	 }

	 public function registrar_empresa()
	 {
 		$data['usuario'] = $this->Usuario;
		$data['session'] = "?token=".$this->session_token."&id=".$this->session_id;
		$data['sessionUrl'] = $this->sessionUrl;
>>>>>>> master


}
