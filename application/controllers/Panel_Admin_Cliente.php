<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_Admin_Cliente extends MY_Controller {
	
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
		if($this->nivelAcceso != $this->session_tipo)
		{
			redirect('Login/index?error_login=session','refresh');
		}
		//cargar datos
		$this->load->model('Paneles_Model');// cargar modelo
		$this->load->model('Panel_Admin_Cliente_Model');// cargar modelo
		$this->Usuario = $this->Paneles_Model->getInfoUsuarioPorId($this->session_id); // obtiene todos la info de usuario
		$this->post = $this->input->post();
		// datos necesarios Base para los componentes
		$this->data['usuario'] = $this->Usuario;
		$this->data['usuario'] += array("tipo" => $this->session_tipo);
		$this->data['session'] = $this->session;
    }

    
	public function Clientes()
	{
		$this->data['menu'] = "Clientes" ;
		
		$this->data['estadisticas'] = $this->Panel_Admin_Cliente_Model->getCuentaClientesEnSistema();
		if( $this->data['estadisticas'] )
		{ 
			$this->data['clientes'] = $this->Panel_Admin_Cliente_Model->getInfoClientes(); //info_empresas
			// var_dump($this->data['clientes']);
		}else
		{
			$this->data['clientes'] = array();
		}
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelControl/Panel',$this->data);
		$this->load->view('templates/footer');
    }

    public function FormularioClientes()
    {	
        $this->load->view("PanelControl/components/clientesAdmin/RegistroClientes",$this->data);	
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
				$hecho = $this->Panel_Admin_Cliente_Model->RegistrarCliente($us);
				if($hecho){
					$this->data['usuario'] = $this->Usuario;
					$this->data['usuario'] += array("tipo" => $this->session_tipo);
					
					$this->data['estadisticas'] = $this->Panel_Admin_Cliente_Model->getCuentaClientesEnSistema();
                    if($this->data['estadisticas'])
                    { 
                        $this->data['clientes'] = $this->Panel_Admin_Cliente_Model->getInfoClientes(); 
                    }
					$this->load->view("PanelControl/components/clientesAdmin/CrudClientes",$this->data);	
				}
			}	
        }
        
        public function ActualizarCliente()
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
				$hecho = $this->Panel_Admin_Cliente_Model->ActualizarCliente($us,$post['id']);
				if($hecho ){
					$this->data['estadisticas'] = $this->Panel_Admin_Cliente_Model->getCuentaClientesEnSistema();
                    if($this->data['estadisticas'])
                    { 
                        $this->data['clientes'] = $this->Panel_Admin_Cliente_Model->getInfoClientes(); 
                    }
					$this->load->view("PanelControl/components/clientesAdmin/CrudClientes",$this->data);
					
				}
            }   
        }
        
    public function EliminarCliente()
    {
        $post = $this->input->post();
        if(!empty($post) && isset($post['id']) && !empty($post['id']))
        {
            $hecho = $this->Panel_Admin_Cliente_Model->EliminarCliente($post['id']);
            if($hecho ){
                $this->data['estadisticas'] = $this->Panel_Admin_Cliente_Model->getCuentaClientesEnSistema();
                if($this->data['estadisticas'])
                { 
                    $this->data['clientes'] = $this->Panel_Admin_Cliente_Model->getInfoClientes(); 
                }
                $this->load->view("PanelControl/components/clientesAdmin/CrudClientes",$this->data);
                
            }	
        }
	}
	

	public function AsignarContadorFormulario()
	{
		$idCliente = $this->input->get("idCliente");
		$this->data['idCliente'] = $idCliente;
		$this->load->view("PanelControl/components/clientesAdmin/asignarContador",$this->data);	
	}

	public function BuscadorContador()
	{
		if($this->input->post() && !empty( $this->input->post("search")))
		{
			$search = $this->input->post("search");
			if(!empty($search))
			{
				$Contadores = $this->Panel_Admin_Cliente_Model->GetContadoreLike($search);
				if(!empty($Contadores)){echo json_encode(array("Contadores"=>$Contadores));}
				else{echo json_encode(array("Contadores"=>array(array("nombre"=> "Contador No" ,"apellido"=>"Encontrado","id"=>0))));}
				
			}else{
				echo json_encode(array("Contadores"=>array(array("nombre"=> "Contador No" ,"apellido"=>"Encontrado","id"=>0))));
			}
		}else{
			echo json_encode(array("Contadores"=>array(array("nombre"=> "Contador No" ,"apellido"=>"Encontrado","id"=>0))));
		}
	}
	public function AsignarContadorACliente()
	{
		$Ids = $this->input->post();
		if(
			!empty($Ids) && $Ids['IdContador'] != '0'
		)
		{	
			$this->Panel_Admin_Cliente_Model->setContadorCliente($Ids);
			$this->data['contador'] = $this->Panel_Admin_Cliente_Model->getContadoresClienteByIdCliente($Ids['IdCliente']);
			$this->data['cliente']= $Ids['IdCliente'];
			$this->load->view('PanelControl/components/clientesAdmin/ListaContadoresCliente',$this->data);
		
			
		}
	}
	public function ContadorAsignadoLink()
	{
		$idCliente = $this->input->get("idCliente");
		$this->data['cliente']['id'] = $idCliente;
		$this->data['cliente']['info_empresas'] = $this->Panel_Admin_Cliente_Model->getContadorEmpresaById($idCliente); 
		
		$this->load->view("PanelControl/components/clientesAdmin/clienteContadorAsignadoView",$this->data);	

	}

	public function ListaContadorCliente()
	{
		$idCliente = $this->input->get("idCliente");
		$this->data['contador'] = $this->Panel_Admin_Cliente_Model->getContadoresClienteByIdCliente($idCliente);
		$this->data['cliente'] = $idCliente;
		// var_dump($idCliente);
		$this->load->view('PanelControl/components/clientesAdmin/ListaContadoresCliente',$this->data);
	}

	public function getEmpresas()
	{
		$idCliente = $this->input->get('cliente');
		$Cliente = (isset($idCliente))? $idCliente : false ; 
		if($Cliente)
		{
			$this->data["empresas"] = $this->Panel_Admin_Cliente_Model->EmpresasByCliente($Cliente);
		}
		
		$this->data['session'] = $this->session."&cliente=".$idCliente;
		$this->load->view("PanelControl/components/clientesAdmin/CrudEmpresas",$this->data);
	}
	public function FormularioClienteEmpresa()
	{
		$this->data['id_cliente'] = $this->input->get('cliente');
		if($this->data['id_cliente'])
		{
			$this->data["empresas"] = $this->Panel_Admin_Cliente_Model->EmpresasByCliente($this->data['id_cliente']);
		}
		
		$this->load->view("PanelControl/components/clientesAdmin/FormularioEmpresa",$this->data);

	}
		
}

/* End of file Panel_Admin_Cliente.php */
