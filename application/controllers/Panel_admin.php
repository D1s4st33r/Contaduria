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
	protected $nivelAcceso = "Administrador" ;
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

	public function index()
	{
		$data['menu'] = "Panel" ;
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['estadisticas'] = $this->Paneles_Model->getContadoresUsuarios();
		$data['session'] = $this->session;
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelControl/Panel',$data);
		$this->load->view('templates/footer');
	}

	public function Contadores()
	{
		$data['menu'] = "Contadores" ;
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['estadisticas'] = $this->Paneles_Model->getContadoresEmp();
		if($data['estadisticas']['Contadores'])
		{ 
			$data['Empleados'] = $this->Paneles_Model->getContadoresEmpleados();
		}
		$data['session'] = $this->session;
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelControl/Panel',$data);
		$this->load->view('templates/footer');
	}

	 public function configuracionPreguntas()
	 {
		$data['menu']       = "ConfPreguntas" ;
		$data['config']	=	"";
		$data['idcat']	=	"";
		$data['categoria']	=$_GET['cat'];
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['session'] = $this->session;
		$data['categorias']=$this->Paneles_Model->getCategorias();
		$data['secciones']=$this->Paneles_Model->getSecciones();
		$data['preguntas']=$this->Paneles_Model->getPreguntas();
		$data['archivos']=$this->Paneles_Model->getSoliArchivo();
		$data['obligatorios']=$this->Paneles_Model->getObliArchivo();
		if($data['categoria']!="ind"){$data['specific']=$this->Paneles_Model->getSpecificPreguntas(strtoupper($_GET['cat']));$data["titulo"]=strtoupper($_GET['cat']);$data['idcat']=$_GET['idcat'];}
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelControl/Panel',$data);
		if($data['categoria']!="ind"){$this->load->view('PanelControl/components/preguntas',$data);}
		$this->load->view('templates/footer');
	}
	 
	
	/**
	 * Funciones AJAX
	 */
		public function getActualizacionPerfil()
		{
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/perfilActualizacion",$data);
		}
		public function getTituloPanel()
		{
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/TituloPanel",$data);
		}
		public function FormularioEmpContador()
		{
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/RegistroContadores",$data);	
		}	
		
		public function AgregarEmpleado()
		{
			$post = $this->input->post();
			if(!empty($post) 
				&& isset($post['nombre']) && !empty($post['nombre'])
				&& isset($post['apellido'])&& !empty($post['apellido'])
				&& isset($post['email'])&& !empty($post['email'])
				&& isset($post['telefono']) && !empty($post['telefono'])
				&& isset($post['clave']) && !empty($post['clave'])
			){
				$us = 	array(
					"nombre" => $post['nombre'],
					"apellido" => $post['apellido'],
					"email" => $post['email'],
					"telefono" => $post['telefono'],
					"clave" => $post['clave']
				);
				$hecho = $this->Paneles_Model->RegistrarContador($us);
				if($hecho){
					$data['usuario'] = $this->Usuario;
					$data['usuario'] += array("tipo" => $this->session_tipo);
					$data['session'] = $this->session;
					$data['estadisticas'] = $this->Paneles_Model->getContadoresEmp();
					if($data['estadisticas']['Contadores']){ $data['Empleados'] = $this->Paneles_Model->getContadoresEmpleados(); }
					$this->load->view("PanelControl/components/ContadoresCRUD",$data);	
				}
			}
			
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
					$data['usuario'] += array("tipo" => $this->session_tipo);
					$data['session'] = $this->session;
					$this->load->view("PanelControl/components/perfilVista",$data);	
				}else{
				
				}
			}else{
			$this->getActualizacionPerfil();	
			}	
		}
		public function EliminarUsuarioById()
		{
			$post = $this->input->post();
			if(!empty($post) && isset($post['id']) && !empty($post['id'])){
				$hecho = $this->Paneles_Model->EliminarUsuarioById($post['id']);
				if($hecho){
					$data['usuario'] = $this->Usuario;
					$data['usuario'] += array("tipo" => $this->session_tipo);
					$data['session'] = $this->session;
					$data['estadisticas'] = $this->Paneles_Model->getContadoresEmp();
					if($data['estadisticas']['Contadores']){ $data['Empleados'] = $this->Paneles_Model->getContadoresEmpleados(); }
					$this->load->view("PanelControl/components/ContadoresCRUD",$data);
				}	
			}
		}
		public function ActualizarUsuarioById()
		{
			$post = $this->input->post();
			if(!empty($post) 
				&& isset($post['id']) && !empty($post['id'])
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
				$hecho = $this->Paneles_Model->actualizarUsuarioById($us,$post['id']);
				if($hecho){
					$data['usuario'] = $this->Usuario;
					$data['usuario'] += array("tipo" => $this->session_tipo);
					$data['session'] = $this->session;
					$data['estadisticas'] = $this->Paneles_Model->getContadoresEmp();
					if($data['estadisticas']['Contadores']){ $data['Empleados'] = $this->Paneles_Model->getContadoresEmpleados(); }
					$this->load->view("PanelControl/components/ContadoresCRUD",$data);	
				}
			}
		}

		public function configAddCategoria()
		{
			$data['config']="addcategoria";
			
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/cateSeccyPre",$data);	
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
					$this->configuracionPreguntas();	
				}
			}
			
		}

		public function configUpCategoria()
		{
			$data['config']="upcategoria";
			$data['catact']=$_GET['cat'];
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/cateSeccyPre",$data);	
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
					$this->configuracionPreguntas();	
				}
			}
			
		}

		public function configDelCategoria()
		{
			$data['config']="deletecategoria";
			$data['catact']=$_GET['cat'];
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/cateSeccyPre",$data);	
		}

		public function deleteCategoria()
		{
			$post = $this->input->post();
			if(!empty($post) 
				&& isset($post['id']) && !empty($post['id'])
			){
				$hecho = $this->Paneles_Model->eliminarCategoria($post['id']);
				if($hecho){
					$this->configuracionPreguntas();	
				}
			}
			
		}

		public function configAddSeccion()
		{
			$data['config']="addseccion";
			$data['catact']=$_GET['cat'];
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/cateSeccyPre",$data);	
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
					$this->configuracionPreguntas();	
				}
			}
			
		}

		public function configUpSeccion()
		{
			$data['config']="upseccion";
			$data['catact']=$_GET['cat'];
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/cateSeccyPre",$data);	
		}

		public function configDelSeccion()
		{
			$data['config']="deleteseccion";
			$data['catact']=$_GET['cat'];
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/cateSeccyPre",$data);	
		}

		public function addPregunta()
		{
			$post = $this->input->post();
			if(!empty($post) 
				&& isset($post['categoria']) && !empty($post['categoria'])
				&& isset($post['seccion']) && !empty($post['seccion'])
				&& isset($post['texto']) && !empty($post['texto'])
			){
				$us = 	array(
					"seccion"=>strtoupper($post['seccion']),
					"categoria" => strtoupper($post['categoria']),
					"texto"=>$post['texto']
				);
				$hecho = $this->Paneles_Model->registrarSeccion($us);
				if($hecho){
					$this->configuracionPreguntas();	
				}
			}
		}

		public function configUpPregunta()
		{
			$data['config']="uppregunta";
			$data['catact']=$_GET['cat'];
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/cateSeccyPre",$data);	
		}
	// Fin funciones AJAX
}

