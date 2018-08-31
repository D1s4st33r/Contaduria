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
		$this->data['estadisticasEmp'] =$this->Panel_Contador_Cliente_Model->empresasAsignadas($this->session_id);
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

    public function RegistrarClienteContador()
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
			$hecho = $this->Panel_Contador_Cliente_Model->RegistrarCliente($us,$this->session_id);
			if($hecho){
				$this->data['usuario'] = $this->Usuario;
				$this->data['usuario'] += array("tipo" => $this->session_tipo);
				$this->data['estadisticasEmp'] =$this->Panel_Contador_Cliente_Model->empresasAsignadas($this->session_id);
				$this->data['estadisticasEmp'] =$this->Panel_Contador_Cliente_Model->empresasAsignadas($this->session_id);
				$this->data['estadisticas'] =$this->Panel_Contador_Cliente_Model->getTotalClientesAsignados($this->session_id);
				if( $this->data['estadisticas'] )
				{ 

					$this->data['clientes'] = $this->Panel_Contador_Cliente_Model->getTodosCliente($this->session_id); //info_empresas
					// var_dump($this->data['clientes']);
				}else
				{
					$this->data['clientes'] = array();
				}
				$this->load->view("PanelContadores/components/Clientes/crudCliente",$this->data);	
			}
		}	
	}

	public function ActualizarClienteCont()
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
			$hecho = $this->Panel_Contador_Cliente_Model->ActualizarCliente($us,$post['id']);
			if($hecho){
				$this->data['usuario'] = $this->Usuario;
				$this->data['usuario'] += array("tipo" => $this->session_tipo);
				$this->data['estadisticasEmp'] =$this->Panel_Contador_Cliente_Model->empresasAsignadas($this->session_id);
				$this->data['estadisticas'] =$this->Panel_Contador_Cliente_Model->getTotalClientesAsignados($this->session_id);
				if( $this->data['estadisticas'] )
				{ 

					$this->data['clientes'] = $this->Panel_Contador_Cliente_Model->getTodosCliente($this->session_id); //info_empresas
					// var_dump($this->data['clientes']);
				}else
				{
					$this->data['clientes'] = array();
				}
				$this->load->view("PanelContadores/components/Clientes/crudCliente",$this->data);	
			}
		}   
	}

	        
    public function EliminarClienteCont()
    {
        $post = $this->input->post();
        if(!empty($post) && isset($post['id']) && !empty($post['id']))
        {
            $hecho = $this->Panel_Contador_Cliente_Model->EliminarCliente($post['id']);
            if($hecho ){
				$this->data['estadisticasEmp'] =$this->Panel_Contador_Cliente_Model->empresasAsignadas($this->session_id);
				$this->data['estadisticas'] =$this->Panel_Contador_Cliente_Model->getTotalClientesAsignados($this->session_id);
				if( $this->data['estadisticas'] )
				{ 
					$this->data['clientes'] = $this->Panel_Contador_Cliente_Model->getTodosCliente($this->session_id); //info_empresas
					// var_dump($this->data['clientes']);
				}else
				{
					$this->data['clientes'] = array();
				}
				$this->load->view("PanelContadores/components/Clientes/crudCliente",$this->data);	
			}	
        }
	}

	public function getEmpresas()
	{
		$idCliente = $this->input->get('cliente');
		$Cliente = (isset($idCliente))? $idCliente : false ; 
		if($Cliente)
		{
			$this->data["empresas"] = $this->Panel_Contador_Cliente_Model->EmpresasByCliente($Cliente);
		}
		$this->data['id_cliente'] = $idCliente;		
		$this->data['session'] = $this->session."&cliente=".$idCliente;
		$this->data['nombreCompletoCliente'] = $this->Panel_Contador_Cliente_Model->nombreClienteById($this->data['id_cliente']);
		$this->load->view("PanelContadores/components/Clientes/CrudEmpresas",$this->data);
	}

	public function FormularioClienteEmpresa()
	{
		$this->data['id_cliente'] = $this->input->get('cliente');
		if($this->data['id_cliente'])
		{
			$this->data["empresas"] = $this->Panel_Contador_Cliente_Model->EmpresasByCliente($this->data['id_cliente']);
		}
		$this->data['session'] = $this->session."&cliente=".$this->data['id_cliente'];
		$this->data['nombreCompletoCliente'] = $this->Panel_Contador_Cliente_Model->nombreClienteById($this->data['id_cliente']);
		$this->load->view("PanelContadores/components/Clientes/FormularioEmpresa",$this->data);

	}

	public function RegistrarEmpresaCliente()
    {
        if($this->input->post())
		{
			$id_usuario = $this->input->post("id_usuario");
			$RazonSocial = $this->input->post("razonSocial");
			$RFC = $this->input->post("rfc");
			$Domicilio = $this->input->post("domicilio");
			$Correo = $this->input->post("correo");		
			$Telefono = $this->input->post("telefono");
			$ReLegal = $this->input->post("representantelegal");
			$TelRepre = $this->input->post("telrepresentante");

			$this->load->model('Formularios_Model');
			
			 $validoRFC = $this->Formularios_Model->validarRFC($RFC);
			 $validoMail = $this->Formularios_Model->ValidarEmail($Correo);
			 
			if($validoRFC && $validoMail )
			{
				
				$this->load->helper('path');  

				$dir=set_realpath('./Boveda/'.$RFC."/");  
				if(!is_dir($dir)){  
					mkdir($dir,0777); 
				}
			
				$config = [
				"upload_path" =>'./Boveda/'.$RFC."/",
				'allowed_types' =>"png|jpg|pdf|docs|xls"
				];
				// $this->load->library("upload",$config);
		
				// if($this->upload->do_upload('archivos'))
				// {
					// $dato_archivo=array("upload_data" =>$this->upload->data());
					$datos_em=array(
						"id_usuario" => $id_usuario,
						"rfc" => $RFC,
						"razonSocial" => $RazonSocial,
						"domicilio" => $Domicilio,
						"correo"=>$Correo,
						"telefono"=>$Telefono,
						"representantelegal"=>$ReLegal,
						"telrepresentante"=>$TelRepre,
						// "archivos" => $dato_archivo['upload_data']['file_name'],
						
					);

					$formularioData=array(
						"id_cliente"=>$id_usuario,
						"empresarfc"=>$RFC,
						"fecha_ini"=>date("d.m.Y"),
						"fecha_fini"=>"Sin fecha",
						"ponderacion"=>$this->Formularios_Model->getNumPreguntas()
					);
					$this->Formularios_Model->crearFormulario($formularioData);
					$this->Formularios_Model->dataempresa($datos_em);
					$this->data['id_cliente'] = $id_usuario;
					$this->data["empresas"] = $this->Panel_Contador_Cliente_Model->EmpresasByCliente($this->data['id_cliente']);
					$this->data['nombreCompletoCliente'] = $this->Panel_Contador_Cliente_Model->nombreClienteById($this->data['id_cliente']);
					$this->data['session'] = $this->session."&cliente=".$id_usuario;
					$this->load->view("PanelContadores/components/Clientes/CrudEmpresas",$this->data);
				// }else{
				// 	echo "No subio Documento";
				// }
			}else{
				$this->data['id_cliente'] = $id_usuario;
				$this->data["empresas"] = $this->Panel_Contador_Cliente_Model->EmpresasByCliente($this->data['id_cliente']);
				$this->data['nombreCompletoCliente'] = $this->Panel_Contador_Cliente_Model->nombreClienteById($this->data['id_cliente']);
				$this->data['session'] = $this->session."&cliente=".$id_usuario;
				$this->data['error'] =true;
				$this->data['formulario'] = $this->input->post();
				$this->load->view("PanelContadores/components/Clientes/FormularioEmpresa",$this->data);
			}
		}	
	}
	

	public function ActualizarEmpresa()
	{
		$this->data['id_cliente']= $this->input->get('cliente');
		$post = $this->input->post();
		$campos =$this->Panel_Contador_Cliente_Model->getCamposEmpresa();
		$postVal= array();
		foreach ($campos as $key => $value) {
			if(!empty($post[$value])){
				$postVal[$value] = $post[$value];
			}
		}
		$hecho = $this->Panel_Contador_Cliente_Model->ActualizarEmpresa($postVal);	
		$this->data["empresa"] = $this->Panel_Contador_Cliente_Model->EmpresaByRFC($postVal['rfc']);
		$this->data['nombreCompletoCliente'] = $this->Panel_Contador_Cliente_Model->nombreClienteById($this->data['id_cliente']);
		$this->data['session'] = $this->session."&cliente=".$this->data['id_cliente'];
		$this->load->view("PanelContadores/components/Clientes/EmpresaCliente",$this->data);
		
	}
	public function EmpresaByRFC($rfc)
    {
        $empresa= $this->db->select('rfc,razonSocial,domicilio,correo,telefono,id_usuario,representantelegal,telrepresentante')
        ->from("empresa")
        ->where("rfc",$rfc)
        ->get()->result_array()[0];
        $empresa["cuestionario"] = $this->db->select('fecha_ini,fecha_fini,ponderacion')
        ->from("formulario")
        ->where('empresarfc', $rfc)
        ->get()->result_array()[0];
        return $empresa;
	}
	
	public function EliminarEmpresaCont()
	{
		$rfc = $this->input->get("rfc");
		if(!empty($rfc))
		{
			$hecho = $this->Panel_Contador_Cliente_Model->EliminarEmpresa($rfc);	
			if($hecho)
			{
				echo"";
			}
		}
	}
}