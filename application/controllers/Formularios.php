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
	
	
	

	public function General()
	{
		$data['titulo'] = "General";
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['session'] = $this->session;
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelUser/componets_user/Form_General',$data);
		$this->load->view('templates/footer');
	}

	/**public function General()
	{
		$data['titulo'] = "General";
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['session'] = $this->session;
		$this->load->view('templates/headerlimpio');
		$this->load->view('formularios/menuSecciones',$data);
		$this->load->view('formularios/index',$data);
		$this->load->view('templates/footer');

		       if($this->input->post()){

			            $Datos_empresa['RazonSocial'] = $this->input->post("razonSocial");
			            $Datos_empresa['RFC'] = $this->input->post("rfc");
			            $Datos_empresa['Domicilio']=$this->input->post("domicilio");
			            $Datos_empresa['Correo'] = $this->input->post("correo");		
			            $Datos_empresa['Telefono']= $this->input->post("telefono");
			            $Datos_empresa['ReLegal'] = $this->input->post("representantelegal");
			            $RFC= $this->input->post("rfc");

			            $this->form_validation->set_rules('rfc', 'RFC', 'min_length[13]|is_unique[empresa.rfc]');
			            $this->form_validation->set_rules('correo', 'Email','is_unique[empresa.correo]');

			                     if($this->form_validation->run()===TRUE)
			                    {
				
			                            $this->load->helper('path');   
				                        $dir=set_realpath('./Boveda/'.$RFC."/");  
											   if(!is_dir($dir))
											   {  
												  mkdir($dir,0777); 
												  
												 }	
											$this->subirdatosform($RFC,$Datos_empresa);
		                        }else{
				echo validation_errors('<li>','<li>'); 
		    }
		}
 
	}

	public function legal()
	{
		$data['titulo'] = "Legal";

		$data['Secciones']=$this->Formularios_Model->legal();
		$data['sessionUrl'] = $this->sessionUrl;
		
		$this->load->view('templates/header');
		$this->load->view('formularios/menuSecciones',$data);
		unset($data['titulo']);
		$this->load->view('formularios/legal',$data);
		$this->load->view('templates/footer');
	}

	public function laboral()
	{
		$data['titulo'] = "Laboral";

		$data['Secciones']=$this->Formularios_Model->laboral();
		$data['sessionUrl'] = $this->sessionUrl;		
		$this->load->view('templates/header');
		$this->load->view('formularios/menuSecciones',$data);
	
		unset($data['titulo']);
	
		$this->load->view('formularios/laboral',$data);
		$this->load->view('templates/footer');
	}



	public function Contable()
	{
		$data['titulo'] = "Contable";

		$data['Secciones']=$this->Formularios_Model->contable();
		$data['sessionUrl'] = $this->sessionUrl;
		$this->load->view('templates/header');
		$this->load->view('formularios/menuSecciones',$data);
		
		unset($data['titulo']);
		
		$this->load->view('formularios/contable',$data);
		$this->load->view('templates/footer');
	}
	public function segSocial()
	{
		$data['titulo'] = "Seguridad Social";
		
		$data['Secciones'] = $this->Formularios_Model->segSocial();
		$data['sessionUrl'] = $this->sessionUrl;
		$this->load->view('templates/header');
		$this->load->view('formularios/menuSecciones',$data);
		
		unset($data['titulo']);
		
		$this->load->view('formularios/segSocial',$data);
		$this->load->view('templates/footer');
	}

	public function fiscal()
	{
		$data['titulo'] = "Fiscal";
		$data['sessionUrl'] = $this->sessionUrl;
		$data['Secciones'] = $this->Formularios_Model->fiscal();

		$this->load->view('templates/header');
		$this->load->view('formularios/menuSecciones',$data);
		
		unset($data['titulo']);
		
		$this->load->view('formularios/fiscal',$data);
		$this->load->view('templates/footer');
	}


	public function subirdatosform($archivo,$Empresa)
	{
		
		$data['sessionUrl'] = $this->sessionUrl;
		$data['Secciones'] = $this->Formularios_Model->fiscal();
		var_dump();
		
		$config = [
			"upload_path" =>'./Boveda/'.$archivo."/",
			'allowed_types' =>"png|jpg|pdf|docs|xls"
		 ];
		 var_dump($archivos);
		 $this->load->library("upload",$config);

			  if($this->upload->do_upload('archivos')){

				$this->Formularios_Model->registro_empresa($Empresa);
				
			  }

	


	}*/



}
