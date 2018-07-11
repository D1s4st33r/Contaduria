<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * [Panel_admin] [Clase] [esta clase es solo para el administador]
 */
	class Panel_admin extends MY_Controller {
	protected $nivelAcceso = 0 ;
	protected $Usuario = array();

	public function __construct()
	{
		parent::__construct();
		//extendido de core/MY_Contoller.php
		//$this->session_token;
		// $this->session_id;
		$roll_usuario = $this->Auth_Model->getRollById($this->session_id);
		if($this->nivelAcceso != $roll_usuario)
		{
			redirect('Login/index?error_login=session','refresh');
		}
		$this->load->model('Paneles_Model');
		$this->Usuario = $this->Paneles_Model->getInfoUsuarioPorId($this->session_id);
	}

	public function index()
	{
		$data['usuario'] = $this->Usuario;
		$data['session'] = "?token=".$this->session_token."&id=".$this->session_id;
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelControl/Panel',$data);
		$this->load->view('templates/footer');
	}

	/**
	 * Funciones AJAX
	 */
	 public function getActualizacionPerfil()
	 {
		$data['usuario'] = $this->Usuario;
		$data['session'] = "?token=".$this->session_token."&id=".$this->session_id;
		$this->load->view("PanelControl/components/perfilActualizacion",$data);
	 }

<<<<<<< HEAD
	 public function configuracionPreguntas()
	 {
		 $data['titulo']="";
		$data['usuario'] = $this->Usuario;
		$data['session'] = "?token=".$this->session_token."&id=".$this->session_id;
		$data['categorias']=$this->Paneles_Model->getCategorias();
		$data['secciones']=$this->Paneles_Model->getSecciones();
		$data['preguntas']=$this->Paneles_Model->getPreguntas();
		$data['archivos']=$this->Paneles_Model->getSoliArchivo();
		$data['obligatorios']=$this->Paneles_Model->getObliArchivo();
		if($_GET['cat']!="ind"){$data['specific']=$this->Paneles_Model->getSpecificPreguntas(strtoupper($_GET['cat']));$data["titulo"]=strtoupper($_GET['cat']);}
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelControl/PreguntasConf',$data);
		if($_GET['cat']!="ind"){$this->load->view('PanelControl/components/preguntas',$data);}
		$this->load->view('templates/footer');
	 }
	 
		
		public function ActualizarPerfil()
		{
			$post = $this->input->post();
			if(!empty($post) 
				&& isset($post['nombre']) && !empty($post['nombre'])
				&& isset($post['apellido'])&& !empty($post['apellido'])
				&& isset($post['email'])&& !empty($post['email'])
				&& isset($post['telefono']) && !empty($post['telefono'])
			){
				$us = 	array(
					"nombre" => $post['nombre'],
					"apellido" => $post['apellido'],
					"email" => $post['email'],
					"telefono" => $post['telefono']
				);
				$hecho = $this->Paneles_Model->actualizarDatosUsuario($us);
				if($hecho){
					$this->Usuario=$this->Paneles_Model->getInfoUsuarioPorId($this->session_id);
					$data['usuario'] = $this->Usuario;
					$data['session'] = "?token=".$this->session_token."&id=".$this->session_id;
					$this->load->view("PanelControl/components/perfilVista",$data);	
				}else{
				
				}
			}else{
			$this->getActualizacionPerfil();	
			}	
		}
	// Fin funciones AJAX
=======
>>>>>>> david
}

