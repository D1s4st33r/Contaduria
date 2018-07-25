<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * [Panel_admin] [Clase] [esta clase es solo para el administador]
 * tipos de Usuarios
 * Administrador = roll 0
 * Contador  = roll 1
 * Cliente = roll 2
 */
class Panel_contador extends MY_Controller {
	protected $nivelAcceso = "Contador" ;
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
		$this->load->view('PanelContadores/Panel',$data);
		$this->load->view('templates/footer');
	}
}