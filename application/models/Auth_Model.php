<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_Model extends CI_Model 
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function verificarSesion($Credenciales)
	{	
		$sesion = $this->db->select('token,expira')->
							 from("sessiones")->
							 where("usuario_id", $Credenciales["id"])->
							 get()->result_array();
		if($sesion)
		{
			if($sesion[0]["expira"] > time() &&  $sesion[0]["token"] == $Credenciales['token']){
				return true;
			}else
			{
				return false;
			}
		}else{
			return false;
		}
		
	}

}