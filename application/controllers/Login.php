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
		$get = $this->input->get();
		if(isset($get['error_login']) && !empty($get['error_login'])){
			$data["error_login"] = $get["error_login"];
		}

		$this->load->view('templates/header');
		$this->load->view('Login/index',$data);
		$this->load->view('templates/footer');
	}

	/**
	 * [IniciorSesion][ metodo que valida el usuario que debe ser un correo y una clave y le asigna sesion o le actualiza ]
	 * @param [array] [Post por variable global $_POST o en CI $this->input->post() ]
	 * @var empty($this->input->post("email") & empty($this->input->post("clave") son obligatorias
	 */
	public function IniciarSesion()
	{
		// si existe $_POST['email'] & $_POST['email'] y no estan vacias entra
		if( !empty($this->input->post()) &&
			!empty($this->input->post("email")) &&
			!empty($this->input->post("clave"))
		  )
		{
			$data["datos"] = array(
				'email' =>  $this->input->post("email"),	
				'clave'=>$this->input->post("clave")
			);

			$usuario = $this->Login_Model->validaDatosUsuario($data['datos']);
			
			if($usuario)
			{
				 $url = '?token='.$usuario[0]['token']."&id=".$usuario[0]['id'];

				if ( ((int)$usuario[0]['roll']) == 0 )
				{
					unset($usuario[0]['roll']);

					redirect('Panel_admin/index'.$url,'refresh');

					redirect('PanelDeControl'.$url,'refresh');
				}
				if(((int)$usuario[0]['roll']) == 1 )
				{
					unset($usuario[0]['roll']);
					redirect('Formularios/General'.$url,'refresh');
				}
				if(((int)$usuario[0]['roll']) == 2 )
				{
					unset($usuario[0]['roll']);

					redirect('Panel_user/index'.$url,'refresh');
				}
			}else{
				redirect('Login?error_login=acceso','refresh');
			}
		}else{
			redirect('Login','refresh');
		}
	}
}
