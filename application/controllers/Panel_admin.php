<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_admin extends CI_Controller {
	
	private $sessionUrl ;
	private $ContaUrl  ;
	
	public function __construct()
	{
		parent::__construct();
		$get = $this->input->get();
		if($get){
			$sesionUsuario = $this->Auth_Model->verificarSesion(array('id' => $get['id'] , 'token' => $get['token'] )) ;
			if($sesionUsuario){
				redirect('Login','refresh');
			}
			$this->sessionUrl = '?id='.$get['id']."&token=".$get['token'];
			//$this->ContaUrl = base_url() .$this->sessionUrl;
		}else{
			redirect('Login','refresh');
		}
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('PanelControl/Panel');
		$this->load->view('templates/footer');
	}

}
