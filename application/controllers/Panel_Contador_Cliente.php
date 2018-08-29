<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * [Panel_admin] [Clase] [esta clase es solo para el administador]
 * tipos de Usuarios
 * Administrador = roll 0
 * Contador  = roll 1
 * Clientesnte = roll 2
 */
	class Panel_Contador_Cliente extends MY_Controller {
	protected $nivelAcceso = "Contador" ;
	protected $Usuario = array();
	protected $post ;
	
	/**
	 * No tocar
	 */
    public function __construct()
	{
        parent::__construct();
		if($this->nivelAcceso != $this->session_tipo)
		{
			redirect('Login/index?error_login=session','refresh');
		}
		$this->load->model('Paneles_Model');// cargar modelo
        $this->load->model('Panel_Contador_Cliente_Model');
        
		$this->Usuario = $this->Paneles_Model->getInfoUsuarioPorId($this->session_id); // obtiene todos la info de usuario
		$this->post = $this->input->post();
		// datos necesarios Base para los componentes
        $this->data['usuario'] = $this->Usuario;
		$this->data['usuario'] += array("tipo" => $this->session_tipo);
		$this->data['session'] = $this->session;
    }
    /**
	 * No tocar Fin
	 */

    public function Clientes()
	{
		$this->data['menu'] = "Clientes" ;
		$this->data['estadisticas'] =$this->Panel_Contador_Cliente_Model->getTotalClientesAsignados($this->session_id);
		if( $this->data['estadisticas'] )
		{ 
			$this->data['clientes'] = $this->Panel_Contador_Cliente_Model->getTodosCliente($this->session_id); //info_empresas
			// var_dump($this->data['clientes']);
		}else
		{
			$this->data['clientes'] = array();
		}
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelContadores/Panel',$this->data);
		$this->load->view('templates/footer');
	}


    public function FormularioClienteConta()
    {	
        $this->load->view("PanelContadores/components/Clientes/RegistroClientes",$this->data);	
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

}