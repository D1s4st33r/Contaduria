<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formularios extends  MY_Controller {

	private $sessionUrl ;
	private $ContaUrl  ;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Formularios_Model');	
	}

	public function General()
	{
		$data['titulo'] = "General";
		$data['sessionUrl'] = $this->sessionUrl;
		$this->load->view('templates/headerlimpio');
		$this->load->view('formularios/menuSecciones',$data);
		$this->load->view('formularios/index');
		$this->load->view('templates/footer');


		if($this->input->post()){


			

			$RazonSocial = $this->input->post("razonSocial");
			$RFC = $this->input->post("rfc");
			$Domicilio = $this->input->post("domicilio");
			$Correo = $this->input->post("correo");		
			$Telefono = $this->input->post("telefono");
			$ReLegal = $this->input->post("representantelegal");




			
			$this->form_validation->set_rules('rfc', 'RFC', 'min_length[13]|is_unique[empresa.rfc]');
			$this->form_validation->set_rules('correo', 'Email','is_unique[empresa.correo]');

			
			if($this->form_validation->run()===TRUE)
			{
				$this->load->helper('path');  
				////set_realpath('./uploads/peliculas/'.$idp."/");    
				//retorna el directorio en el servidor /var/www/proyecto/[B]uploads/peliculas/10[/B] 
				//para dentro de application //set_realpath('./application/uploads/peliculas/'.$idp."/");   
				 $dir=set_realpath('./Boveda/'.$RFC."/");  
				if(!is_dir($dir)){  
				mkdir($dir,0777); 


				$config = [
					"upload_path" =>'./Boveda/'.$RFC."/",
					'allowed_types' =>"png|jpg|pdf|docs|xls"

				];

				
				$this->load->library("upload",$config);

				if($this->upload->do_upload('archivos')){



					$dato_archivo=array("upload_data" =>$this->upload->data());

					$datos_empresa=array(
   
						"rfc"=>$RFC,
						"razonSocial"=>$RazonSocial,
						"domicilio"=>$Domicilio,
						"correo"=>$Correo,
						"telefono"=>$Telefono,
						"representantelegal"=>$ReLegal,
						"archivos" => $dato_archivo['upload_data']['file_name']
			
					 );
					 $datos_null='NULL';
			
					
					 $this->Formularios_Model->registro_empresa($datos_empresa);
					 
					// $this->Formularios_Model->eliminar_nUll($datos_empresa,$datos_null);
	 
					 $xd='CHALE';
					 echo $xd;
					} 


				}else{

					echo $this->upload->display_errors();
				}



				
				


			
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
	


}
