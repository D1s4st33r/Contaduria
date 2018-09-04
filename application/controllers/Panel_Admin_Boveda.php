<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_Admin_Boveda extends MY_Controller {

    protected $nivelAcceso = "Administrador" ;
	protected $Usuario = array();
	protected $post = array();
	protected $data = array();
    protected $session ;
    
	public function __construct()
	{
		parent::__construct();
		if($this->nivelAcceso != $this->session_tipo)
		{
			redirect('Login/index?error_login=session','refresh');
		}
		//cargar datos
		$this->load->model('Paneles_Model');// cargar modelo
		$this->load->model('Boveda_Model');// cargar modelo
		$this->load->model('Panel_Admin_Cliente_Model');// cargar modelo
		$this->Usuario = $this->Paneles_Model->getInfoUsuarioPorId($this->session_id); // obtiene todos la info de usuario
		$this->post = $this->input->post();
		// datos necesarios Base para los componentes
		$this->data['usuario'] = $this->Usuario;
		$this->data['usuario'] += array("tipo" => $this->session_tipo);
		$this->data['session'] = $this->session;
    }

    public function Boveda()
    {
        $this->data['menu'] = "Boveda" ;
        $this->data['clientes'] =$this->Boveda_Model->getEmpresasAdmin();
        $this->load->view('templates/headerLimpio');
		$this->load->view('PanelControl/Panel',$this->data);
		$this->load->view('templates/footer');
    }

    public function BuscadorBoveda()
    {
        var_dump($this->input->post());
    }

	public function CargarCarpeta()
	{
		if(!empty($this->input->post()))
		{
			$dataFol['id_cliente'] = $this->input->post('id_cliente');
			$dataFol['path'] = $this->input->post('path');
			$dataFol['id_folder'] = $this->input->post('id_folder');

			if(
				!empty( $dataFol['id_cliente']) && 
				!empty( $dataFol['path']) && 
				!empty( $dataFol['id_folder'])  
			)
			{
				$data['carpetasYdocs'] = $this->Boveda_Model->getFoldersYCarpetas($dataFol);
				$this->load->view('PanelControl/components/boveda/contenedor_folder', $data);

			}
		}

	}
	public function BovedaCrearCarpeta()
	{
		if(!empty($this->input->post()))
		{
			$dataFol['id_cliente'] = $this->input->post('id_cliente');
			$dataFol['path'] = $this->input->post('path');
			$dataFol['id_folder'] = $this->input->post('id_folder');
			$dataFol['folder'] = $this->input->post('folder');

			if(
				!empty( $dataFol['id_cliente']) && 
				!empty( $dataFol['path']) && 
				!empty( $dataFol['id_folder'])  &&
				!empty( $dataFol['folder']) 
			)
			{
				$this->Boveda_Model->CrearCarpeta($dataFol);
				$data['carpetasYdocs'] = $this->Boveda_Model->getFoldersYCarpetas($dataFol);
				$this->load->view('PanelControl/components/boveda/contenedor_folder', $data);
			}
		}
	}

	public function BovedaSubirArchivo()
	{
		
		$datos = $this->input->post();	
		var_dump($datos);
		$this->load->helper('path');  
		$config = [
			"upload_path" =>'./Boveda/'.$datos['path'],
			'allowed_types' =>"png|jpg|pdf|docs|xls"
			];
			$this->load->library("upload",$config);
	
			if($this->upload->do_upload('nombre_archivo'))
			{
				$this->load->model('Login_Model');
				
				$dato_archivo=array("upload_data" =>$this->upload->data());
				$array = array(
					"nombre_archivo"=> $dato_archivo['upload_data']['file_name'],
					 "titulo_archivo" => $datos['titulo_archivo'],
					 "fecha_subida" => $this->Login_Model->fecha,
					 "id_usuario_mod" => $this->session_id,
					 "fecha_modificacion" => $this->Login_Model->fecha,
					 "id_folder" => $datos["id_folder"]
				);
				$this->Boveda_Model->registrarArchivo($array);
				$dataFol['id_cliente'] = $this->input->post('id_cliente');
				$dataFol['path'] = $this->input->post('path');
				$dataFol['id_folder'] = $this->input->post('id_folder');
				$data['carpetasYdocs'] = $this->Boveda_Model->getFoldersYCarpetas($dataFol);
				$this->load->view('PanelControl/components/boveda/contenedor_folder', $data);
			}else{
				$dataFol['id_cliente'] = $this->input->post('id_cliente');
				$dataFol['path'] = $this->input->post('path');
				$dataFol['id_folder'] = $this->input->post('id_folder');
				$data['carpetasYdocs'] = $this->Boveda_Model->getFoldersYCarpetas($dataFol);
				$this->load->view('PanelControl/components/boveda/contenedor_folder', $data);
			}
	}

}

/* End of file Panel_Admin_Boveda.php */
