<?php

	class Formularios_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
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

		public function registro_empresa($datos_empresa)
		{
			var_dump($datos_empresa);
			$registrado = $this->db->insert("empresa",$datos_empresa);
			echo $registrado;
			

		}
		/**function eliminar_null($datos_null)
		{
			$this->db->delete("empresa",$datos_null);

		}*/
	}

