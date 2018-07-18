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
		$data['menu']= "ConfPreguntas" ;
		$data['config']=	"";
		$data['idcat']=	"";
		$data['titulo']="";
		$data['categoria']	 = (isset($_GET['cat']) && !empty($_GET['cat'])) ? $_GET['cat'] : "" ;
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['session'] = $this->session;
		$data['categorias']=$this->Paneles_Model->getCategorias();
		$data['secciones']=$this->Paneles_Model->getSecciones();
		$data['preguntas']=$this->Paneles_Model->getNumPreguntas();
		$data['archivos']=$this->Paneles_Model->getSoliArchivo();
		$data['obligatorios']=$this->Paneles_Model->getObliArchivo();
		if($data['categoria']!="ind")
		{
			$data['detalles']=$this->Paneles_Model->getSpecificSecciones(strtoupper($data['categoria']));
			$data['specific']=$this->Paneles_Model->getPreguntas(strtoupper($data['categoria']));
			$data["titulo"]=strtoupper($data['categoria']);
			$data['idcat']=(isset($_GET['idcat']) && !empty($_GET['idcat'])) ? $_GET['idcat'] : "" ;
		}
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

		public function configCancelar()
		{
			$data['config']="cancelar";
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/cateSeccyPre",$data);	
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
			$data['secciones']=$this->Paneles_Model->getSpecificSecciones($_GET['cat']);
			$this->load->view("PanelControl/components/cateSeccyPre",$data);	
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
					$this->configuracionPreguntas();	
				}
			}
		}

		public function configDelSeccion()
		{
			$data['config']="deleteseccion";
			$data['catact']=$_GET['cat'];
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$data['secciones']=$this->Paneles_Model->getSpecificSecciones($_GET['cat']);
			$this->load->view("PanelControl/components/cateSeccyPre",$data);	
		}

		public function deleteSeccion()
		{
			$post = $this->input->post();
			if(!empty($post) 
				&& isset($post['id']) && !empty($post['id'])
			){
				$hecho = $this->Paneles_Model->eliminarSeccion($post['id']);
				if($hecho){
					$this->configuracionPreguntas();	
				}
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
					"tipo"=>"defaulth",
					"obligatorio"=>"0",
					"soliarchivo"=>"0",
					"preguntaOpcional"=>"pregunta opcional"
				);
				$hecho=$this->Paneles_Model->registrarDetalles($detalle);
				if($hecho)
				{
					$this->configuracionPreguntas();	
				}
			}
		}

		public function configUpPregunta()
		{
			$data['config']="uppregunta";
			$data['catact']=$_GET['cat'];
			$data['id']=$_GET['idpre'];
			$data['pregunta']=$this->Paneles_Model->getSpecificPregunta($data['id']);
			$num=$this->Paneles_Model->validacionDetalles($data['id']);
			if($num==0)
			{
				$detalle = array(
				"id_pregunta" => $data['id'],
				"tipo"=>"default",
				"obligatorio"=>"0",
				"soliarchivo"=>"0",
				"preguntaOpcional"=>"pregunta opcional"
			);
			$this->Paneles_Model->registrarDetalles($detalle);
			}
			$data['detalles']=$this->Paneles_Model->getDetallesPregunta($data['id']);
			$data['categorias']=$this->Paneles_Model->getCategorias();
			$data['secciones']=$this->Paneles_Model->getSpecificSecciones($_GET['cat']);
			$data['catalogo']=$this->Paneles_Model->getCatalogo();
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/cateSeccyPre",$data);	
		}

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
				//&& isset($post['soliarchivo']) && !empty($post['soliarchivo'])
				//&& isset($post['obligatorio']) && !empty($post['obligatorio'])
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
					"preguntaOpcional"=>$post['preguntaOpcional']
				);
				var_dump($pregunta);
				$hechopre = $this->Paneles_Model->actualizarPregunta($pregunta,$post['id']);
				$hechode = $this->Paneles_Model->actualizarDetallesPregunta($detalles,$post['id']);
				if($hechopre && $hechode ){
					$this->configuracionPreguntas();	
				}
			}
			
		}

		public function configDelPregunta()
		{
			$data['config']="deletepregunta";
			$data['catact']=$_GET['cat'];
			$data['id']=$_GET['idpre'];
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/cateSeccyPre",$data);	
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
					$this->configuracionPreguntas();	
				}
			}
		}
	// Fin funciones AJAX
}

