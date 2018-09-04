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
		$this->load->model('Formularios_Model');// cargar modelo
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
				&& isset($post['apellido']) && !empty($post['apellido'])
				&& isset($post['email']) && !empty($post['email'])
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
					$this->load->helper('path'); 
					$name = uniqid(); 
					$dir=set_realpath('./Boveda/'.$name."/");  
					if(!is_dir($dir))
					{  
						mkdir($dir,0777); 
						$hecho = $this->Panel_Admin_Cliente_Model->RegistrarFolderCliente($name,$hecho);
					}else{
						$name = uniqid(); 
						$dir=set_realpath('./Boveda/'.$name."/");  
						if(!is_dir($dir))
						{  
							mkdir($dir,0777); 
						}
					}
				
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

	public function AsignarContadorFormularioEmpresa()
	{
		$idCliente = $this->input->get("idCliente");
		$this->data['rfc'] = $this->input->get("rfc");
		$this->data['idCliente'] = $idCliente;
		$this->load->view("PanelControl/components/clientesAdmin/asignarContadorEmpresa",$this->data);	
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

	
	public function CRUDByCliente()
	{
		$idCliente = $this->input->get('idCliente');
		$this->data['estadisticas'] = "1";
		$this->data['clientes'] = $this->Panel_Admin_Cliente_Model->getInfoClientesById($idCliente); //info_empresas
		$this->load->view('PanelControl/components/clientesAdmin/CrudClientes',$this->data);
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

			$this->Panel_Admin_Cliente_Model->EliminarContadorPorId($idCliente,$idContador);	
			$this->data['contador'] = $this->Panel_Admin_Cliente_Model->getContadoresClienteByIdCliente($idCliente);
			$this->load->view('PanelControl/components/clientesAdmin/ListaContadoresCliente',$this->data);	

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

	public function AsignarContadorAEmpresa()
	{
		$Ids = $this->input->post();
		if(
			!empty($Ids) && $Ids['IdContador'] != '0'
		)
		{	
			$this->Panel_Admin_Cliente_Model->setContadorEmpresa($Ids);
			$this->data['contador'] = $this->Panel_Admin_Cliente_Model->getContadoresClienteByIdRFC($Ids['rfc']);
			$this->data['cliente'] = $this->input->get("idCliente");
			$this->data['rfc']=  $Ids['rfc'];
			$this->load->view('PanelControl/components/clientesAdmin/ListaContadoresEmpresa',$this->data);
		}
	}

	public function ClientesPorNombre()
	{
		if($this->input->post() && !empty( $this->input->post("search")))
		{
			$search = $this->input->post("search");
			if(!empty($search))
			{
				$Clientes = $this->Panel_Admin_Cliente_Model->GetClienteLike($search);
				if(!empty($Clientes)){echo json_encode(array("Clientes"=>$Clientes));}
				else{echo json_encode(array("Clientes"=>array(array("nombre"=> "Cliente No" ,"apellido"=>"Encontrado","id"=>0))));}
				
			}else{
				echo json_encode(array("Clientes"=>array(array("nombre"=> "Cliente No" ,"apellido"=>"Encontrado","id"=>0))));
			}
		}else{
			echo json_encode(array("Clientes"=>array(array("nombre"=> "Cliente No" ,"apellido"=>"Encontrado","id"=>0))));
		}
	}


	public function ClienteContadorAsignadoLink()
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
	public function ListaContadorEmpresa()
	{    
		$idCliente = $this->input->get("idCliente");
		$this->data['rfc'] = $this->input->get("rfc");
		$this->data['contador'] = $this->Panel_Admin_Cliente_Model->getContadoresClienteByIdRFC($this->data['rfc']);
		$this->data['cliente'] = $idCliente;

		$this->load->view('PanelControl/components/clientesAdmin/ListaContadoresEmpresa',$this->data);
	}
	public function getEmpresas()
	{
		$idCliente = $this->input->get('cliente');
		$Cliente = (isset($idCliente))? $idCliente : false ; 
		if($Cliente)
		{
			$this->data["empresas"] = $this->Panel_Admin_Cliente_Model->EmpresasByCliente($Cliente);
		}
		$this->data['id_cliente'] = $idCliente;		
		$this->data['session'] = $this->session."&cliente=".$idCliente;
		$this->data['nombreCompletoCliente'] = $this->Panel_Admin_Cliente_Model->nombreClienteById($this->data['id_cliente']);
		$this->load->view("PanelControl/components/clientesAdmin/CrudEmpresas",$this->data);
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

			
			 $validoRFC = $this->Formularios_Model->validarRFC($RFC);
			 $validoMail = $this->Formularios_Model->ValidarEmail($Correo);
			 
			if($validoRFC && $validoMail )
			{
				$this->load->helper('path');  
				$folder =$this->Panel_Admin_Cliente_Model->folderCliente($id_usuario);
				$id_folder =$this->Panel_Admin_Cliente_Model->IdFolderCliente($id_usuario);
				$pathTemp = $folder.$RFC."/";
				$dir=set_realpath('./Boveda/'.$pathTemp);  
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
					$folder =$this->Panel_Admin_Cliente_Model->registrarFolderEmpresa($pathTemp,$id_usuario,$RFC,$id_folder);
					$this->data['id_cliente'] = $id_usuario;
					$this->data["empresas"] = $this->Panel_Admin_Cliente_Model->EmpresasByCliente($id_usuario);
					$this->data['nombreCompletoCliente'] = $this->Panel_Admin_Cliente_Model->nombreClienteById($this->data['id_cliente']);
					$this->data['session'] = $this->session."&cliente=".$id_usuario;
					$this->load->view("PanelControl/components/clientesAdmin/CrudEmpresas",$this->data);
				// }else{
				// 	echo "No subio Documento";
				// }
			}else{
				$this->data['id_cliente'] = $id_usuario;
				$this->data["empresas"] = $this->Panel_Admin_Cliente_Model->EmpresasByCliente($id_usuario);
				$this->data['nombreCompletoCliente'] = $this->Panel_Admin_Cliente_Model->nombreClienteById($this->data['id_cliente']);
				$this->data['session'] = $this->session."&cliente=".$id_usuario;
				$this->data['error'] =true;
				$this->data['formulario'] = $this->input->post();
				$this->load->view("PanelControl/components/clientesAdmin/FormularioEmpresa",$this->data);
			}
		}	
    }

	public function FormularioClienteEmpresa()
	{
		$this->data['id_cliente'] = $this->input->get('cliente');
		if($this->data['id_cliente'])
		{
			$this->data["empresas"] = $this->Panel_Admin_Cliente_Model->EmpresasByCliente($this->data['id_cliente']);
		}
		$this->data['nombreCompletoCliente'] = $this->Panel_Admin_Cliente_Model->nombreClienteById($this->data['id_cliente']);
		
		$this->load->view("PanelControl/components/clientesAdmin/FormularioEmpresa",$this->data);

	}

	public function ActualizarEmpresa()
	{
		$post = $this->input->post();
		$campos =$this->Panel_Admin_Cliente_Model->getCamposEmpresa();
		$postVal= array();
		foreach ($campos as $key => $value) {
			if(!empty($post[$value])){
				$postVal[$value] = $post[$value];
			}
		}
		$hecho = $this->Panel_Admin_Cliente_Model->ActualizarEmpresa($postVal);	
		$this->data["empresa"] = $this->Panel_Admin_Cliente_Model->EmpresaByRFC($postVal['rfc']);
		$this->data['nombreCompletoCliente'] = $this->Panel_Admin_Cliente_Model->nombreClienteById($post['id_cliente']);
		$this->load->view('PanelControl/components/clientesAdmin/empresa_vista_admin',$this->data);
		
	}

	public function EliminarContadorEmpresa()
	{
		$idContador = $this->input->get("idContador");
		$rfc = $this->input->get("rfc");
		if(isset($rfc) && !empty($rfc) 
			&& isset($idContador) && !empty($idContador)
		)
		{
			$this->Panel_Admin_Cliente_Model->EliminarContadorPorIdEmpresa($rfc,$idContador);	
			$this->data['contador'] = $this->Panel_Admin_Cliente_Model->getContadoresClienteByIdRFC($rfc);
			$this->data['cliente'] = $this->input->get("idCliente");
			$this->data['rfc']=  $rfc;
			$this->load->view('PanelControl/components/clientesAdmin/ListaContadoresEmpresa',$this->data);
		}
	}
	public function EliminarEmpresa()
	{
		$rfc = $this->input->get("rfc");
		if(!empty($rfc))
		{
			$hecho = $this->Panel_Admin_Cliente_Model->EliminarEmpresa($rfc);	
			if($hecho)
			{
				echo"";
			}
		}
	}

}

/* End of file Panel_Admin_Cliente.php */
