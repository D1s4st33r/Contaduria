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
		$data['user']=$this->session_id;
		$this->load->view('templates/headerLimpio');
        $this->load->view('PanelUser/components_user/PanelMenu',$data);
		$this->load->view('formularios/index',$data);
		$this->load->view('templates/footer');
	


   
		}

	

   }





