<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_Model');
		$get = $this->input->get();
		if(!empty($get)){
			$sesionUsuario = $this->Auth_Model->verificarSesion(array('id' => $get['id'] , 'token' => $get['token'] )) ;
			var_dump($sesionUsuario);
			if(!empty($sesionUsuario)){
				return $sesionUsuario;
			}
		}
	}

	public function index()
	{
		$data['titulo'] = "Registro";
		$data1['titulo'] = "Registro";
		$this->load->view('templates/header');
		$this->load->view('Registro/vlogin');
		$this->load->view('templates/footer');
	}

	public function ingresoLogin()
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
				redirect('Registro','refresh');

			}

		}else{
			redirect('Registro','refresh');
		}
	}
}
