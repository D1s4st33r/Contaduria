<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_Admin_Boveda extends MY_Controller {

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
		$this->load->model('Boveda_Model');// cargar modelo
		$this->load->model('Panel_Admin_Cliente_Model');// cargar modelo
		$this->Usuario = $this->Paneles_Model->getInfoUsuarioPorId($this->session_id); // obtiene todos la info de usuario
		$this->post = $this->input->post();
		// datos necesarios Base para los componentes
		$this->data['usuario'] = $this->Usuario;
		$this->data['usuario'] += array("tipo" => $this->session_tipo);
		$this->data['session'] = $this->session;
    }

    public function Boveda()
    {
        $this->data['menu'] = "Boveda" ;
        $this->data['clientes'] =$this->Boveda_Model->getEmpresasAdmin();
        $this->load->view('templates/headerLimpio');
		$this->load->view('PanelControl/Panel',$this->data);
		$this->load->view('templates/footer');
    }

    public function BuscadorBoveda()
    {
        var_dump($this->input->post());
    }

}

/* End of file Panel_Admin_Boveda.php */
