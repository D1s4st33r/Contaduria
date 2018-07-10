<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * [Panel_admin] [Clase] [esta clase es solo para el administador] 
 */
class Panel_admin extends MY_Controller {
	protected $nivelAcceso = 0 ;
	protected $Usuario = array();
	
	public function __construct()
	{
		parent::__construct();
		//extendido de core/MY_Contoller.php
		//$this->session_token;
		// $this->session_id;
		$roll_usuario = $this->Auth_Model->getRollById($this->session_id);
		if($this->nivelAcceso != $roll_usuario)
		{
			redirect('Login/index?error_login=session','refresh');
		}
		$this->load->model('Paneles_Model');
		$this->Usuario = $this->Paneles_Model->getInfoUsuarioPorId($this->session_id);
	}

	public function index()
	{	
		$data['usuario'] = $this->Usuario;
		$data['session'] = "?token=".$this->session_token."&id=".$this->session_id;
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelControl/Panel',$data);
		$this->load->view('templates/footer');
	}

	/**
	 * Funciones AJAX
	 */
	 public function getActualizacionPerfil()
	 {
		$data['usuario'] = $this->Usuario;
		$data['session'] = "?token=".$this->session_token."&id=".$this->session_id;
		$this->load->view("PanelControl/components/perfilActualizacion",$data);	
	 }
	 
}
