<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * [Panel_admin] [Clase] [esta clase es solo para el administador]
 * tipos de Usuarios
 * Administrador = roll 0
 * Contador  = roll 1
 * Cliente = roll 2
 */
	class Panel_admin extends MY_Controller {
	
	/**
	 * Atributos de la calse Panel admin
	 */
	protected $nivelAcceso = "Administrador" ;
	protected $Usuario = array();
	protected $post = array();
	protected $data = array();
	protected $session ;


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
		//cargar datos
		$this->load->model('Paneles_Model');// cargar modelo
		$this->Usuario = $this->Paneles_Model->getInfoUsuarioPorId($this->session_id); // obtiene todos la info de usuario
		$this->post = $this->input->post();
		// datos necesarios Base para los componentes
		$this->data['usuario'] = $this->Usuario;
		$this->data['usuario'] += array("tipo" => $this->session_tipo);
		$this->data['session'] = $this->session;
	}


	
		public function BuscadorEmpresa()
		{
			if( $this->input->post() &&  $this->input->post("busqueda") )
			{
				$search = $this->input->post("busqueda");
				echo json_encode(
					array(
						"id"=>"0",
						"nombre" => "nada para mostrar"
					)
				);
			}else{
				//id	nombre	apellido	email	telefono	clave	roll	ContadorAsignado
				echo json_encode(
					array(
						"id"=>"0",
						"nombre" => "nada para mostrar"
					
					)
				);
			}
		}
		
}

