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
		$data['menu']="formulario";
		$data['titulo'] = "general" ;
		$data['categorias']=$this->Paneles_Model->getCategorias();
		$data['categoria']	 = (isset($_GET['cat']) && !empty($_GET['cat'])) ? $_GET['cat'] : "" ;
		$data['idcat']=(isset($_GET['idcat']) && !empty($_GET['idcat'])) ? $_GET['idcat'] : "" ;
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['session'] = $this->session;
		$id_user['user']=$this->session;
		$this->load->view('templates/headerLimpio');
        	$this->load->view('PanelUser/components_user/PanelMenu',$data);
		$this->load->view('formularios/index',$data);
		$this->load->view('templates/footer');

   
	}

	public function getDatosGenerales()
	{

		$data['categorias']=$this->Paneles_Model->getCategorias();
		$data['categoria']	 = (isset($_GET['cat']) && !empty($_GET['cat'])) ? $_GET['cat'] : "" ;
		$data['idcat']=(isset($_GET['idcat']) && !empty($_GET['idcat'])) ? $_GET['idcat'] : "" ;
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['session'] = $this->session;
		
		$this->load->view('formularios/index',$data);	

	}
	
	public function getPanelCategorias()
	{
		$data['categorias']=$this->Paneles_Model->getCategorias();
		$data['categoria']	 = (isset($_GET['cat']) && !empty($_GET['cat'])) ? $_GET['cat'] : "" ;
		$data["titulo"]=(isset($_GET['cat']) && !empty($_GET['cat'])) ? $_GET['cat']: "" ;
		$data['idcat']=(isset($_GET['idcat']) && !empty($_GET['idcat'])) ? $_GET['idcat'] : "" ;
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['session'] = $this->session;
		
		$this->load->view('formularios/menuCategorias',$data);	
	}

	public function getPanelSeccion()
	{
		$data["categoria"]=(isset($_GET['cat']) && !empty($_GET['cat'])) ? $_GET['cat'] : "" ;
		$data['secciones']=$this->Paneles_Model->getSpecificSecciones(strtoupper($data['categoria']));
		$data['preguntas']=$this->Paneles_Model->getPreguntas(strtoupper($data['categoria']));
		$data['detalles']=$this->Paneles_Model->getDetallesporCat($data['categoria']);
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['session'] = $this->session;
		
		$this->load->view('formularios/secciones',$data);	
	}

	public function getPanelPreguntas($post)
	{
		$data["categoria"]=(isset($_GET['cat']) && !empty($_GET['cat'])) ? $_GET['cat'] : "" ;
		$data['seccion']=(isset($_GET['sec']) && !empty($_GET['sec'])) ? $_GET['sec'] : "" ;
		$data['div']=$post['div'];
		$data['preguntas']=$this->Paneles_Model->getPreguntas(strtoupper($data['categoria']));
		$data['detalles']=$this->Paneles_Model->getDetallesporCat($data['categoria']);
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['session'] = $this->session;
		$this->load->view('formularios/preguntas',$data);
	}
}



