<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * [Panel_admin] [Clase] [esta clase es solo para el administador]
 */
	class Formulario extends MY_Controller {
		protected $nivelAcceso = "Cliente" ;
		protected $Usuario = array();
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Formularios_Model');
			
			if($this->nivelAcceso != $this->session_tipo)
			{
				redirect('Login/index?error_login=session','refresh');
			}
			$this->load->model('Paneles_Model');
			
			$this->Usuario = $this->Paneles_Model->getInfoUsuarioPorId($this->session_id);
		}
	

		
	/*public function General()
	{
		$data['menu']="formulario";
		$data['titulo'] = "general";
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['session'] = $this->session;
		$data['user']=$this->session_id;
		$this->load->view('templates/headerLimpio');
        	$this->load->view('PanelUser/components_user/PanelMenu',$data);
		$this->load->view('formularios/index',$data);
		$this->load->view('templates/footer');
   
	}
*/
	public function FormularioEmpresa()
	{
		$data['menu']="formulario";
		$data['idform']=$_GET['form'];
		$data['categorias']=$this->Paneles_Model->getCategorias();
		$data['categoria']	 = (isset($_GET['cat']) && !empty($_GET['cat'])) ? $_GET['cat'] : strtoupper($data['categorias'][0]['categoria']) ;
		$data['idcat']=(isset($_GET['idcat']) && !empty($_GET['idcat'])) ? $_GET['idcat'] : "" ;
		$data['titulo'] = $data['categoria'] ;
		$data['secciones']=$this->Paneles_Model->getSpecificSecciones($data['categoria']);
		$data['preguntas']=$this->Paneles_Model->getPreguntas($data['categoria']);
		$data['detalles']=$this->Paneles_Model->getDetallesporCat($data['categoria']);
		$data['respuestas']=$this->Formularios_Model->getRespFormulario($_GET['form']);
		$data['numpre']=$this->Formularios_Model->getNumPreguntas();
		$data['numre']=$this->Formularios_Model->getNumRespuestas($_GET['form']);
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['session'] = $this->session;
		$this->load->view('templates/headerLimpio');
		$this->load->view('PanelUser/Panel',$data);
		$this->load->view('templates/footer');
	}

	public function getDatosGenerales()
	{

		$data['categorias']=$this->Paneles_Model->getCategorias();
		$data['categoria']	 = (isset($_GET['cat']) && !empty($_GET['cat'])) ? $_GET['cat'] : "" ;
		$data['idcat']=(isset($_GET['idcat']) && !empty($_GET['idcat'])) ? $_GET['idcat'] : "" ;
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['session'] = $this->session;
		
		$this->load->view('formularios/index',$data);	

	}
	
	public function getPanelCategorias()
	{
		$data['idform']=$_GET['form'];
		$data['categorias']=$this->Paneles_Model->getCategorias();
		$data['categoria']	 = (isset($_GET['cat']) && !empty($_GET['cat'])) ? $_GET['cat'] : "" ;
		$data['idcat']=(isset($_GET['idcat']) && !empty($_GET['idcat'])) ? $_GET['idcat'] : "" ;
		$data["titulo"]=$data['categoria'];
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['session'] = $this->session;
		
		$this->load->view('formularios/menuCategorias',$data);	
	}

	public function getPanelSeccion()
	{
		$data['idform']=$_GET['form'];
		$data["categoria"]=(isset($_GET['cat']) && !empty($_GET['cat'])) ? $_GET['cat'] : "" ;
		$data['secciones']=$this->Paneles_Model->getSpecificSecciones(strtoupper($data['categoria']));
		$data['preguntas']=$this->Paneles_Model->getPreguntas(strtoupper($data['categoria']));
		$data['detalles']=$this->Paneles_Model->getDetallesporCat($data['categoria']);
		$data['respuestas']=$this->Formularios_Model->getRespFormulario($_GET['form']);
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['session'] = $this->session;
		
		$this->load->view('formularios/secciones',$data);	
	}

	public function getPanelPreguntas($post)
	{
		$data["categoria"]=(isset($_GET['cat']) && !empty($_GET['cat'])) ? $_GET['cat'] : "" ;
		$data['seccion']=(isset($_GET['sec']) && !empty($_GET['sec'])) ? $_GET['sec'] : "" ;
		$data['preguntas']=$this->Paneles_Model->getPreguntas(strtoupper($data['categoria']));
		$data['detalles']=$this->Paneles_Model->getDetallesporCat($data['categoria']);
		$data['usuario'] = $this->Usuario;
		$data['usuario'] += array("tipo" => $this->session_tipo);
		$data['session'] = $this->session;
		$this->load->view('formularios/preguntas',$data);
	}

	public function enviarRespuestas()
		{
			$post = $this->input->post();
			$id=$post['id'];
			if(!empty($post) 
				&& isset($post['respuesta'.$id])	
			){
				
				$solicitud=$this->Formularios_Model->getDetallesporId($id);
				if($solicitud['soliarchivo']=="1")
				{
					$chars = array(',' , '.', '_' , '´', '¨' , '{', 'ç' , 'Ç', '}' , '^', '?' , '[', '`' ,'\'', '*' , ']', '+' , '¿', '¡' , '!', '"' , '·',  '$' , '%', '&' , '/', '=' , '(', ')' , ')', ':' , ';', ')' , '#', ' ' );
					$catLimpia = str_replace($chars, "_",  $_GET['cat']); 
					
					$this->load->helper('path');  
					$rfc= $this->Formularios_Model->getFormularioEmpresa($_GET['form']);
					$dir=set_realpath('./Boveda/'.$rfc['empresarfc']."/".$catLimpia."/");  
					
					if(!is_dir($dir)){  
						mkdir($dir,0777); 
					}
						
					$config = [
						"upload_path" =>'./Boveda/'.$rfc['empresarfc']."/".$catLimpia."/",
						'allowed_types' =>"png|jpg|pdf|docs|xls"	
					];
						
								
					$this->load->library("upload",$config);
								
					if($this->upload->do_upload('archivo'.$id)){			
						$dato_archivo=array("upload_data" =>$this->upload->data());	
					}
					else{
        					echo $this->upload->display_errors();
					}

					$archivoF= array(
						"id_formulario" =>$_GET['form'],
						"id_pregunta"=>$post['id'],
						"archivo"=> $dato_archivo['upload_data']['file_name']
					);
					$this->Formularios_Model->insertBoveda($archivoF);
				}
				
				$respuestaF = array(
					"id_formulario" =>$_GET['form'],
					"id_pregunta"=>$post['id'],
					"respuesta"=> $post['respuesta'.$id],
					"respuestaOpc"=>(isset($post['respuestaOpc'.$id]) ) ? $post['respuestaOpc'.$id] : "",
					"seccion"=>$_GET['sec']
				);
				//print_r( $respuestaF);
				$hecho = $this->Formularios_Model->insertRespuesta($respuestaF);
				
				if($hecho){
					echo '<i class="fas fa-check-square fa-1x"></i>';
				}else{
					echo'No subio a la base datos';
				}
			}
			else{ echo '<i class="fas fa-times fa-1x"></i>';}
		}
}



