<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_Model');
	}

	public function index()
	{
		$data['titulo'] = "Login";
		$this->load->view('templates/header');
		$this->load->view('Login/index');
		$this->load->view('templates/footer');
	}

	public function IniciarSesion()
	{	
		if( !empty($this->input->post()) && 
			!empty($this->input->post("email")) && 
			!empty($this->input->post("clave"))
		  )
		{ 
			$data["Datos"] = array('email' =>  $this->input->post("email"), 'clave'=>$this->input->post("clave"));
			$usuario = $this->Login_Model->validaDatosUsuario($data['Datos']);
			if($usuario)
			{	
				$url = '?token='.$usuario[0]['token']."&id=".$usuario[0]['id'];
				if ( ((int)$usuario[0]['roll']) == 0 )
				{
					redirect('Panel_admin'.$url,'refresh');	
				}
				redirect('Formularios/General'.$url,'refresh');	
			}else{
				redirect('Login','refresh');
					
			}

		}else{
			redirect('Login','refresh');
		}
	}
}