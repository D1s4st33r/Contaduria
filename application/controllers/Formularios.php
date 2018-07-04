<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formularios extends CI_Controller {

	private $sessionUrl ;
	private $ContaUrl  ;
	public function __construct()
	{
		parent::__construct();
		$get = $this->input->get();
		if($get){
			$sesionUsuario = $this->Auth_Model->verificarSesion(array('id' => $get['id'] , 'token' => $get['token'] )) ;
			if(!$sesionUsuario){
				redirect('Login','refresh');
			}
			$this->sessionUrl = '?id='.$get['id']."&token=".$get['token'];
			//$this->ContaUrl = base_url() .$this->sessionUrl;
		}else{
			redirect('Login','refresh');
		}
		$this->load->model('Formularios_Model');	
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

	public function General()
	{
		$data['titulo'] = "General";
		$data['sessionUrl'] = $this->sessionUrl;
		$this->load->view('templates/header');
		$this->load->view('formularios/menuSecciones',$data);
		$this->load->view('formularios/index');
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
