<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * [Panel_admin] [Clase] [esta clase es solo para el administador]
 * tipos de Usuarios
 * Administrador = roll 0
 * Contador  = roll 1
 * Cliente = roll 2
 */
	class Panel_Admin_Formulario extends MY_Controller {
	
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
        
        public function configuracionPreguntas()
        {
               $this->data['menu']= "ConfPreguntas" ;
               $this->data['titulo']="";
               $this->data['idcat']= (isset($_GET['idcat']) && !empty($_GET['idcat'])) ? $_GET['idcat'] : "" ;
               $this->data['categoria']	 = (isset($_GET['cat']) && !empty($_GET['cat'])) ? $_GET['cat'] : "" ;
               
               
               $this->data['categorias']=$this->Paneles_Model->getCategorias();
               $this->data['numsecciones']=$this->Paneles_Model->getNumSecciones();
               $this->data['numpreguntas']=$this->Paneles_Model->getNumPreguntas();
               $this->data['archivos']=$this->Paneles_Model->getSoliArchivo();
               $this->data['obligatorios']=$this->Paneles_Model->getObliArchivo();
               
               $this->load->view('templates/headerLimpio');
               $this->load->view('PanelControl/Panel',$this->data);
               $this->load->view('templates/footer');
       }

public function getPanelCategorias()
		{
			$this->data['categorias']=$this->Paneles_Model->getCategorias();
			$this->data['categoria']	 = (isset($_GET['cat']) && !empty($_GET['cat'])) ? $_GET['cat'] : "" ;
			$this->data["titulo"]=(isset($_GET['cat']) && !empty($_GET['cat'])) ? $_GET['cat']: "" ;
			$this->data['idcat']=(isset($_GET['idcat']) && !empty($_GET['idcat'])) ? $_GET['idcat'] : "" ;
			
			
			$this->load->view('PanelControl/components/categorias',$this->data);	
		}

		public function getPanelSeccyPre()
		{
			$this->data["categoria"]=(isset($_GET['cat']) && !empty($_GET['cat'])) ? $_GET['cat'] : "" ;
			$this->data['secciones']=$this->Paneles_Model->getSpecificSecciones(strtoupper($this->data['categoria']));
			$this->data['preguntas']=$this->Paneles_Model->getPreguntas(strtoupper($this->data['categoria']));
			$this->data['detalles']=$this->Paneles_Model->getDetallesporCat($this->data['categoria']);
			
			
			$this->load->view('PanelControl/components/secciones',$this->data);	
		}

		public function getPanelPreguntas($post)
		{
			$this->data["categoria"]=(isset($_GET['cat']) && !empty($_GET['cat'])) ? $_GET['cat'] : "" ;
			$this->data['seccion']=(isset($_GET['sec']) && !empty($_GET['sec'])) ? $_GET['sec'] : "" ;
			$this->data['div']=$post['div'];
			$this->data['preguntas']=$this->Paneles_Model->getPreguntas(strtoupper($this->data['categoria']));
			$this->data['detalles']=$this->Paneles_Model->getDetallesporCat($this->data['categoria']);
			
			
			$this->load->view('PanelControl/components/preguntas',$this->data);
		}
		public function perfilVista()
		{
			$this->load->view("PanelControl/components/perfilVista",$this->data);	
		}

		public function configCancelar()
		{
			$this->data['config']="cancelar";
			
			
			$this->load->view("PanelControl/components/cateSeccyPre",$this->data);	
		}

		public function configAddCategoria()
		{
			$this->data['config']="addcategoria";
			
			
			$this->data['categoria']	 = (isset($_GET['cat']) && !empty($_GET['cat'])) ? $_GET['cat'] : "" ;
			$this->data['idcat']=(isset($_GET['idcat']) && !empty($_GET['idcat'])) ? $_GET['idcat'] : "" ;
			$this->load->view("PanelControl/components/cateSeccyPre",$this->data);	
		}

		public function addCategoria()
		{
			$post = $this->input->post();
			if(!empty($post) 
				&& isset($post['categoria']) && !empty($post['categoria'])
			){
				$us = 	array(
					"categoria" => strtoupper($post['categoria'])
				);
				$hecho = $this->Paneles_Model->registrarCategoria($us);
				if($hecho){
					$this->getPanelCategorias();
				}
			}
			
		}

		public function configUpCategoria()
		{
			$this->data['config']="upcategoria";
			$this->data['categoria']=$_GET['cat'];
			
			
			$this->data['idcat']=(isset($_GET['idcat']) && !empty($_GET['idcat'])) ? $_GET['idcat'] : "" ;
			$this->load->view("PanelControl/components/cateSeccyPre",$this->data);	
		}

		public function updateCategoria()
		{
			$post = $this->input->post();
			if(!empty($post) 
				&& isset($post['categoria']) && !empty($post['categoria'])
				&& isset($post['id']) && !empty($post['id'])
			){
				$us = 	array(
					"categoria" => strtoupper($post['categoria'])
				);
				$hecho = $this->Paneles_Model->actualizarCategoria($us,$post['id']);
				if($hecho){
					$this->getPanelCategorias();	
				}
			}
			
		}

		public function configDelCategoria()
		{
			$this->data['config']="deletecategoria";
			$this->data['categoria']=$_GET['cat'];
			
			
			$this->data['idcat']=(isset($_GET['idcat']) && !empty($_GET['idcat'])) ? $_GET['idcat'] : "" ;
			$this->load->view("PanelControl/components/cateSeccyPre",$this->data);	
		}

		public function deleteCategoria()
		{
			$post = $this->input->post();
			if(!empty($post) 
				&& isset($post['id']) && !empty($post['id'])
			){
				$hecho = $this->Paneles_Model->eliminarCategoria($post['id']);
				if($hecho){
					$this->getPanelCategorias();
				}
			}
			
		}

		public function configAddSeccion()
		{
			$this->data['config']="addseccion";
			$this->data['categoria']=$_GET['cat'];
			
			
			$this->load->view("PanelControl/components/cateSeccyPre",$this->data);	
		}

		public function addSeccion()
		{
			$post = $this->input->post();
			if(!empty($post) 
				&& isset($post['categoria']) && !empty($post['categoria'])
				&& isset($post['seccion']) && !empty($post['seccion'])
			){
				$us = 	array(
					"seccion"=>strtoupper($post['seccion']),
					"categoria" => strtoupper($post['categoria'])
				);
				$hecho = $this->Paneles_Model->registrarSeccion($us);
				if($hecho){
					$this->getPanelSeccyPre();	
				}
			}
			
		}

		public function configUpSeccion()
		{
			$this->data['config']="upseccion";
			$this->data['categoria']=$_GET['cat'];
			
			
			$this->data['secciones']=$this->Paneles_Model->getSpecificSecciones($_GET['cat']);
			$this->load->view("PanelControl/components/cateSeccyPre",$this->data);	
		}

		public function updateSeccion()
		{
			$post = $this->input->post();
			if(!empty($post) 
				&& isset($post['seccion']) && !empty($post['seccion'])
				&& isset($post['id']) && !empty($post['id'])
			){
				$us = 	array(
					"seccion" => strtoupper($post['seccion'])
				);
				$hecho = $this->Paneles_Model->actualizarSeccion($us,$post['id']);
				if($hecho){
					$this->getPanelSeccyPre();	
				}
			}
		}

		public function configDelSeccion()
		{
			$this->data['config']="deleteseccion";
			$this->data['categoria']=$_GET['cat'];
			
			
			$this->data['secciones']=$this->Paneles_Model->getSpecificSecciones($_GET['cat']);
			$this->load->view("PanelControl/components/cateSeccyPre",$this->data);	
		}

		public function deleteSeccion()
		{
			$post = $this->input->post();
			if(!empty($post) 
				&& isset($post['id']) && !empty($post['id'])
			){
				$hecho = $this->Paneles_Model->eliminarSeccion($post['id']);
				if($hecho){
					$this->getPanelSeccyPre();	
				}
			}
		}

		public function cancelarPregunta()
		{
			$post = $this->input->post();
			if(!empty($post) ){
				$this->getPanelPreguntas($post);	
			}
		}

		public function addPregunta()
		{
			$post = $this->input->post();
			if(!empty($post) 
				&& isset($post['categoria']) && !empty($post['categoria'])
				&& isset($post['seccion']) && !empty($post['seccion'])
				&& isset($post['texto']) && !empty($post['texto'])
			){
				$pregunta = 	array(
					"categoria" => strtoupper($post['categoria']),
					"seccion"=>strtoupper($post['seccion']),
					"texto"=>$post['texto']
				);
				$lastId = $this->Paneles_Model->registrarPregunta($pregunta);
				$detalle = 	array(
					"id_pregunta" => $lastId,
					"tipo"=>"default",
					"obligatorio"=>"0",
					"soliarchivo"=>"0",
					"nobreArchivo"=>"",
					"preguntaOpcional"=>"pregunta opcional",
					"tipoPreOpcional"=>"default",
					"categoria"=>strtoupper($post['categoria'])
				);
				$hecho=$this->Paneles_Model->registrarDetalles($detalle);
				if($hecho)
				{
					$this->getPanelPreguntas($post);	
				}
			}
		}

		public function configUpPregunta()
		{
			$this->data['config']="uppregunta";
			$this->data['categoria']=$_GET['cat'];
			$this->data['seccion']=(isset($_GET['sec']) && !empty($_GET['sec'])) ? $_GET['sec'] : "" ;
			$this->data['id']=$_GET['idpre'];
			$this->data['pregunta']=$this->Paneles_Model->getSpecificPregunta($this->data['id']);
			$num=$this->Paneles_Model->validacionDetalles($this->data['id']);
			if($num==0)
			{
				$detalle = array(
				"id_pregunta" => $this->data['id'],
				"tipo"=>"default",
				"obligatorio"=>"0",
				"soliarchivo"=>"0",
				"preguntaOpcional"=>"pregunta opcional",
				"tipoPreOpcional"=>"default",
				"categoria"=>strtoupper($this->data['categoria'])

			);
			$this->Paneles_Model->registrarDetalles($detalle);
			}
			$this->data['detalles']=$this->Paneles_Model->getDetallesPregunta($this->data['id']);
			$this->data['categorias']=$this->Paneles_Model->getCategorias();
			$this->data['secciones']=$this->Paneles_Model->getSpecificSecciones($_GET['cat']);
			$this->data['catalogo']=$this->Paneles_Model->getCatalogo();
			
			
			$this->load->view("PanelControl/components/cateSeccyPre",$this->data);	
		}

		/**
		 * Empresas AJAX
		 */

		

		
		
		
		public function updatePregunta()
		{
			$post = $this->input->post();
			//var_dump($post);
			if(!empty($post) 
				&& isset($post['categoria']) && !empty($post['categoria'])
				&& isset($post['seccion']) && !empty($post['seccion'])
				&& isset($post['texto']) && !empty($post['texto'])
				&& isset($post['id']) && !empty($post['id'])
				//&& isset($post['tipo']) && !empty($post['tipo'])
			){
				$pregunta = 	array(
					"categoria" => strtoupper($post['categoria']),
					"seccion"=>strtoupper($post['seccion']),
					"texto"=>$post['texto']
				);
				$detalles= array(
					"tipo"=>$post['tipo'],
					"obligatorio"=>$post['obligatorio'],
					"soliarchivo"=>$post['soliarchivo'],
					"nombreArchivo"=>$post['nombreArchivo'],
					"preguntaOpcional"=>$post['preguntaOpcional'],
					"tipoPreOpcional"=>$post['tipoOpcional'],
					"categoria"=>strtoupper($post['categoria'])
				);
				$hecho= $this->Paneles_Model->actualizarPregunta($pregunta,$post['id']);
				$hechode = $this->Paneles_Model->actualizarDetallesPregunta($detalles,$post['id']);
				if($hecho){
					$this->getPanelPreguntas($post);	
				}
			}
			
		}

		public function configDelPregunta()
		{
			$this->data['config']="deletepregunta";
			$this->data['seccion']=(isset($_GET['sec']) && !empty($_GET['sec'])) ? $_GET['sec'] : "" ;
			$this->data['categoria']=$_GET['cat'];
			$this->data['id']=$_GET['idpre'];
			$this->load->view("PanelControl/components/cateSeccyPre",$this->data);	
		}

		public function deletePregunta()
		{
			$post = $this->input->post();
			if(!empty($post) 
				&& isset($post['id']) && !empty($post['id'])
			){
				$hecho = $this->Paneles_Model->eliminarPregunta($post['id']);
				$hechode = $this->Paneles_Model->eliminarDetalles($post['id']);
				if($hecho){
					$this->getPanelPreguntas($post);	
				}
			}
                }
}