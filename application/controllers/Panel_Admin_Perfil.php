<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_Admin_Perfil extends MY_Controller 
{
    protected $nivelAcceso = "Administrador" ;
	protected $Usuario = array();
	protected $post = array();
	protected $data = array();
	protected $session ;

    //contructor Que todos Deben de tener
	public function __construct()
	{
		parent::__construct();
		
		if($this->nivelAcceso != $this->session_tipo)
		{
			redirect('Login/index?error_login=session','refresh');
		}
		//cargar datos
        $this->load->model('Paneles_Model');// cargar modelo
        $this->load->model('Panel_Admin_Perfil_Model');
        
		$this->Usuario = $this->Paneles_Model->getInfoUsuarioPorId($this->session_id); // obtiene todos la info de usuario
		$this->post = $this->input->post();
		// datos necesarios Base para los componentes
		$this->data['usuario'] = $this->Usuario;
		$this->data['usuario'] += array("tipo" => $this->session_tipo);
		$this->data['session'] = $this->session;
    }
    
    // inicio del panel Admin
    public function Perfil()
	{
		$this->data['menu'] = "Panel" ;
		// obtiene los contadores de usuarios y empresas
		$this->data['estadisticas'] = $this->Panel_Admin_Perfil_Model->getContadoresUsuarios();
		$this->data['categorias']=$this->Panel_Admin_Perfil_Model->getCategorias();
		$this->data['numsecciones']=$this->Panel_Admin_Perfil_Model->getNumSecciones();
		$this->data['preguntas']=$this->Panel_Admin_Perfil_Model->getNumPreguntas();
		$this->data['archivos']=$this->Panel_Admin_Perfil_Model->getSoliArchivo();
		$this->data['obligatorios']=$this->Panel_Admin_Perfil_Model->getObliArchivo();

		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelControl/Panel',$this->data);
		$this->load->view('templates/footer');
	}

	public function FormularioParaActualizar()
	{
		$this->load->view("PanelControl/components/perfilAdmin/perfilActualizacion",$this->data);
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
			if($hecho)
			{	
				$this->Usuario = $this->Paneles_Model->getInfoUsuarioPorId($this->session_id); // obtiene todos la info de usuario
				$this->data['usuario'] = $this->Usuario;
				$this->load->view("PanelControl/components/perfilAdmin/perfilVista",$this->data);	
			}else{
				
			}
		}else{
		$this->getActualizacionPerfil();	
		}	
	}

	public function perfilVista()
	{
		$this->load->view("PanelControl/components/perfilAdmin/perfilVista",$this->data);	
	}

	public function RestablecerContrasenaAdmin()
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

}

/* End of file Panel_Admin_Perfil.php */
