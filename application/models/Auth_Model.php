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
		$id = $this->db->select("COUNT(id)")
						->from("usuario")
						->where('id',$Credenciales["id"])
						->get()
						->result_array()[0]["COUNT(id)"];						
		if(((int)$id)) // Validacion de id
		{
			$sesion = $this->db->select('token,expira')->
						from("sessiones")->
						where("usuario_id", $Credenciales["id"])->
						get()->result_array();
			if($sesion) // session
			{	
				if( ( (int)$sesion[0]["expira"]) > time())
				{	
					if($sesion[0]["token"] == $Credenciales['token'])
					{ 
						$this->db->where('usuario_id', $id);
						$this->db->update("sessiones",array("expira" => (time()+(60*60))));
						return true;
					}
					else{	return array("error_login"=>"session");}
				}
				else{ return array("error_login"=>"tiempo"); }
				
			}else{
				return false;
			}	
		}else{
			return false;
		}
		$sesion = $this->db->select('token,expira')
						   ->from("sessiones")
						   ->where("usuario_id", $Credenciales["id"])
						   ->get()
						   ->result_array();
		}

		public function getRollById($id)
		{
			$roll = $this->db->select("roll")
							 ->from("usuario")
							 ->where("id",$id)
							 ->get()
							 ->result_array()[0]['roll'];
			return ((int)$roll);
		}

		 

}