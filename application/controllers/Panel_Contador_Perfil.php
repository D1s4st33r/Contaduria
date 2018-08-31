<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * [Panel_admin] [Clase] [esta clase es solo para el administador]
 * tipos de Usuarios
 * Administrador = roll 0
 * Contador  = roll 1
 * Cliente = roll 2
 */
	class Panel_Contador_Perfil extends MY_Controller {
	protected $nivelAcceso = "Contador" ;
	protected $Usuario = array();
	protected $post ;
    
    public function __construct()
	{
        parent::__construct();
		if($this->nivelAcceso != $this->session_tipo)
		{
			redirect('Login/index?error_login=session','refresh');
		}
		$this->load->model('Paneles_Model');// cargar modelo
        $this->load->model('Panel_Contador_Perfil_Model');
        
		$this->Usuario = $this->Paneles_Model->getInfoUsuarioPorId($this->session_id); // obtiene todos la info de usuario
		$this->post = $this->input->post();
		// datos necesarios Base para los componentes
        $this->data['usuario'] = $this->Usuario;
		$this->data['usuario'] += array("tipo" => $this->session_tipo);
		$this->data['session'] = $this->session;
    }
    
    public function Perfil()
	{
		$this->data['menu'] = "Panel" ;
		$this->data['estadisticas'] = $this->Panel_Contador_Perfil_Model->getContadoresClientes($this->session_id);
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelContadores/Panel',$this->data);
		$this->load->view('templates/footer');
    }
    
    public function FormularioParaActualizarCont()
    {
        $this->load->view("PanelContadores/components/Perfil/perfilActualizacion",$this->data);
	}
	public function ActualizarPerfilCont()
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
			$hecho = $this->Panel_Contador_Perfil_Model->ActualizarPerfil($us,$this->session_id);
			if($hecho)
			{	
				//Panel ModelGenerl
				$this->Usuario = $this->Paneles_Model->getInfoUsuarioPorId($this->session_id); // obtiene todos la info de usuario
				$this->data['usuario'] = $this->Usuario;
				$this->load->view('PanelContadores/components/Perfil/perfilVista',$this->data);	
			}
		}else{
			$this->getActualizacionPerfil();	
		}	
	}

	public function getTituloPanelCont()
	{
		$this->load->view("PanelContadores/components/TituloPanel",$this->data);
	}

	public function RestablecerContrasenaConta()
	{
		if ( !empty($this->input->post())
				&& !empty($this->input->post("claveActual")) 
				&& !empty($this->input->post("claveNueva")) 
				&& !empty($this->input->post("claveNuevaRep"))
			){
			$datos=array(
				'id' => $this->session_id ,
				"actual" => $this->input->post("claveActual"),
				"nueva" =>	$this->input->post("claveNueva")
			);
			if(  $this->input->post("claveNueva") === $this->input->post("claveNuevaRep") )
			{	
				if( $this->Paneles_Model->CambiarContrasena( $datos)){
					$this->load->view('PanelControl/errores/mensajesError', $data =array( "error" => "pswHecho"));
				}else{
					$this->load->view('PanelControl/errores/mensajesError', $data =array( "error" => "ErrorChngPswd"));
				}
				
			}else{
				$this->load->view('PanelControl/errores/mensajesError', $data =array( "error" => "ErrorChngPswd"));
			}
		}else{
			$this->load->view('PanelControl/errores/mensajesError', $data =array( "error" => "ErrorChngPswd"));
			
		}
	}
	public function perfilVista()
	{
		$this->load->view("PanelContadores/components/Perfil/perfilVista",$this->data);	
	}
}