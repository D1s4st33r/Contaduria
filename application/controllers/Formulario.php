<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * [Panel_admin] [Clase] [esta clase es solo para el administador]
 */
	class Formulario extends MY_Controller {
		protected $nivelAcceso = "Cliente" ;
		protected $Usuario = array();
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Formularios_Model');
			
			if($this->nivelAcceso != $this->session_tipo)
			{
				redirect('Login/index?error_login=session','refresh');
			}
			$this->load->model('Paneles_Model');
			
			$this->Usuario = $this->Paneles_Model->getInfoUsuarioPorId($this->session_id);
		}
	

		
public function General()
{
	    $data['titulo'] = "General" ;
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['session'] = $this->session;
        $this->load->view('templates/header');
        $this->load->view('PanelUser/components_user/PanelMenu',$data);
        $this->load->view('formularios/menuSecciones',$data);
		$this->load->view('formularios/index',$data);
		$this->load->view('templates/footer');
		               if($this->input->post()){

			            $Datos_empresa['razonSocial'] = $this->input->post("razonSocial");
			            $Datos_empresa['rfc'] = $this->input->post("rfc");
			            $Datos_empresa['domicilio']=$this->input->post("domicilio");
			            $Datos_empresa['correo'] = $this->input->post("correo");		
			            $Datos_empresa['telefono']= $this->input->post("telefono");
			            $Datos_empresa['representantelegal'] = $this->input->post("representantelegal");
			            $RFC= $this->input->post("rfc");
						 

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


											$dempresa=array(

												"rfc"=>$Datos_empresa['rfc'],
												"razonSocial"=>$Datos_empresa['razonSocial'],
												"domicilio"=>$Datos_empresa['domicilio'],
												"correo"=>$Datos_empresa['correo'],
												"telefono"=>$Datos_empresa['telefono'],
												"representantelegal"=>$Datos_empresa['representantelegal'],
												"archivos" => $dato_archivo['upload_data']['file_name']
									
											 );
											 
											 $this->Formularios_Model->dataempresa($dempresa);

										}
	
									        
									    }else {
											var_dump($RFC);
										}
		
		                }


}
		

		
   }


	/**
	 * Funciones AJAX
	 */


