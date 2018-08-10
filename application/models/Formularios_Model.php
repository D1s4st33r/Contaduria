<?php

	class Formularios_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function getNumPreguntas()
   		{
			$preguntas=$this->db->select("COUNT(id)")
			->from("preguntas")
			->get()
			->result_array()[0]["COUNT(id)"];
			return $preguntas;
		}

		public function dataempresa($datos_empresa)
		{

			$this->db->insert("empresa",$datos_empresa);

		}

		public function legal(){

			$dato = $this->db->select('id,seccion,texto')->from('preguntas')->where('categoria','LEGAL')->get()->result_array();
			return $dato;
		}
		public function laboral()
		{

			$dato = $this->db->select('id,seccion,texto')->from('preguntas')->where('categoria','LABORAL')->get()->result_array();
			return $dato;
		}

		public function contable(){

			$dato = $this->db->select('id,seccion,texto')->from('preguntas')->where('categoria','CONTABLE')->get()->result_array();
			return $dato;
		}
		public function segSocial(){

			$dato = $this->db->select('id,seccion,texto')->from('preguntas')->where('categoria','SEGURIDAD SOCIAL')->get()->result_array();
			return $dato;
		}
		public function fiscal(){

			$dato = $this->db->select('id,seccion,texto')->from('preguntas')->where('categoria','FISCAL')->get()->result_array();
			return $dato;
		}




		public function getContadoresEmpEmpresa()
		{
			$sumaEmEmpresas = $this->db->select('COUNT(rfc)')
				->from("empresas")
				->where("id_usuario",1)
				->get()
				->result_array()[0]["COUNT(rfc)"];
			$usuarios= array(
				"Empresas" => $sumaEmEmpresas
			);
			return $usuarios;
		}
		public function getContadorEmpresa($id)
		{
			$empresas =$this->db->select('COUNT(rfc)')
					->from("empresa")
					->where('id_usuario',1)
					->get()
					->result_array()[0];
			 return $empresas["COUNT(rfc)"] ;
			 
		} 
		
		
		public function getIdUser($user)
		{
			$usuario = $this->db->select("id")
			->from("usuario")
			->where('email',$user)
			->get()
			->result_array()[0];
			return $usuario;	
		}
		

		public function crearFormulario($datos)
		{
			$form= $this->db->insert("formulario",$datos);
		}

		public function getDetallesporId($id)
		{
		    $detalles= $this->db->select('tipo,obligatorio,soliarchivo,preguntaOpcional,tipoPreOpcional,id_pregunta')
		    ->from("detalles_preguntas")
		    ->where('id_pregunta',$id)
		    ->get()
		    ->result_array()[0];
		    return $detalles;
		}

		public function getFormularios($id)
		{
			$form=$this->db->select("id,empresarfc,fecha_ini,fecha_fini")
			->from("formulario")
			->where('id_cliente',$id)
			->get()
			->result_array();
			return $form;
		}

		public function getFormularioEmpresa($id)
		{
			$form=$this->db->select("empresarfc,fecha_ini,fecha_fini")
			->from("formulario")
			->where('id',$id)
			->get()
			->result_array()[0];
			return $form;
		}
		
		public function insertRespuesta($datos)
		{
			$form=$this->db->insert("resultados",$datos);
			return $form;
		}

		public function updateRespuesta($pre,$form,$resp)
   		{
			$where=array('id_pregunta' => $pre , 'id_formulario' => $form);
        		$registrado=$this->db->where($where)->update("resultados",$resp);
        		return  $registrado;
    		}

		public function getRespFormulario($id)
		{
			$form=$this->db->select("respuesta,id_pregunta,respuestaOpc")
			->from("resultados")
			->where('id_formulario',$id)
			->get()
			->result_array();
			return $form;
		}


		public function insertBoveda($datos)
		{
			$form=$this->db->insert("boveda",$datos);
			return $form;
		}
		public function EliminarClaveRegistro($clave){
			$registrado = $this->db->where('ClaveRegistro', $clave)->delete('claves_solicitadas');
			return $registrado;
		}
	
		public function ValidarClaveRegistro($IdClave)
		{
	
			$Clave = $this->db->select("ClaveRegistro")
			->from("claves_solicitadas")
			->where("ClaveRegistro",$IdClave)
			->get()
			->result_array()[0]['ClaveRegistro'];
			return $Clave;
		}

		/**function eliminar_null($datos_null)
		{
			$this->db->delete("empresa",$datos_null);

		}*/
	}

