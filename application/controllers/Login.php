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
		){
			$data["datos"] = array('email' =>  $this->input->post("email"),
									'clave'=>$this->input->post("clave")
							);

			$usuario = $this->Login_Model->validaDatosUsuario($data['datos']);
			if($usuario)
			{
<<<<<<< HEAD

				 $url = '?token='.$usuario[0]['token']."&id=".$usuario[0]['id'];

				echo $url = '?token='.$usuario[0]['token']."&id=".$usuario[0]['id'];

=======
				 $url = '?token='.$usuario[0]['token']."&id=".$usuario[0]['id'];
>>>>>>> master

				if ( ((int)$usuario[0]['roll']) == 0 )
				{
					unset($usuario[0]['roll']);
<<<<<<< HEAD

					redirect('Panel_admin/index'.$url,'refresh');

					redirect('Panel_user/index'.$url,'refresh');

=======
					redirect('Panel_admin/index'.$url,'refresh');
>>>>>>> master
				}
				if(((int)$usuario[0]['roll']) == 2 )
				unset($usuario[0]['roll']);
				redirect('Panel_user/index'.$url,'refresh');
			}else{
				redirect('Login/index?error_login=acceso','refresh');
			}

		}else{
			redirect('Login','refresh');
		}
	}
}
