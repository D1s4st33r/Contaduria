<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Boveda_Model extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getEmpresasAdmin()
    {
        $usuarios= $this->db->select('id,nombre,apellido')
        ->from("usuario")
        ->where("roll",2)
        ->get()->result_array();
        foreach ($usuarios as $key => $usuario) {
           $usuarios[$key]['empresas'] =$this->db->select('rfc')
            ->from("empresa")
            ->where("id_usuario",$usuario['id'])
            ->get()
            ->result_array();
            
        }
        return $usuarios;
    }
    

}

/* End of file Boveda_Model.php */
