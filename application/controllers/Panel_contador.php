<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * [Panel_admin] [Clase] [esta clase es solo para el administador]
 * tipos de Usuarios
 * Administrador = roll 0
 * Contador  = roll 1
 * Cliente = roll 2
 */
	class Panel_contador extends MY_Controller {
	protected $nivelAcceso = "Contador" ;
	protected $Usuario = array();
	protected $post ;
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
		$this->post = $this->input->post();
	}

	/**
	 * Panel Principal ($route['PanelDeControl'])
	 */
	public function index()
	{
		$data['menu'] = "Panel" ;
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['estadisticas'] = $this->Paneles_Model->getContadoresUsuarios();
		$data['session'] = $this->session;

		$data['categorias']=$this->Paneles_Model->getCategorias();
		$data['numsecciones']=$this->Paneles_Model->getNumSecciones();
		$data['preguntas']=$this->Paneles_Model->getNumPreguntas();
		$data['archivos']=$this->Paneles_Model->getSoliArchivo();
		$data['obligatorios']=$this->Paneles_Model->getObliArchivo();

		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelControl/Panel',$data);
		$this->load->view('templates/footer');
	}
	public function Clientes()
	{
		$data['menu'] = "Clientes" ;
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['session'] = $this->session;
		$data['estadisticas'] = $this->Paneles_Model->getContadoresClientes();
		if($data['estadisticas']['Clientes']){ $data['Clientes'] = $this->Paneles_Model->getInfoClientes(); }
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelControl/Panel',$data);
		$this->load->view('templates/footer');
	}
	public function getTituloPanel()
		{
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/TituloPanel",$data);
		}

		public function getActualizacionPerfil()
		{
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/perfilActualizacion",$data);
		}
		public function FormularioClientes()
		{
			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/RegistroClientes",$data);	
		}	
			public function AgregarCliente()
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
				$hecho = $this->Paneles_Model->RegistrarCliente($us);
				if($hecho){
					$data['usuario'] = $this->Usuario;
					$data['usuario'] += array("tipo" => $this->session_tipo);
					$data['session'] = $this->session;
					$data['estadisticas'] = $this->Paneles_Model->getContadoresClientes();
					if($data['estadisticas']['Clientes']){ $data['Clientes'] = $this->Paneles_Model->getInfoClientes(); }
					$this->load->view("PanelControl/components/CrudClientes",$data);	
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
				$hecho = $this->Paneles_Model->actualizarDatosUsuario($us,$this->session_id);
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

				$idUsuuarii = $post['id'];
				$roll = $this->Paneles_Model->getRollById($idUsuuarii);
				$hecho = $this->Paneles_Model->EliminarUsuarioById($post['id']);
				if($hecho){
					$data['usuario'] = $this->Usuario;
					$data['usuario'] += array("tipo" => $this->session_tipo);
					$data['session'] = $this->session;
					if($roll=="1" )
					{
						$data['estadisticas'] = $this->Paneles_Model->getContadoresEmp();
						if($data['estadisticas']['Contadores']){ $data['Empleados'] = $this->Paneles_Model->getContadoresEmpleados(); }
						$this->load->view("PanelControl/components/ContadoresCRUD",$data);	
					}
					if($roll=="2" ){
						$data['estadisticas'] = $this->Paneles_Model->getContadoresClientes();
						if($data['estadisticas']['Clientes']){ $data['Clientes'] = $this->Paneles_Model->getInfoClientes(); }
						$this->load->view("PanelControl/components/CrudClientes",$data);	
					}
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
				$idUsuuarii = $post['id'];
				$roll = $this->Paneles_Model->getRollById($idUsuuarii);
				$hecho = $this->Paneles_Model->actualizarUsuarioById($us,$post['id']);
				if($hecho)
				{
					$data['usuario'] = $this->Usuario;
					$data['usuario'] += array("tipo" => $this->session_tipo);
					$data['session'] = $this->session;
					if($roll=="1" )
					{
						$data['estadisticas'] = $this->Paneles_Model->getContadoresEmp();
						if($data['estadisticas']['Contadores']){ $data['Empleados'] = $this->Paneles_Model->getContadoresEmpleados(); }
						$this->load->view("PanelControl/components/ContadoresCRUD",$data);	
					}
					if($roll=="2" ){
						$data['estadisticas'] = $this->Paneles_Model->getContadoresClientes();
						if($data['estadisticas']['Clientes']){ $data['Clientes'] = $this->Paneles_Model->getInfoClientes(); }
						$this->load->view("PanelControl/components/CrudClientes",$data);	
					}
				}
			}
		}
		public function getEmpresas()
		{
			$idCliente = $this->input->get('cliente');
			$Cliente = (isset($idCliente))? $idCliente : false ; 
			if($Cliente){
				$data["empresas"] = $this->Paneles_Model->EmpresasByCliente($Cliente);
			}

			$data['usuario'] = $this->Usuario;
			$data['usuario'] += array("tipo" => $this->session_tipo);
			$data['session'] = $this->session;
			$this->load->view("PanelControl/components/CrudEmpresas",$data);
		}
		
	
}