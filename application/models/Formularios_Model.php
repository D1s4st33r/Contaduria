<?php

	class Formularios_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
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
					->where('id_usuario',$id)
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


		/**function eliminar_null($datos_null)
		{
			$this->db->delete("empresa",$datos_null);

		}*/
	}

