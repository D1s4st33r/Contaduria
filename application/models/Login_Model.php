<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

	private $date;
	private $ip;
	public function __construct()
	{
		date_default_timezone_set("America/Cancun");
		setlocale(LC_TIME, "es_ES.UTF-8/UTF-8");

		$this->date = date('l jS \of F Y h:i:s A');
		$days_dias = array(
			'Monday'=>'Lunes',
			'Tuesday'=>'Martes',
			'Wednesday'=>'Miércoles',
			'Thursday'=>'Jueves',
			'Friday'=>'Viernes',
			'Saturday'=>'Sábado',
			'Sunday'=>'Domingo',
			" of " => " de ",
			"th" => "",
			"January"=>"Enero",
			"February"=> "Febrero",
			"March" => "Marzo",
			"April" => "Abril",
			"May" => "Mayo",
			"June" => "Junio",
			"July" => "Julio",
			"August" => "Agosto",
			"September" => "Septiembre",
			"October" => "Octubre",
			"November" => "Noviembre",
			"December" => "Diciembre",
			);
			foreach ($days_dias as $index => $value) {
				$this->date =str_replace($index, $value, $this->date);
			}
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$this->ip = $_SERVER ['HTTP_CLIENT_IP'];
			} elseif (! empty ($_SERVER ['HTTP_X_FORWARDED_FOR'])) {
				$this->ip = (empty($this->ip)) ?  $_SERVER ['HTTP_X_FORWARDED_FOR']: $this->ip.",".$_SERVER ['HTTP_X_FORWARDED_FOR'];
			} else {
				$this->ip = (empty($this->ip)) ?  $_SERVER ['REMOTE_ADDR']: $this->ip.",".$_SERVER ['REMOTE_ADDR'];
			}
			//$this->date =str_replace($vowels, "", $this->date);
		parent::__construct();
	}

	/**
	 * [validaDatosUsuario] [valida que el usuario Exista]
	 * @param [array] [ $datos debe Contener los datos de email y contrasena]
	 * @return [booleano o array]  [si esta vacio el dato return false y si existe y conside su contraseña datos del usuarios]
	 */
	public function validaDatosUsuario($datos)
	{
		$usuario = $this->db->select('*')
							->from('usuario')
							->where('email',$datos['email'])
							->get()
							->result_array();
		if(!empty($usuario)){
			if($usuario[0]['clave'] == $datos['clave'])
			{
				unset($usuario[0]['clave']);
				$this->initSession($usuario[0]['id']);
				$token =  $this->db->select('token')
									->from('sessiones')
									->where('usuario_id',$usuario[0]['id'])
									->get()
									->result_array()[0]['token'];
				$usuario[0]['token'] = $token;
				return $usuario;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function initSession($id)
	{
		//if()
		$count = (int)$this->db->select("COUNT(id)")
							   ->from('sessiones')
							   ->where("usuario_id",$id)
							   ->get()
							   ->result_array()[0]["COUNT(id)"];
		$session = array("token" => $this->GenerarToken() ,
						"expira" => (time()+(60*60)),
						"direccionIP" => $this->ip,
						'ultimaSession' => $this->date);
						
		if($count)
		{
			$this->db->where('usuario_id', $id);
<<<<<<< HEAD
			$this->db->update("sessiones",$session);
		}else{
			$session['usuario_id'] = $id;
			$this->db->insert('sessiones', $session);
=======
			$this->db->update("sessiones", array("token" => $this->GenerarToken() ,
											"expira" => (time()+(60*60)),
											"direccionIP" => $this->ip,
											'ultimaSession' => $this->date));
		}else{
			$this->db->insert('sessiones', array("usuario_id" => $id,
												"token" => $this->GenerarToken() ,
												"expira" => (time()+(60*60)),// una hora de session
												"direccionIP" => $this->ip,
												'ultimaSession' => $this->date
												));
>>>>>>> david
		}

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
