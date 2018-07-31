<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_Model');
		$this->load->model('Formularios_Model');
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
					redirect('PanelDeControl'.$url,'refresh');
				}
				if(((int)$usuario[0]['roll']) == 1 )
				{
					unset($usuario[0]['roll']);
					redirect('Formulario/General'.$url,'refresh');
				}
				if(((int)$usuario[0]['roll']) == 2 )
				{
					unset($usuario[0]['roll']);
					redirect('Cliente'.$url,'refresh');
				}
			
			}else{
				redirect('Login?error_login=acceso','refresh');
			}
		}else{
			redirect('Login','refresh');
		}
	}

	public function PostEmpresa(){
		if($this->input->post()){
			
			$RazonSocial = $this->input->post("razonSocial");
			$RFC = $this->input->post("rfc");
			$Domicilio = $this->input->post("domicilio");
			$Correo = $this->input->post("correo");		
			$Telefono = $this->input->post("telefono");
			$ReLegal = $this->input->post("representantelegal");
			$TelRepre = $this->input->post("telrepresentante");
			 $this->form_validation->set_rules('rfc', 'RFC', 'min_length[13]|is_unique[empresa.rfc]');
			 $this->form_validation->set_rules('correo', 'Email','is_unique[empresa.correo]');
						  if($this->form_validation->run()===TRUE)
						   {
							$this->load->helper('path');  

							$dir=set_realpath('./Boveda/'.$RFC."/");  
							if(!is_dir($dir)){  
							mkdir($dir,0777); 
							}
							
							$config = [
								"upload_path" =>'./Boveda/'.$RFC."/",
								'allowed_types' =>"png|jpg|pdf|docs|xls"
					
							];
					
							
							$this->load->library("upload",$config);
							
					
							if($this->upload->do_upload('archivos')){
							
								$dato_archivo=array("upload_data" =>$this->upload->data());


								$datos_em=array(
									"id_usuario"=> 1,
									"rfc"=>$RFC,
									"razonSocial"=>$RazonSocial,
									"domicilio"=>$Domicilio,
									"correo"=>$Correo,
									"telefono"=>$Telefono,
									"representantelegal"=>$ReLegal,
									"telrepresentante"=>$TelRepre,
									"archivos" => $dato_archivo['upload_data']['file_name'],						
								 );

								 $form=array(
									 "usuario"=>$ReLegal,
									 "empresarfc"=>$RFC,
									 "fecha_ini"=>date("d/m/Y"),
									 "fecha_fini"=>""
								 );

								$this->Formularios_Model->dataempresa($datos_em);
								$this->Formularios_Model->crearFormulario($form);
								echo "exito";
								

							}
							
								
							}

			}
			
	}


	



}
