<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_Admin_Contador extends MY_Controller 
{
    protected $nivelAcceso = "Administrador" ;
	protected $Usuario = array();
	protected $post = array();
	protected $data = array();
	protected $session;

    public function __construct()
	{
		parent::__construct();
		
		if($this->nivelAcceso != $this->session_tipo)
		{
			redirect('Login/index?error_login=session','refresh');
		}
		//cargar datos
		$this->load->model('Paneles_Model',"modeloBase");// cargar modelo
		$this->load->model('Panel_Admin_Contador_Model');// cargar modelo
		$this->Usuario = $this->modeloBase->getInfoUsuarioPorId($this->session_id); // obtiene todos la info de usuario
		$this->post = $this->input->post();
		// datos necesarios Base para los componentes
		$this->data['usuario'] = $this->Usuario;
		$this->data['usuario'] += array("tipo" => $this->session_tipo);
		$this->data['session'] = $this->session;
	}

    
/**
	 * Seccion de Contadores Administrador ($route['ControlContadores])
	 */
	public function Contadores()
	{
		$this->data['menu'] = "Contadores" ;
		$this->data['estadisticas'] = $this->Panel_Admin_Contador_Model->getSumaContadoresEnSistemas();
		if($this->data['estadisticas'])
		{ 
			$this->data['datosDeContadoresEmpleados'] = $this->Panel_Admin_Contador_Model->getContadoresRegistradosEnSistema(); 
		}
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelControl/Panel',$this->data);
		$this->load->view('templates/footer');
	}

	public function ContadoresPorNombre()
	{
		if($this->input->post() && !empty( $this->input->post("search")))
		{
			$search = $this->input->post("search");
			if(!empty($search))
			{
				$Contadores = $this->Panel_Admin_Contador_Model->GetContadoreLike($search);
				if(!empty($Contadores)){echo json_encode(array("Contadores"=>$Contadores));}
				else{echo json_encode(array("Contadores"=>array(array("nombre"=> "Contador No" ,"apellido"=>"Encontrado","id"=>0))));}
				
			}else{
				echo json_encode(array("Contadores"=>array(array("nombre"=> "Contador No" ,"apellido"=>"Encontrado","id"=>0))));
			}
		}else{
			echo json_encode(array("Contadores"=>array(array("nombre"=> "Contador No" ,"apellido"=>"Encontrado","id"=>0))));
		}
	}
	public function ClientesPorNombreParaContadores()
	{
		if($this->input->post() && !empty( $this->input->post("search")))
		{
			$search = $this->input->post("search");
			if(!empty($search))
			{
				$Clientes = $this->Panel_Admin_Contador_Model->GetClienteLike($search);
				if(!empty($Clientes)){echo json_encode(array("Clientes"=>$Clientes));}
				else{echo json_encode(array("Clientes"=>array(array("nombre"=> "Cliente No" ,"apellido"=>"Encontrado","id"=>0))));}
				
			}else{
				echo json_encode(array("Clientes"=>array(array("nombre"=> "Cliente No" ,"apellido"=>"Encontrado","id"=>0))));
			}
		}else{
			echo json_encode(array("Clientes"=>array(array("nombre"=> "Cliente No" ,"apellido"=>"Encontrado","id"=>0))));
		}
	}

	public function EmpresaByRazonSocial()
	{
		if($this->input->post() && !empty( $this->input->post("search")))
		{
			$search = $this->input->post("search");
			if(!empty($search))
			{
				$Empresas = $this->Panel_Admin_Contador_Model->getEmpresaLike($search);
				if(!empty($Empresas)){echo json_encode(array("Empresas"=>$Empresas));}
				else{echo json_encode(array("Empresas"=>array(array("razonSocial"=> "Empresa no encontrada" ,"rfc"=>""))));}
				
			}else{
				echo json_encode(array("Empresas"=>array(array("razonSocial"=> "Empresa no encontrada" ,"rfc"=>""))));
			}
		}else{
			echo json_encode(array("Empresas"=>array(array("razonSocial"=> "Empresa no encontrada" ,"rfc"=>""))));
		}
	}

	public function CrudContadorById()
	{
		$idContador = $this->input->get("idContador");
		$this->data['estadisticas'] = $this->Panel_Admin_Contador_Model->getContadorSeleccionado($idContador);
		$this->data['datosDeContadoresEmpleados'] = $this->Panel_Admin_Contador_Model->getContadorRegistradoPorId($idContador); 
		$this->load->view('PanelControl/components/contadorAdmin/contadores_crud',$this->data);	
	}

	public function EliminarContadorCliente()
	{
		$idCliente = $this->input->get("idCliente");
		$idContador = $this->input->get("idContador");
		if(isset($idCliente) && !empty($idCliente) 
			&& isset($idContador) && !empty($idContador)
		)
		{
			$this->data['idContador'] = $idContador;
			$this->Panel_Admin_Contador_Model->EliminarContadorPorId($idCliente,$idContador);	
			$this->data['clientes']  = $this->Panel_Admin_Contador_Model->getClientesContadoresById($this->data['idContador']); 
			$this->data['auxiliando']  = $this->Panel_Admin_Contador_Model->getEmpresasContadoresById($this->data['idContador']); 
			$this->load->view('PanelControl/components/contadorAdmin/contadores_crud_lista_clientes', $this->data);

		}
	}

	public function EliminarContadorEmpresa()
	{
		$rfc = $this->input->get("rfc");
		$idContador = $this->input->get("idContador");
		if(isset($rfc) && !empty($rfc) 
			&& isset($idContador) && !empty($idContador)
		)
		{
			$this->data['idContador'] = $idContador;
			$this->Panel_Admin_Contador_Model->EliminarEmpresaDeContadorPorId($rfc,$idContador);	
			$this->data['clientes']  = $this->Panel_Admin_Contador_Model->getClientesContadoresById($this->data['idContador']); 
			$this->data['auxiliando']  = $this->Panel_Admin_Contador_Model->getEmpresasContadoresById($this->data['idContador']); 
			$this->load->view('PanelControl/components/contadorAdmin/contadores_crud_lista_clientes', $this->data);

		}
	}

	public function AgregarContador()
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
				$hecho = $this->Panel_Admin_Contador_Model->RegistrarContador($us);
				if($hecho){
					$this->data['usuario'] = $this->Usuario;
					$this->data['usuario'] += array("tipo" => $this->session_tipo);
					
					$this->data['estadisticas'] = $this->Panel_Admin_Contador_Model->getSumaContadoresEnSistemas();
					if($this->data['estadisticas']){ $this->data['datosDeContadoresEmpleados'] = $this->Panel_Admin_Contador_Model->getContadoresRegistradosEnSistema(); }
					$this->load->view("PanelControl/components/contadorAdmin/contadores_crud",$this->data);	
				}
			}
			
		}
		public function ActualizarContador()
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
				$hecho = $this->Panel_Admin_Contador_Model->ActualizarContador($us,$post['id']);
				if($hecho ){
					$this->data['estadisticas'] = $this->Panel_Admin_Contador_Model->getSumaContadoresEnSistemas();
					if($this->data['estadisticas']){ $this->data['datosDeContadoresEmpleados'] = $this->Panel_Admin_Contador_Model->getContadoresRegistradosEnSistema(); }
					$this->load->view("PanelControl/components/contadorAdmin/contadores_crud",$this->data);	
					
				}
			}
		}

		public function EliminarContador()
		{
			$post = $this->input->post();
			if(!empty($post) && isset($post['id']) && !empty($post['id']))
			{
				$hecho = $this->Panel_Admin_Contador_Model->EliminarContador($post['id']);
				if($hecho){
					$this->data['usuario'] = $this->Usuario;
					$this->data['usuario'] += array("tipo" => $this->session_tipo);
					
					$this->data['estadisticas'] = $this->Panel_Admin_Contador_Model->getSumaContadoresEnSistemas();
					if($this->data['estadisticas']){ $this->data['datosDeContadoresEmpleados'] = $this->Panel_Admin_Contador_Model->getContadoresRegistradosEnSistema(); }
					$this->load->view("PanelControl/components/contadorAdmin/contadores_crud",$this->data);	
				}	
			}
		}

		public function AsignarCliente()
		{
			$Ids = $this->input->post();
			if(
				!empty($Ids) && $Ids['IdContador'] != '0'
			)
			{	
				$this->Panel_Admin_Contador_Model->setContadorCliente($Ids);
				$this->data['idContador'] = $Ids["IdContador"];
				$this->data['clientes']  = $this->Panel_Admin_Contador_Model->getClientesContadoresById($this->data['idContador']); 
				$this->data['auxiliando']  = $this->Panel_Admin_Contador_Model->getEmpresasContadoresById($this->data['idContador']); 
				$this->load->view('PanelControl/components/contadorAdmin/contadores_crud_lista_clientes', $this->data);
			}
		}
		public function AsignarEmpresaContador()
		{
			$Ids = $this->input->post();
			if(
				!empty($Ids) && $Ids['IdContador'] != '0'
			)
			{	
				$this->Panel_Admin_Contador_Model->setEmpresaCliente($Ids);
				$this->data['idContador'] = $Ids["IdContador"];
				$this->data['clientes']  = $this->Panel_Admin_Contador_Model->getClientesContadoresById($this->data['idContador']); 
				$this->data['auxiliando']  = $this->Panel_Admin_Contador_Model->getEmpresasContadoresById($this->data['idContador']); 
				$this->load->view('PanelControl/components/contadorAdmin/contadores_crud_lista_clientes', $this->data);
			}
		}

		public function VerListaClientesAsignados()
		{
			$this->data['idContador'] = $this->input->get("idContador");
			$this->data['clientes']  = $this->Panel_Admin_Contador_Model->getClientesContadoresById($this->data['idContador']); 
			$this->data['auxiliando']  = $this->Panel_Admin_Contador_Model->getEmpresasContadoresById($this->data['idContador']); 
			$this->load->view('PanelControl/components/contadorAdmin/contadores_crud_lista_clientes', $this->data);

		}

		public function VerLinksContador()
		{
			$this->data['idContador'] = $this->input->get("idContador");
			$var = $this->Panel_Admin_Contador_Model->TieneEmpresasByIdContador($this->data['idContador']);
			
			$this->data['clientes']  = $this->Panel_Admin_Contador_Model->getClientesContadoresById($this->data['idContador']); 
			$this->data['clientes']['total'] = $var['clientes']['total'];
			$this->data['auxiliando']  = $this->Panel_Admin_Contador_Model->getEmpresasContadoresById($this->data['idContador']); 
			$this->data['auxiliando']['total'] = $var['auxiliando']['total'];
			$this->load->view('PanelControl/components/contadorAdmin/contadores_crud_clientes_links', $this->data);
		}

		public function BuscadorParaContadores()
		{
			$this->data['idContador'] = $this->input->get("idContador");
			$this->load->view('PanelControl/components/contadorAdmin/contadores_crud_buscador',$this->data);
		}

		public function BuscadorClientesContadores()
		{
			$this->data['idContador'] = $this->input->get("idContador");
			$this->load->view('PanelControl/components/contadorAdmin/contadores_crud_buscador_clientes', $this->data);
			
		}
		public function BuscadorContadoresEmpresas()
		{
			$this->data['idContador'] = $this->input->get("idContador");
			$this->load->view('PanelControl/components/contadorAdmin/contadores_crud_buscador_empresa', $this->data);
			
		}
		
		public function getActualizacionPerfil()
		{
			$this->Usuario = $this->Paneles_Model->getInfoUsuarioPorId($this->session_id); // obtiene todos la info de usuario
			$this->data['usuario'] = $this->Usuario;
			$this->load->view("PanelControl/components/perfilActualizacion",$this->data);
		}
		
		public function FormularioEmpContador()
		{	
			$this->load->view("PanelControl/components/contadorAdmin/RegistroContadores",$this->data);	
		}	
		
	
}

/* End of file Panel_Admin_Contador.php */
