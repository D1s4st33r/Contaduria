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


}

/* End of file Panel_Admin_Cliente.php */
