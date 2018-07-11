<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * [validaDatosUsuario] [valida que el usuario Exista]
	 * @param  [type] $Datos [debe Contener los datos de email y contrasena]
	 * @return [type] false    [si esta vacio el dato y true si existe]
	 */
	public function validaDatosUsuario($Datos)
	{
		$datos = $this->db->select('*')->from('usuario')->where('email',$Datos['email'])->get()->result_array();
		if(!empty($datos)){
			if($datos[0]['clave'] == $Datos['clave'])
			{
				unset($datos[0]['clave']);
				$this->crearSession($datos[0]['id']);
				$datos[0]["token"] =  $this->db->select('token')->from('sessiones')->where('usuario_id',$datos[0]['id'])->get()->result_array()[0]['token'];
				return $datos;
			}
		}else{
			return false;
		}
	}

	public function crearSession($id)
	{
		$this->db->insert('sessiones', array("usuario_id" => $id,
													 "token" => $this->GenerarToken() ,
													 "expira" => (time()+(60*60*3))
													)
								);
	}

	public function usuarioById($id){

		$datos = $this->db->select('*')->from('usuario')->where('id',$id)->get()->result_array();
		$datos[0]["token"] =  $this->db->select('token')->from('sessiones')->where('usuario_id',$datos[0]['id']);
		return $datos[0];
	}
	//fin GenerarToken
	public function GenerarToken()
	{
		$dia = date("d");
		$mes = date("m");
		$anio = date("y");
		$tiempo = time();
		$diamesaniotiempo = $dia+$mes+$anio+$tiempo;
		$random = rand(0,10000000);
		$mezcla = $diamesaniotiempo + $random;
		$unico = uniqid();
		$masMescla = $diamesaniotiempo.$unico;
		$mezclaMD5 = md5($masMescla.$diamesaniotiempo);
		return substr(sha1($mezclaMD5), 16);
	}



	public function zona_horaria_set(){
		date_default_timezone_set('America/Cancun');
	}
}
